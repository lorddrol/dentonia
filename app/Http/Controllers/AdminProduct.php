<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminProduct extends Controller
{
    function view(){
        $category = Category::get();
        $products = Product::get();
        return view('AdminCataloge', ['products' => $products, 'category' => $category]);
    }
    function viewproduct($id) {
        $product = Product::Where('id',$id)->first();
        $category = Category::get();
        return view('EditProduct',[
            'p' => $product,
            'category' => $category,
        ]);
    }
    function UpdateProduct(Request $r){
        // $validator = Validator::make($r->all(),[
        //     'rating' => 'required',
        //     'comment' => 'required|string',
        //     'email' => 'required|string|unique:App\Models\Comment,email',
        //     'fio' => 'required|string',
        // ]);
        // if($validator->fails()){
        //     return response()->json(["errors" => $validator->errors()], 422);
        // }
        $id = $r->id;
        $product = Product::where('id', $id)->first();
        $product->name = $r->name;
        $product->category_id = $r->category_id;
        $product->price_user = $r->price_user;
        $product->price_doctor = $r->price_doctor;
        $product->advantages = $r->advantages;
        $product->structure = $r->structure;
        $product->discription = $r->discription;
        $product->application = $r->application;
        $product->save();
        return redirect()->route('admin.cataloge');
    }
    function deleteProduct(Request $r){
        Product::where('id', $r->id)->delete();
        return redirect()->route('admin.cataloge');
    }
    function createProduct(Request $r){
        $product = new Product();
        $product->id = $r->id;
        $product->name = $r->name;
        $product->category_id = $r->category_id;
        $product->price_user = $r->price_user;
        $product->price_doctor = $r->price_doctor;
        $product->advantages = $r->advantages;
        $product->structure = $r->structure;
        $product->discription = $r->discription;
        $product->application = $r->application;
        $product->save();
        return redirect()->route('admin.cataloge');
    }
    function viewCreateProduct(){
        $category = Category::get();
        return view('AdminProductCreate', ['category' => $category]);
    }
}
