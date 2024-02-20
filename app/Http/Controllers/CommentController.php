<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function commentadd (Request $r, $id) {
    $validator = Validator::make($r->all(),[
        'rating' => 'required',
        'comment' => 'required|string',
    ]);
    if($validator->fails()){
        return response()->json($validator->errors(), 422);
    }
    Comment::Create([
        'comment' => $r->comment,
        'star' => $r->rating,
        'product_id' => $id,
        'user_id' => Auth::user()->id,
    ]);
    return response()->json(["success" => true], 200);
    }
}
