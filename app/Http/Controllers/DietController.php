<?php

namespace App\Http\Controllers;

use App\DietDayStat;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Diet;
use App\Eating;
use Carbon\Carbon;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class DietController extends Controller
{
    public function getProducts($id)
    {
        $products = Product::all();

        return view('adddiet', ['id' => $id, 'products' => $products]);
    }

    public function getUserDiets($id)
    {
        $diets = Diet::with('eatings.products')->where('user_id', $id)->with('dayStats')->get();

        echo '<pre>';
        print_r($diets->toArray());
        echo '</pre>';
        /*$diets = Diet::with('eating')->where('user_id', $id)->get();
        //var_dump(count($diets));
        $pivotArray = array();
        $eatings = array();
        // loop through diets. Usually only 1 diet.
        for($b=0;$b<count($diets);$b++){
            $diet = $diets[$b];
            $eating = $diet->eating;
           // var_dump($eating->toArray());
            $pivotArray[$b] = array('diet_id'=>$diet['id'],'eating_ids'=>array(), 'with_cholesterol'=>$diet['with_cholesterol']);
            // loop through all the eatings and save them in the array
            for($i=0;$i<count($eating);$i++){
                $pivot = $eating[$i]['pivot'];
                $pivotArray[$b]['eating_ids'][$i] = $pivot['eating_id'];
            }
            $pivotArray[$b]['eating_ids'] = array_unique($pivotArray[$b]['eating_ids']);
            //var_dump($eating); 
            $eatingDiet = Eating::with('product')->whereIn('id', $pivotArray[$b]['eating_ids'])->get()->toArray();
            for($i=0;$i<$diet->total_days;$i++) {
                for($c=0;$c<$diet->total_eating;$c++){
                    //var_dump($diet->total_eating);
                    $eatings[$b][$i][$c] = $eatingDiet[$c+$i*$diet->total_days];
                }
            }
            //var_dump($eatings[0][0]);
            foreach($eatingDiet as $eating){
                //var_dump($eating->toArray());
            }
        }
        //var_dump($eatings);


        $fullDiet = $eatings;
        //var_dump($pivotArray);
        //var_dump($fullDiet[0][0][0]);
        return view('diets',['id'=>$id,'fullDiet'=>$fullDiet,'pivot'=>$pivotArray]);*/
    }

    // TODO: sql injection protection
    public function saveDiet(Request $request, $id)
    {
        $array = $request->json()->all();
        if ($array == null) {
            return;
        }
        $dieta = $array[0];
        $eating_types = $array[1];

        $diet = new Diet();
        $diet->user_id = $id;
        $diet->total_days = $dieta['total_days'];
        $diet->total_eating = $dieta['total_eating'];
        $diet->notes = "";
        $diet->created = Carbon::now();
        if (isset($diet['with_cholesterol'])) {
            $diet->with_cholesterol = true;
        } else {
            $diet->with_cholesterol = false;
        }
        $diet->protein = $dieta['protein'];
        $diet->fat = $dieta['fat'];
        $diet->carbs = $dieta['carbs'];
        $diet->cholesterol = $dieta['cholesterol'];
        $diet->energy_value = $dieta['energy_value'];
        $diet->save();

        foreach ($dieta['eatings'] as $eat) {
            $eating = new Eating();
            $eating->eating_type = $eat['eating_type'];
            $eating->eating_time = $eat['eating_time'];
            $eating->recommended_rate = 0;
            $eating->protein = $eat['protein'];
            $eating->fat = $eat['fat'];
            $eating->carbs = $eat['carbs'];
            $eating->cholesterol = $eat['cholesterol'];
            $eating->energy_value = $eat['energy_value'];
            $diet->eatings()->save($eating);


            //return $array;
            foreach ($eat['products'] as $product) {
                if(isset($product['id'])){
                    $eating->products()->attach($product['id'], [
                        'quantity' => $product['pivot']['quantity'],
                        'protein' => $product['pivot']['protein'],
                        'fat' => $product['pivot']['fat'],
                        'carbs' => $product['pivot']['carbs'],
                        'cholesterol' => $product['pivot']['cholesterol'],
                        'energy_value' => $product['pivot']['energy_value']
                    ]);
                }
            }
        }

        foreach ($dieta['day_stats'] as $dayStat) {
            $stat = new DietDayStat();
            $stat->day = $dayStat['day'];
            $stat->protein = $dayStat['protein'];
            $stat->fat = $dayStat['fat'];
            $stat->carbs = $dayStat['carbs'];
            $stat->cholesterol = $dayStat['cholesterol'];
            $stat->energy_value = $dayStat['energy_value'];
            $diet->dayStats()->save($stat);
        }
    }

// Problem: users can download each other`s clients data.
    public function exportDiet(Request $request, $dietType)
    {
        //$array = $request->json()->all();
        $array = json_decode($request->input("diet"), true);
        $fullDiet = $array[0];
        $cholesterol = $array[1];

        if ($dietType === "diet") {
            $fileName = "dieta";
            $viewName = "exports.diet";
            $weeks = 1;
            $sheetName = "Diena";
        } else if ($dietType === "weeklyDiet") {
            $fileName = "savaitinis_valgiarastis";
            $viewName = "exports.weeklydiet";
            $weeks = ceil(count($fullDiet) / 7);
            $fullDiet = $this->sortDietIntoWeeks($fullDiet, $weeks);
            $sheetName = "Savaitė";
        } else {
            $fileName = "energija_dienom";
            $viewName = "exports.energydiet";
            $weeks = ceil(count($fullDiet) / 7);
            $fullDiet = $this->sortDietIntoWeeks($fullDiet, $weeks);
            $sheetName = "Savaitė";
        }
        // make arrray of settings
        $settings = [
            "cholesterol" => $cholesterol,
            "viewName" => $viewName,
            "weeks" => $weeks,
            "sheetName" => $sheetName,
            "dietType" => $dietType,
        ];
        //var_dump($fullDiet);
        if ($fullDiet == null) {
            return;
        }
        //return view('exports.diet',['diet' => $fullDiet[0],'cholesterol'=>0]);
        return Excel::create($fileName, function ($excel) use ($fullDiet, $settings) {
            $excel->setTitle("Valgiaraštis");
            $excel->setDescription("Vartotojo Dieta");

            foreach ($fullDiet as $diet) {
                $dietStats = [];
                if ($settings['dietType'] === "energyDiet") {
                    $dietStats = $this->calculateWeekDietStats($diet);
                }
                $excel->sheet($settings['sheetName'], function ($sheet) use ($diet, $settings, $dietStats) {
                    $sheet->loadView($settings['viewName'], [
                        'diet' => $diet,
                        'cholesterol' => $settings['cholesterol'],
                        'dietStats' => $dietStats
                    ]);
                });
            }
        })->download('xlsx');
    }

    public function sortDietIntoWeeks($fullDiet, $weeks)
    {
        $array = [];
        $days = ['Pirmadienis', 'Antradienis', 'Trečiadienis', 'Ketvirtadienis', 'Penktadienis', 'Šeštadienis', 'Sekmadienis'];
        $totalDays = count($fullDiet);

        for ($a = 0; $a < $weeks; $a++) {
            for ($b = 0; $b < 7; $b++) {
                $index = $b + $a * 7;
                if ($index < $totalDays) {
                    $array[$a][$b] = $fullDiet[$index];
                    $array[$a][$b]['day'] = $days[$b];
                }
            }
        }


    }

//TODO: init everything
// DONT LOOK THIS WAY
    public function calculateWeekDietStats($dietWeek)
    {
        $array = [];

        $eatingTimes = 0;
        for ($a = 0; $a <= count($dietWeek); $a++) { // 7days
            if ($a < count($dietWeek)) {
                $dietDay = $dietWeek[$a];
            } else {
                $dietDay = $dietWeek[$a - 1];
            }

            for ($i = 0; $i < count($dietDay); $i++) {//6 eatings
                if (isset($dietDay[$i]['eating_type'])) {
                    if ($a === count($dietWeek)) {
                        $array['angliavandeniai'][$i] = round(($array['angliavandeniai'][$i] / $eatingTimes), 2);
                        $array['baltymai'][$i] = round(($array['baltymai'][$i] / $eatingTimes), 2);
                        $array['riebalai'][$i] = round(($array['riebalai'][$i] / $eatingTimes), 2);
                        $array['eVerte'][$i] = round(($array['eVerte'][$i] / $eatingTimes), 2);
                        $array['cholesterolis'][$i] = round(($array['cholesterolis'][$i] / $eatingTimes), 2);
                    } else {
                        if (!isset($array[$a]['angliavandeniai'])) {
                            $array[$a]['angliavandeniai'] = 0;
                            $array[$a]['baltymai'] = 0;
                            $array[$a]['riebalai'] = 0;
                            $array[$a]['eVerte'] = 0;
                            $array[$a]['cholesterolis'] = 0;

                            $array['visoAngliavaneniu'] = 0;
                            $array['visoBaltymu'] = 0;
                            $array['visoRiebalu'] = 0;
                            $array['visoEVertes'] = 0;
                            $array['visoCholesterolio'] = 0;
                        }
                        if (!isset($array['angliavandeniai'][$i])) {
                            $array['angliavandeniai'][$i] = 0;
                            $array['baltymai'][$i] = 0;
                            $array['riebalai'][$i] = 0;
                            $array['eVerte'][$i] = 0;
                            $array['cholesterolis'][$i] = 0;
                        }
                        //total for a day
                        $array[$a]['angliavandeniai'] += $dietDay[$i]['angliavandeniai'];
                        $array[$a]['baltymai'] += $dietDay[$i]['baltymai'];
                        $array[$a]['riebalai'] += $dietDay[$i]['riebalai'];
                        $array[$a]['eVerte'] += $dietDay[$i]['eVerte'];
                        $array[$a]['cholesterolis'] += $dietDay[$i]['cholesterolis'];
                        // total for a week
                        $array['angliavandeniai'][$i] += $dietDay[$i]['angliavandeniai']; // i- pusrycai pietus, vakariene
                        $array['baltymai'][$i] += $dietDay[$i]['baltymai'];
                        $array['riebalai'][$i] += $dietDay[$i]['riebalai'];
                        $array['eVerte'][$i] += $dietDay[$i]['eVerte'];
                        $array['cholesterolis'][$i] += $dietDay[$i]['cholesterolis'];

                        // remake
                        $array['visoAngliavaneniu'] += $dietDay[$i]['angliavandeniai'];
                        $array['visoBaltymu'] += $dietDay[$i]['baltymai'];;
                        $array['visoRiebalu'] += $dietDay[$i]['riebalai'];
                        $array['visoEVertes'] += $dietDay[$i]['eVerte'];
                        $array['visoCholesterolio'] += $dietDay[$i]['cholesterolis'];

                        if ($a === 0) {
                            $eatingTimes++;
                        }
                    }
                }
            }
        }
        $array['visoAngliavandeniu'] = 0;
        $array['visoBaltymu'] = 0;
        $array['visoRiebalu'] = 0;
        $array['visoEVertes'] = 0;
        $array['visoCholesterolio'] = 0;
        for ($i = 0; $i < count($array['angliavandeniai']); $i++) {
            $array['visoAngliavandeniu'] += $array['angliavandeniai'][$i];
            $array['visoBaltymu'] += $array['baltymai'][$i];
            $array['visoRiebalu'] += $array['riebalai'][$i];
            $array['visoEVertes'] += $array['eVerte'][$i];
            $array['visoCholesterolio'] += $array['cholesterolis'][$i];
        }

        return $array;
    }
}
