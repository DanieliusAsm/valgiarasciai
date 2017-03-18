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
    // TODO get rid of this trash
    public function getProducts($id)
    {
        $products = Product::all();

        return view('adddiet', ['id' => $id, 'products' => $products]);
    }

    public function getUserDiets($id)
    {
        $diets = Diet::with('eatings.products')->where('user_id', $id)->with('dayStats')->get();

        echo '<pre>';
        print_r($diets->toArray()[0]);
        echo '</pre>';

        return view('diets',['id'=>$id,'diets'=>$diets->toArray()]);
    }

    // TODO: sql injection protection
    public function saveDiet(Request $request, $userId)
    {
        $array = $request->json()->all();
        if ($array == null) {
            return;
        }
        $dietJson = $array[0];
        $eating_types = $array[1];

        $this->saveFullDiet($dietJson, $userId, null);
        return response("Diet saved!",200);
    }

    public function editDiet(Request $request, $userId, $dietId){
        $dietJson = $request->json()->all();

        $this->saveFullDiet($dietJson[0], null, $dietId);

        return response("edited diet saved!",200);
    }

    // save a full diet depending if it already exists or not.
    // when editing a diet one can always add in more products/eatings/days
    public function saveFullDiet($dietJson, $userId, $dietId){
        if(isset($userId)){
            $diet = new Diet();
            $diet->user_id = $userId;
        }else if(isset($dietId)){
            $diet = Diet::find($dietId)->first();
            if(!isset($diet)){return response("Internal server error1",500);}
        }else{
            return response("Internal server error2",500);
        }

        $diet->total_days = $dietJson['total_days'];
        $diet->total_eating = $dietJson['total_eating'];
        $diet->notes = "";
        $diet->created = Carbon::now();
        if (isset($diet['with_cholesterol'])) {
            $diet->with_cholesterol = true;
        } else {
            $diet->with_cholesterol = false;
        }
        $diet->protein = $dietJson['protein'];
        $diet->fat = $dietJson['fat'];
        $diet->carbs = $dietJson['carbs'];
        $diet->cholesterol = $dietJson['cholesterol'];
        $diet->energy_value = $dietJson['energy_value'];
        $diet->save();

        foreach ($dietJson['eatings'] as $eat) {
            if(isset($userId)){
                $eating = new Eating();
                $eating->diet_id = $diet->id;
            }else if(isset($dietId) && isset($eat['id'])){
                $eating = Eating::where('id',$eat['id'])->first();
            }
            
            $eating->eating_type = $eat['eating_type'];
            $eating->eating_time = $eat['eating_time'];
            $eating->recommended_rate = 0;
            $eating->protein = $eat['protein'];
            $eating->fat = $eat['fat'];
            $eating->carbs = $eat['carbs'];
            $eating->cholesterol = $eat['cholesterol'];
            $eating->energy_value = $eat['energy_value'];
            $eating->save();
            
            //return $array;
            $eating->products()->detach();
            foreach ($eat['products'] as $product) {
                if(isset($product['id'])){
                    $arguments = [
                        'quantity' => $product['pivot']['quantity'],
                        'protein' => $product['pivot']['protein'],
                        'fat' => $product['pivot']['fat'],
                        'carbs' => $product['pivot']['carbs'],
                        'cholesterol' => $product['pivot']['cholesterol'],
                        'energy_value' => $product['pivot']['energy_value']
                    ];
                    $eating->products()->attach($product['id'], $arguments);
                }
            }
        }

        foreach ($dietJson['day_stats'] as $dayStat) {
            if(isset($userId)){
                $stat = new DietDayStat();
                $stat->diet_id = $diet->id;
            }else if(isset($dietId) && isset($dayStat['id'])){
                $stat = DietDayStat::find($dayStat['id'])->first();
            }

            $stat->day = $dayStat['day'];
            $stat->protein = $dayStat['protein'];
            $stat->fat = $dayStat['fat'];
            $stat->carbs = $dayStat['carbs'];
            $stat->cholesterol = $dayStat['cholesterol'];
            $stat->energy_value = $dayStat['energy_value'];
            $stat->save();
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

    public function getDietById($dietId){
        $diet = Diet::with('eatings.products')->where('id', $dietId)->with('dayStats')->first();

        return response()->json($diet->toArray());
    }
}
