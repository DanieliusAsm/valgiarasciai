<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Diet;
use App\DietEatingProduct;
use App\Eating;
use Carbon\Carbon;

class DietController extends Controller
{
    public function getProducts($id){
        $products = Product::all();

        return view('adddiet',['id'=>$id,'products'=>$products]);
    }

    public function getUserDiets($id){
        // method name $diet = Diet::with("eatingType.dietFood")->get()->find($id)->toArray();
        //Diet::where('user_id',$id)->with('eatingType.dietFood')->get()->toArray()
        \DB::listen(function($sql) {
            //var_dump($sql);
        });
        $diet = Diet::where('user_id',$id)->with(['eatingType','dietFood'])->toSql();
        //$diet->with('eatingType')->where('eating_types.diet_id','22');
        //$diet->with('dietFood')->get()->toArray();
        dd($diet);

        //dd($diet);


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
                    $eatingType = new EatingType();
                    $eatingType->diet_id = $diet->id;
                    $eatingType->eating_type = $array[$i]['type'];
                    $eatingType->eating_time = $array[$i]['time'];
                    $eatingType->recommended_rate = 0;
                    $eatingType->save();
                    $eatingId = $eatingType->id;
                }

                $dietFood = new DietFood();
                $dietFood->product_id = $row['id'];
                $dietFood->eating_type_id = $eatingId;
                $dietFood->day = ($i+1);
                $dietFood->quantity = $row['quantity'];
                $dietFood->save();
            }
            $eatingId=-1;
        }
    }
}
