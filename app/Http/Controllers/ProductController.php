<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Recipe;

class ProductController extends Controller
    {
    public function addProduct(ProductRequest $request){
        $product = new Product();

        $product->product_name = $request->input('pavadinimas');
        $product->protein = $request->input('baltymai');
        $product->fat = $request->input('riebalai');
        $product->carbs = $request->input('angliavandeniai');
        $product->cholesterol = $request->input('cholesterolis');
        $product->energy_value = $request->input('eVerte');
        $product->product_type = $request->input('tipas');

        $product->save();

        return redirect('/products');
    }
    public function addProductView(){
            $tipas =  Product::select('product_type')->distinct()->get();

            return view('addproduct',['tipas'=>$tipas]);
    }
    public function getProducts()
    {
        $products = Product::with('Recipe')->get();
        //echo $products;

        $productoTipas =  Product::select('product_type')->distinct()->get();

        return view('products',['products'=>$products,'productoTipas'=>$productoTipas]);
    }
    public function deleteProduct($id) {
        $product = Product::find($id);

        if (!empty($product)) {
            $product->delete();
        }

        return redirect('/products');
    }

    public function addRecipe($id, RecipeRequest $request){
        if($request->hasFile('file') and $request->file('file')->isValid()){
            $recipe = new Recipe();
            $recipe->product_id=$id;
            $recipe->recipe=$request->input('recipe');
            $recipe->image_name=$request->file('file')->getClientOriginalName();
            $recipe->save();
            $file = $request->file('file');
            $file->move('img', $file->getClientOriginalName());
            echo '<img src="' . asset('img/') .'/'.   $file->getClientOriginalName() . '">';

            return redirect('/products');
        }
    }

    public function getProduct($id){
        $products = Product::find($id);

        $tipas =  Product::select('product_type')->distinct()->get();

        return view('editproduct',['products'=>$products, 'id'=>$id,'tipas'=>$tipas]);
    }

    public function editProduct($id, ProductRequest $request){
        $product = Product::find($id);

        $product->product_name = $request->input('pavadinimas');
        $product->protein = $request->input('baltymai');
        $product->fat = $request->input('riebalai');
        $product->carbs = $request->input('angliavandeniai');
        $product->cholesterol = $request->input('cholesterolis');
        $product->energy_value = $request->input('eVerte');
        $product->product_type = $request->input('tipas');

        $product->save();

        return redirect("/products");
     }
}