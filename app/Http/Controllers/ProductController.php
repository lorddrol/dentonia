<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function index(){
        $productCart = Product::select(["id","name","price"])->paginate(2);
        return view('cataloge',[
            'productCart' => $productCart]);
    }
    function viewproduct($id) {
        $product = Product::Where('id',$id)->first();
        $comment = Comment::where('product_id', $id)->get();
        if(Auth::check()){
        $cart = Cart::where(['product_id' => $id, 'user_id' => Auth::user()->id])->first();
        return view('product',[
            'p' => $product,
            'comment' => $comment,
            'c' => $cart,
        ]);
        }
        return view('product',[
            'p' => $product,
            'comment' => $comment,
            'c' => '',
        ]);
    }
}
