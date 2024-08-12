<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.main');
});

// First
Route::get('/contact', function(){
    return view('backend.pages.contact');

});

// Second
Route::get('/about', function(){
    return view('backend.pages.about');
});

// third
Route::get('/home', function(){
    return view('backend.home.home');
});

Route::get('/category/create', [\App\Http\Controllers\CategoryController::class, 'create']);

Route::get('/product/list', [\App\Http\Controllers\productController::class, 'index']);
Route::get('/product/form', [\App\Http\Controllers\productController::class, 'maformho']);
