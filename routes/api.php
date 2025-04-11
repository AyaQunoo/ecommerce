<?php

use App\Http\Controllers\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::controller(ProductApiController::class)->group(function () {

    Route::get('/products', "all");
    Route::get('/product/{id}', "show");

    Route::post('/products', "store");
    Route::delete("/product/{id}", "delete");
    Route::put('/product/{id}', "update");
});
