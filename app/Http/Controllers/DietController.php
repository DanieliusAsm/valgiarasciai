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
        var_dump($eatings);
        return view('diets',['id'=>$id,'eatings'=>$eatings,'pivot'=>$pivotArray]);
    }

    // TODO: sql injection protection
    public function saveDiet(Request $request, $id){
        //return redirect("/login");
        //$json = "[{\"type\":\"Pusryčiai\",\"time\":\"8:00\",\"rows\":[{\"id\":1,\"pavadinimas\":\"Agurkų sriuba\",\"baltymai\":1.21,\"riebalai\":1.27,\"angliavandeniai\":10.51,\"cholesterolis\":0,\"eVerte\":54.33,\"tipas\":\"Sriuba\",\"quantity\":100},{\"id\":486,\"pavadinimas\":\"Chalva\",\"baltymai\":11.6,\"riebalai\":29.9,\"angliavandeniai\":54.6,\"cholesterolis\":0,\"eVerte\":517,\"tipas\":\"Saldumynai\",\"quantity\":200}]},{\"type\":\"Priešpiečiai\",\"time\":\"11:00\",\"rows\":[{\"id\":17,\"pavadinimas\":\"Ryžių sriuba su pomidorais\",\"baltymai\":0.85,\"riebalai\":3.59,\"angliavandeniai\":3.46,\"cholesterolis\":10.63,\"eVerte\":47.62,\"tipas\":\"Sriuba\",\"quantity\":100}]},{\"type\":\"Pietūs\",\"time\":\"13:00\",\"rows\":[{\"id\":359,\"pavadinimas\":\"Džiūvėsiai\",\"baltymai\":9.7,\"riebalai\":1,\"angliavandeniai\":76.8,\"cholesterolis\":0,\"eVerte\":350,\"tipas\":\"Duona\",\"quantity\":100},{\"id\":12,\"pavadinimas\":\"Raugintų kopūstų sriuba\",\"baltymai\":0.91,\"riebalai\":1.23,\"angliavandeniai\":2.88,\"cholesterolis\":0,\"eVerte\":24.11,\"tipas\":\"Sriuba\",\"quantity\":100}]},{\"type\":\"Pavakariai\",\"time\":\"16:00\",\"rows\":[]},{\"type\":\"Vakarienė\",\"time\":\"18:00\",\"rows\":[]},{\"type\":\"Naktipiečiai\",\"time\":\"21:00\",\"rows\":[]}]";
        $array =  $request->json()->all();
        //var_dump($masyvas);
        $id = 1;
        $eatingId=-1;

        $diet = new Diet();
        $diet->user_id = $id;
        $diet->total_days = 1;
        $diet->notes = "";
        $diet->created = Carbon::now();
        $diet->total_eating = 6; // you dont need this since you get all related by id
        $diet->save();

        for($i=0;$i<count($array);$i++){
            var_dump($array[$i]);
            for($b=0;$b<count($array[$i]['rows']);$b++){
                $row = $array[$i]['rows'][$b];
                //var_dump($row);
                if($eatingId==-1) {
                    $eating = new Eating();
                    $eating->eating_type = $array[$i]['type'];
                    $eating->eating_time = $array[$i]['time'];
                    $eating->recommended_rate = 0;
                    $eating->baltymai = $array[$i]['bendraVerte']['baltymai'];
                    $eating->riebalai = $array[$i]['bendraVerte']['riebalai'];
                    $eating->angliavandeniai = $array[$i]['bendraVerte']['angliavandeniai'];
                    $eating->cholesterolis = $array[$i]['bendraVerte']['cholesterolis'];
                    $eating->eVerte = $array[$i]['bendraVerte']['eVerte'];
                    $eating->save();
                    $eatingId = $eating->id;
                }
                $diet->eating()->attach($eatingId,['day'=>($i+1)]);
                $eating->product()->attach($row['id'],['quantity'=>$row['quantity']]);
            }
            $eatingId=-1;
        }
        return $array;
    }
}
