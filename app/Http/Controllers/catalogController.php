<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class catalogController extends Controller
{
    function view(){
        $category = Category::get();
        $products = Product::get();

        return view('cataloge', ['products' => $products, 'category' => $category]);
    }
}
