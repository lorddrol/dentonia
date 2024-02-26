<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    function registration(Request $r){
        $Validator = Validator::make($r -> all(),[
            'email' => 'required|string|unique:App\Models\User,email',
            'password' => 'required|string|min:6',
        ]);

    if($Validator->fails()){
        return response()->json(["errors" =>[
            'password' => 'Некорректные учетные данные']], 422);
    }

    User::Create([
        'email' => $r->email,
        'password' => Hash::make($r->password),
    ]);
    Auth::attempt(['email' => $r->email, 'password' => $r->password]);
    Auth::user()->refresh();

    return response()->json(['success' => true], 200);
}
    function auth(Request $r){
        $Validator = Validator::make($r -> all(),[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if($Validator->fails()){
            return response()->json(['errors' => $Validator->errors()], 422);
        }
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password,])){
            Auth::user()->refresh();
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['errors' => ['password' => 'Некорректные учетные данные']], 422);
        }
    }

    function validatorEmail($e){
        $Validator = Validator::make($e -> all(),[
            'email' => 'required|string',
        ]);
        if($Validator->fails()){
            return response()->json(['errors' => $Validator->errors()], 422);
        }
    }
    function logout(){
        Auth::logout();
        return redirect(route('home'));
    }
}
