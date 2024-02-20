<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class ProductController extends Controller
{
    function index(){
        return view('cataloge');
    }
    function viewproduct($id) {
        $product = Product::firstWhere('id',$id);
        $comment = Comment::where('product_id', $id)->get();
        return view('product',[
            'p' => $product,
            'c' => $comment,
        ]);
    }
}
