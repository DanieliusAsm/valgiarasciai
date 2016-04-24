<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller
    {
    public function addProduct(ProductRequest $request){

        $product = new Product();

        $product->pavadinimas = $request->input('pavadinimas');
        $product->baltymai = $request->input('baltymai');
        $product->riebalai = $request->input('riebalai');
        $product->angliavandeniai = $request->input('angliavandeniai');
        $product->cholesterolis = $request->input('cholesterolis');
        $product->eVerte = $request->input('eVerte');
        $product->tipas = $request->input('tipas');

        $product->save();

        return redirect('/products');
    }
    public function addProductView(){

            $tipas =  Product::select('tipas')->distinct()->get();

            return view('addproduct',['tipas'=>$tipas]);
    }
    public function getProducts()
    {
        $products = Product::all();
        $productoTipas =  Product::select('tipas')->distinct()->get();


        return view('products',['products'=>$products,'productoTipas'=>$productoTipas]);
    }
    public function deleteProduct($id) {
        $product = Product::find($id);

        if (!empty($product)) {
            $product->delete();
        }

        return redirect('/products');
    }
    public function getProduct($id){
        $products = Product::find($id);

        $tipas =  Product::select('tipas')->distinct()->get();

        return view('editproduct',['products'=>$products, 'id'=>$id,'tipas'=>$tipas]);
    }

    public function editProduct($id, ProductRequest $request){
        $product = Product::find($id);

        $product->pavadinimas = $request->input('pavadinimas');
        $product->baltymai = $request->input('baltymai');
        $product->riebalai = $request->input('riebalai');
        $product->angliavandeniai = $request->input('angliavandeniai');
        $product->cholesterolis = $request->input('cholesterolis');
        $product->eVerte = $request->input('eVerte');
        $product->tipas = $request->input('tipas');

        $product->save();

        return redirect("/products");
    }
}