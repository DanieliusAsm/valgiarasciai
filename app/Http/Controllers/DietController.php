<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Diet;
use App\Eating;
use Carbon\Carbon;

class DietController extends Controller
{
    public function getProducts($id){
        $products = Product::all();

        return view('adddiet',['id'=>$id,'products'=>$products]);
    }

    public function getUserDiets($id){
        $diets = Diet::with('eating')->get();
        $eatings = Eating::with('product')->get();
        //var_dump($eatings->toArray());

        foreach($eatings as $eat){
            var_dump($eat->toArray());
        }

        // loop through diets. Usually only 1 diet.
        foreach($diets as $diet){
            $eating = $diet->eating;
            //var_dump($eating->toArray());

            echo "here goes EVERYTHING";
            
        }

        return view('diets',['id'=>$id]);
    }

    public function saveDiet(/*Request $request, $id*/){
        //return redirect("/login");
        $json = "[{\"type\":\"Pusryčiai\",\"time\":\"8:00\",\"rows\":[{\"id\":1,\"pavadinimas\":\"Agurkų sriuba\",\"baltymai\":1.21,\"riebalai\":1.27,\"angliavandeniai\":10.51,\"cholesterolis\":0,\"eVerte\":54.33,\"tipas\":\"Sriuba\",\"quantity\":100},{\"id\":486,\"pavadinimas\":\"Chalva\",\"baltymai\":11.6,\"riebalai\":29.9,\"angliavandeniai\":54.6,\"cholesterolis\":0,\"eVerte\":517,\"tipas\":\"Saldumynai\",\"quantity\":200}]},{\"type\":\"Priešpiečiai\",\"time\":\"11:00\",\"rows\":[{\"id\":17,\"pavadinimas\":\"Ryžių sriuba su pomidorais\",\"baltymai\":0.85,\"riebalai\":3.59,\"angliavandeniai\":3.46,\"cholesterolis\":10.63,\"eVerte\":47.62,\"tipas\":\"Sriuba\",\"quantity\":100}]},{\"type\":\"Pietūs\",\"time\":\"13:00\",\"rows\":[{\"id\":359,\"pavadinimas\":\"Džiūvėsiai\",\"baltymai\":9.7,\"riebalai\":1,\"angliavandeniai\":76.8,\"cholesterolis\":0,\"eVerte\":350,\"tipas\":\"Duona\",\"quantity\":100},{\"id\":12,\"pavadinimas\":\"Raugintų kopūstų sriuba\",\"baltymai\":0.91,\"riebalai\":1.23,\"angliavandeniai\":2.88,\"cholesterolis\":0,\"eVerte\":24.11,\"tipas\":\"Sriuba\",\"quantity\":100}]},{\"type\":\"Pavakariai\",\"time\":\"16:00\",\"rows\":[]},{\"type\":\"Vakarienė\",\"time\":\"18:00\",\"rows\":[]},{\"type\":\"Naktipiečiai\",\"time\":\"21:00\",\"rows\":[]}]";
        $array = json_decode($json, true);
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
                    $eatingType = new Eating();
                    $eatingType->eating_type = $array[$i]['type'];
                    $eatingType->eating_time = $array[$i]['time'];
                    $eatingType->recommended_rate = 0;
                    $eatingType->save();
                    $eatingId = $eatingType->id;
                }
                //'product_id'=>$row['id'],'quantity'=>$row['quantity']
                $diet->eating()->attach($eatingId,['day'=>($i+1)]);
                $eatingType->product()->attach($row['id'],['quantity'=>$row['quantity']]);
            }
            $eatingId=-1;
        }
    }
}
