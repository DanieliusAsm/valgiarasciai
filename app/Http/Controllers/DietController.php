<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class DietController extends Controller
{
    public function getProducts($id){
        $products = Product::all();

        return view('adddiet',['id'=>$id,'products'=>$products]);
    }
}
