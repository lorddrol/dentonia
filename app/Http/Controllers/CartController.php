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
        $carts = Cart::find(Auth::user()->id)->get();
        return view("cart" , [
            "c" => $carts,
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
        switch ($r->znak) {
            case 'minus':
                $productCountChange = Cart::where("id", $r->id)->select("count")->first();
                $productCountChange->count -= 1;
                Cart::where("id", $r->id)->update(["count" => $productCountChange->count]);
                return response()->json(["count" => $productCountChange->count],200);
                break;
                case 'plinus':
                    $productCountChange = Cart::where("id", $r->id)->select("count")->first();
                    $productCountChange->count += 1;
                    Cart::where("id", $r->id)->update(["count" => $productCountChange->count]);
                    return response()->json(["count" => $productCountChange->count],200);
                    break;

            default:
                break;
        }


    }
    // function cartadd()
}
