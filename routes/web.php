<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\controllers\CommentController;
use App\Http\controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {return view("main");})->name("home");

Route::middleware(["guest"])->group(function () {
    Route::post("/reg", [UserController::class, "registration"])->name("reg");
    Route::post("/auth", [UserController::class, "auth"])->name("auth");
});

Route::middleware(["auth"])->group(function () {
    Route::get("/logout", [UserController::class, "logout"])->name("logout");
});

Route::get("/cataloge", [ProductController::class, "index"])->name("cataloge");
Route::get("/product/{id}", [ProductController::class, "viewproduct"])->name("viewproduct");
Route::post("/commentadd/{id}", [CommentController::class, "commentadd"])->name("commentadd");
Route::get("/cart", [CartController::class, "cartView"])->name("cartView");
