<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ApiProductController::class)->group(function(){
    Route::middleware("apiAuth")->group(function(){

        Route::get('products', 'all');
        
        // show one
        Route::get('products/show/{id}',"show");
        
        // create
        Route::post('products', 'store');
        
        // update
        
        Route::put("products/{id}","update")->name('update');
        
        Route::delete('products/{id}', 'delete');
        
    });
});

Route::controller(ApiAuthController::class)->group(function (){
    Route::post("register", 'register');
    Route::post("login", 'login');
    Route::post("logout", 'logout');
});