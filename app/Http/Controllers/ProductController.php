<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class ProductController extends Controller
{
    function index(){
        $productCart = Product::select(["id","name","price"])->paginate(2);
        return view('cataloge',[
            'productCart' => $productCart]);
    }
    function viewproduct($id) {
        $product = Product::firstWhere('id',$id);
        $comment = Comment::where('product_id', $id)->get();
        return view('product',[
            'p' => $product,
            'comment' => $comment,
        ]);
    }
}
