<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        return view('cataloge');
    }
    function viewproduct($id) {
        $id1 = 1;
        $product = Product::firstOrNew(['id' =>$id1]);
        return view('product',[
            'p' => $product,
        ]);
    }
}
