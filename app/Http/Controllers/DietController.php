<?php

namespace App\Http\Controllers;

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
    public function getProducts($id){
        $products = Product::all();

        return view('adddiet',['id'=>$id,'products'=>$products]);
    }
    //TODO: remake into more than one day
    public function getUserDiets($id){
        $diets = Diet::with('eating')->get();
        $pivotArray = array();
        $eatings = array();
        // loop through diets. Usually only 1 diet.
        for($b=0;$b<count($diets);$b++){
            $diet = $diets[$b];
            $eating = $diet->eating;
           // var_dump($eating->toArray());
            $pivotArray[$b] = array('diet_id'=>$diet['id'],'eating_ids'=>array());
            // loop through all the eatings and save them in the array
            for($i=0;$i<count($eating);$i++){
                $pivot = $eating[$i]['pivot'];
                $pivotArray[$b]['eating_ids'][$i] = $pivot['eating_id'];
            }
            $pivotArray[$b]['eating_ids'] = array_unique($pivotArray[$b]['eating_ids']);
           // var_dump($pivotArray);

            $eatingDiet = Eating::with('product')->whereIn('id', $pivotArray[$b]['eating_ids'])->get()->toArray();
            for($i=0;$i<$diet->total_days;$i++) {
                for($c=0;$c<$diet->total_eating;$c++){
                    $eatings[$b][$i][$c] = $eatingDiet[$c+$i*6];
                }
            }
            //var_dump($eatings[0][1]);
            foreach($eatingDiet as $eating){
                //var_dump($eating->toArray());
            }
        }
        //var_dump($eatings);


        $fullDiet = $eatings;
        //var_dump($pivotArray);
        return view('diets',['id'=>$id,'fullDiet'=>$fullDiet,'pivot'=>$pivotArray]);
    }

    // TODO: sql injection protection
    public function saveDiet(Request $request, $id){
        $json = "[{\"day\":1,\"eating_types\":[{\"rows\":[{\"id\":1,\"pavadinimas\":\"Agurkų sriuba\",\"baltymai\":1.21,\"riebalai\":1.27,\"angliavandeniai\":10.51,\"cholesterolis\":0,\"eVerte\":54.33,\"tipas\":\"Sriuba\",\"quantity\":100},{\"id\":108,\"pavadinimas\":\"Pica su kumpiu\",\"baltymai\":8.29,\"riebalai\":7.18,\"angliavandeniai\":20.54,\"cholesterolis\":20.79,\"eVerte\":180.92,\"tipas\":\"Kita\",\"quantity\":120}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]}],\"total_values\":[{\"baltymai\":\"11.16\",\"riebalai\":\"9.89\",\"angliavandeniai\":\"35.16\",\"cholesterolis\":\"24.95\",\"eVerte\":\"271.43\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"}]},{\"day\":2,\"eating_types\":[{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]}],\"total_values\":[{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"}]},{\"day\":3,\"eating_types\":[{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]}],\"total_values\":[{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"}]}]";
        $array =  $request->json()->all();
        if($array == null){
            return;
        }
        $dieta = $array[0];
        $eating_types = $array[1];
        $id = 1;
        $diet = new Diet();
        $diet->user_id = $id;
        $diet->total_days = count($dieta);
        $diet->notes = "";
        $diet->created = Carbon::now();
        $diet->total_eating = 6;
        $diet->save();

        for($i=0;$i<count($dieta);$i++){ // loop through days
            for($a=0;$a<$diet->total_eating;$a++){ // 6 eatings per day
                $eating = new Eating();
                $eating->eating_type = $eating_types[$a]['type'];
                $eating->eating_time = $eating_types[$a]['time'];
                $eating->recommended_rate = 0;
                $eating->baltymai = $dieta[$i]['total_values'][$a]['baltymai'];
                $eating->riebalai = $dieta[$i]['total_values'][$a]['riebalai'];
                $eating->angliavandeniai = $dieta[$i]['total_values'][$a]['angliavandeniai'];
                $eating->cholesterolis = $dieta[$i]['total_values'][$a]['cholesterolis'];
                $eating->eVerte = $dieta[$i]['total_values'][$a]['eVerte'];
                $eating->save();
                for($b=0;$b<count($dieta[$i]['eating_types'][$a]['rows']);$b++){
                    $row = $dieta[$i]['eating_types'][$a]['rows'][$b];
                    //var_dump($row);
                    $diet->eating()->attach($eating->id,['day'=>($i+1)]);
                    if(isset($row['id'])){
                        $eating->product()->attach($row['id'],['quantity'=>$row['quantity']]);
                    }
                }
            }
        }
        return $array;
    }
    // Problem: users can download each other`s clients data.
    public function exportDiet(Request $request){
           $fullDiet = json_decode($request->input("fullDiet"), true);
           //var_dump($fullDiet);
           //return view('includes.diettable',['dietDay'=>$fullDiet[0]]);
             Excel::create("diet", function($excel) use($fullDiet){
                  $excel->setTitle("Test");
                  $excel->setDescription("Vartotojo Dieta");
                for($i=0;$i<count($fullDiet);$i++){
                    $dietDay = $fullDiet[$i];
                    $excel->sheet("fgh", function($sheet) use($dietDay){
                        $sheet->loadView("includes.diettable", ['dietDay'=>$dietDay]);
                    });
                }
            })->download('xls');

        
           /*return Excel::create("diet", function ($excel) use($fullDiet) {
               if (isset($excel)) {
                   $excel->setTitle("Test");
                   $excel->setDescription("Vartotojo Dieta");
                   for($i=0;$i<count($fullDiet);$i++){ // loop days
                       $dietDay = $fullDiet[$i];

                       $excel->sheet("($i+1)",function($sheet) use($dietDay){
                           //$sheet->setAllBorders('thin');
                           $rows = 1;
                           $sheet->appendRow(array("Valgymo laikas", "Maisto produktas/gaminys", "Kiekis/išeiga", "Baltymai", "Riebalai","Angliavandeniai","kcal"));

                           for($i=0;$i<count($dietDay);$i++){ // loop eatings in each day
                               // one eating - 3 extra rows + 1 at the top.
                               $rows += 3;
                               $eating = $dietDay[$i];
                               if($i==0){
                                   $vanduo = "Atsikėlus";
                               }else if($i==(count($dietDay)-1)){
                                   $vanduo = "Prieš miegą";
                               }else{
                                   $vanduo = "30min. prieš";
                               }
                               $sheet->appendRow(array($vanduo,"Stiklinė vandens","~150-200ml","0","0","0","0"));
                               $sheet->appendRow(array($eating['eating_time'],$eating['eating_type']));
                               for($b=0;$b<count($eating['product']);$b++){ // loop products in each eating type
                                   $rows +=1;
                                   $product = $eating['product'][$b];
                                   $sheet->appendRow(array("",$product['pavadinimas'],$product['pivot']['quantity'] . 'g',$product['baltymai'],$product['riebalai'],$product['angliavandeniai'],$product['eVerte']));
                               }
                               // TODO MERGE cells cuz bugs
                               $sheet->appendRow(array("Bendra maistinė ir energetinė vertė",$eating['baltymai'],$eating['riebalai'],$eating['angliavandeniai'],$eating['eVerte']));
                           }
                            for($i=0;$i<$rows;$i++){
                                $sheet->row(($i+1), function($row){
                                    
                                });
                            }

                       });
                   }
               }
           })->download("xls");*/
        
           //return redirect('/user');
       }
}
