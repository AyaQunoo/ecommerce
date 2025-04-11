<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\user\ProductController as UserProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::paginate(3);
    return view('user.home', ["products" => $products]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/redirect", [Authcontroller::class, "redirect"])->name('home');
Route::controller(ProductController::class)->group(function () {
    Route::middleware("isAdmin")->group(function () {
        Route::get('/products', "all");
        Route::get('/products/create', "create");
        Route::post('/products', "store");
        Route::delete("/product/{id}", "delete");
        Route::get('/products/edit/{id}', "edit");
        Route::put('/product/{id}', "update");
    });
});
Route::controller(HomeController::class)->group(function () {

    Route::get('/product/{id}', "show");

    Route::middleware("auth")->group(function () {
        Route::post('/addToFav/{id}', "addToFav");
        Route::post('/addToCart/{id}', "addToCart");
        Route::get('/mycart', "myCart");
        Route::post('/makeorder', "makeOrder");
    });
});

Route::controller(UserProductController::class)->group(function () {

    Route::get('/products', "all");
});
