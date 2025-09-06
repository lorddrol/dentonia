<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCataloge;
use App\Http\Controllers\AdminCategoryController;
use App\Http\controllers\CommentController;
use App\Http\controllers\CartController;
use App\Http\Controllers\catalogController;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\AdminProduct;

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
    Route::get("/cart", [CartController::class, "cartView"])->name("cartView");
    Route::post("/cart/price", [CartController::class, "priceProduct"])->name("priceProduct");
    Route::post("/cart/countChange", [CartController::class, "countChangeProduct"])->name("countChangeProduct");
    Route::post("/cart/delete", [CartController::class, "deleteCartProduct"])->name("countChangeProduct");
    Route::post("/cart/add", [CartController::class, "cartAdd"])->name("addCart");
});
Route::get("/admin/viewCategory", [AdminCategoryController::class, "viewCategory"])->name("admin.viewCategory");
Route::post("/admin/createCategory", [AdminCategoryController::class, "createCategory"])->name("admin.createCategory");
Route::post("/admin/editCategory", [AdminCategoryController::class, "editCategory"])->name("admin.editCategory");
Route::post("/admin/deleteCategory", [AdminCategoryController::class, "deleteCategory"])->name("admin.deleteCategory");
Route::get("/admin/createProduct", [AdminProduct::class, "viewCreateProduct"])->name("admin.viewCreateProduct");
Route::post("/admin/createProduct", [AdminProduct::class, "createProduct"])->name("admin.createProduct");
Route::post("/admin/deliteProduct", [AdminProduct::class, "deleteProduct"])->name("admin.deleteProduct");
Route::post("/admin/editProduct", [AdminProduct::class, "UpdateProduct"])->name("admin.editproduct");
Route::get("/admin/product/{id}", [AdminProduct::class, "viewproduct"])->name("admin.viewproduct");
Route::get("/admin/cataloge", [AdminProduct::class, "view"])->name("admin.cataloge");
Route::get('/cataloge/filter', [ProductController::class, 'filter']);
Route::get("/cataloge", [catalogController::class, "view"])->name("cataloge");
Route::get("/product/{id}", [ProductController::class, "viewproduct"])->name("viewproduct");
Route::post("/commentadd/{id}", [CommentController::class, "commentadd"])->name("commentadd");
