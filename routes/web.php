<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::controller(AuthController::class)->group(function () {
    Route::middleware('auth', 'isAdmin')->group(function () {
        Route::get('redirect', 'redirect');
    });
});


Route::get("change/{lang}", function($lang){
    if ($lang == "en") {
        session()->put("lang", "en");
    } else {
        session()->put("lang", "ar");
    }
    return redirect()->back();
});

Route::controller(ProductController::class)->group( function(){
   

        Route::middleware('auth', 'isAdmin')->group(function(){
            
            Route::get('products', 'all');
            // show one
            Route::get('products/show/{id}',"show");
            Route::get('products/create', 'create');
            Route::post('products', 'store');
            
            // update
            Route::get("products/edit/{id}","edit");
            Route::put("products/{id}","update")->name('update');
            
            Route::delete('products/{id}', 'delete');
       
    });
});

Route::controller(UserController::class)->group(function(){
    Route::get('', 'all');
    Route::get('products/{id}', 'show');
    Route::get('search', 'search');
    Route::post('addToWishlist/{id}', 'addToWishlist');
    Route::get('wishlist', 'wishlist');
    
    Route::middleware('auth')->group(function(){
        Route::post('addToFav/{id}', 'addToFav');
        Route::post('addToCart/{id}', 'addToCart');
        Route::get('myCart', 'myCart');
        Route::post('makeOrder', 'makeOrder');
    });
});
Route::post('favorites', [FavoriteController::class, 'addToFav']);