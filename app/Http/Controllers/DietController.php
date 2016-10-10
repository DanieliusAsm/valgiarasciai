<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Diet;
use App\Eating;
use Carbon\Carbon;
use App\Http\Controllers\Response;

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

            $eatingDiet = Eating::with('product')->whereIn('id',$pivotArray[$b]['eating_ids'])->get();
            $eatings[$b]=$eatingDiet->toArray();
            //var_dump($eatings[$b]);
            foreach($eatingDiet as $eating){
                //var_dump($eating->toArray());
            }
        }
        //var_dump($eatings);



        return view('diets',['id'=>$id,'eatings'=>$eatings,'pivot'=>$pivotArray]);
    }

    // TODO: sql injection protection
    public function saveDiet(Request $request, $id){
        //return redirect("/login");
        $json = "[{\"day\":1,\"eating_types\":[{\"rows\":[{\"id\":1,\"pavadinimas\":\"Agurkų sriuba\",\"baltymai\":1.21,\"riebalai\":1.27,\"angliavandeniai\":10.51,\"cholesterolis\":0,\"eVerte\":54.33,\"tipas\":\"Sriuba\",\"quantity\":100},{\"id\":108,\"pavadinimas\":\"Pica su kumpiu\",\"baltymai\":8.29,\"riebalai\":7.18,\"angliavandeniai\":20.54,\"cholesterolis\":20.79,\"eVerte\":180.92,\"tipas\":\"Kita\",\"quantity\":120}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]}],\"total_values\":[{\"baltymai\":\"11.16\",\"riebalai\":\"9.89\",\"angliavandeniai\":\"35.16\",\"cholesterolis\":\"24.95\",\"eVerte\":\"271.43\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"}]},{\"day\":2,\"eating_types\":[{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]}],\"total_values\":[{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"}]},{\"day\":3,\"eating_types\":[{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]},{\"rows\":[{\"pavadinimas\":\"\"}]}],\"total_values\":[{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"},{\"baltymai\":\"0.00\",\"riebalai\":\"0.00\",\"angliavandeniai\":\"0.00\",\"cholesterolis\":\"0.00\",\"eVerte\":\"0.00\"}]}]";
        $array =  $request->json()->all();
        if($array == null){
            return;
        }
        $dieta = $array[0];
        $eating_types = $array[1];
        //var_dump($masyvas);
        $id = 1;
        $eatingId=-1;

        $diet = new Diet();
        $diet->user_id = $id;
        $diet->total_days = 1; // useless
        $diet->notes = "";
        $diet->created = Carbon::now();
        $diet->total_eating = 6; // you dont need this since you get all related by id
        $diet->save();

        for($i=0;$i<count($dieta);$i++){ // loop through days
            var_dump($array[$i]);
            for($a=0;$a<$diet->total_eating;$a++){ // 6 eatings per day
                for($b=0;$b<count($dieta[$i]['eating_types'][$a]['rows']);$b++){
                    $row = $dieta[$i]['eating_types'][$a]['rows'][$b];
                    //var_dump($row);
                    if($eatingId==-1) {
                        $eating = new Eating();
                        $eating->eating_type = $eating_types[$a]['type'];
                        $eating->eating_time = $eating_types[$a]['time'];
                        $eating->recommended_rate = 0;
                        $eating->baltymai = $dieta[$i]['total_values'][$b]['baltymai'];
                        $eating->riebalai = $dieta[$i]['total_values'][$b]['riebalai'];
                        $eating->angliavandeniai = $dieta[$i]['total_values'][$b]['angliavandeniai'];
                        $eating->cholesterolis = $dieta[$i]['total_values'][$b]['cholesterolis'];
                        $eating->eVerte = $dieta[$i]['total_values'][$b]['eVerte'];
                        $eating->save();
                        $eatingId = $eating->id;
                    }
                    $diet->eating()->attach($eatingId,['day'=>($i+1)]);
                    $eating->product()->attach($row['id'],['quantity'=>$row['quantity']]);
                }
                $eatingId=-1;
            }
        }
        return $array;
    }
}
