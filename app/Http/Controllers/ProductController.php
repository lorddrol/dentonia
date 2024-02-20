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
        $comment = Comment::find(['product_id' => $id]);
        dd($comment[0]);
        return view('product',[
            'p' => $product,
            'c' => $comment,
        ]);
    }
}
