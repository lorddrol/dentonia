<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    function viewCategory(){
        $category = Category::get();
        return view('AdminCategory', ['category' => $category]);
    }

    function CategoryCreate(Request $r){
        $category = new Category();
        $category->name = $r->name;
        $category->categories_id = $r->categories_id;
        $category->save();
        return redirect()->route('viewCategory');
    }

    function editCategory(Request $r){
        $category = Category::where('id', $r->id)->first();
        $category->name = $r->name;
        $category->categories_id = $r->categories_id;
        $category->save();
        return redirect()->route('viewCategory');
    }
}
