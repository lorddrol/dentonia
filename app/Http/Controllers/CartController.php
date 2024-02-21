<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    function cartView(){
        return view("cart");
    }
    function priceProduct(Request $r){
        $productPrice = Product::where("id", $r->id)->select("price")->first();
        if(!empty($productPrice)){
            return response()->json($productPrice, 200);
        } else {
            return response()->json(["errors" => "Товар не найден"], 200);
        }

    }
    // function cartadd()
}
