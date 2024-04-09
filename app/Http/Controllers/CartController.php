<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class CartController extends Controller
{
    function cartView(){
        $carts = Cart::where("user_id" ,Auth::user()->id)->get();
        return view("cart" , [
            "carts" => $carts,
        ]);
    }
    function priceProduct(Request $r){
        $productPrice = Product::where("id", $r->id)->select("price")->first();
        if(!empty($productPrice)){
            return response()->json($productPrice, 200);
        } else {
            return response()->json(["errors" => "Товар не найден"], 200);
        }

    }
    function countChangeProduct(Request $r){

        $productCountChange = Cart::select(["id", "product_id","count"])->where("id", $r->id)->first();
        switch ($r->znak) {
            case 'minus':
                $productCountChange->count -= 1;
                Cart::where("id", $r->id)->update(["count" => $productCountChange->count]);
                return response()->json(["count" => $productCountChange->count, "price" => $productCountChange->product->price],200);
                break;
            case 'plinus':
                $productCountChange->count += 1;
                Cart::where("id", $r->id)->update(["count" => $productCountChange->count]);
                return response()->json(["count" => $productCountChange->count, "price" => $productCountChange->product->price],200);
                break;

            default:
                break;
        }


    }
    function cartAdd(Request $r){
        $cartsnowOrHave = Cart::where(["user_id"=> Auth::user()->id, "product_id" => $r->idProduct])->firstOrNew();
        // if($cartsnowOrHave)
        $cartsnowOrHave->user_id = Auth::user()->id;
        $cartsnowOrHave->product_id = $r->idProduct;
        $cartsnowOrHave->count = 1;
        $cartsnowOrHave->save();
        return response()->json($cartsnowOrHave->id,200);

    }
}
