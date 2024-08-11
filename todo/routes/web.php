<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// First
Route::get('/contact', function(){
    return view('contact');

});

// Second
Route::get('/product', function(){
    return view('product.product');
});

Route::get('/product/list', [\App\Http\Controllers\productController::class, 'index']);
Route::get('/product/form', [\App\Http\Controllers\productController::class, 'maformho']);
