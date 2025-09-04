<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    function registration(AuthRequest $r)
    {

        User::Create([
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);
        Auth::attempt(['email' => $r->email, 'password' => $r->password]);
        Auth::user()->refresh();

        return response()->json(['success' => true], 200);
    }

    function auth(AuthRequest $r)
    {
        
        if (Auth::attempt(['email' => $r->email, 'password' => $r->password,])) {
            Auth::user()->refresh();
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['errors' => ['password' => 'Некорректные учетные данные']], 422);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
