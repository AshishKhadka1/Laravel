<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

// CRUD operation
Route::get('/category/create', [\App\Http\Controllers\CategoryController::class, 'create']);

Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);

Route::get('/category/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);

Route::post('/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);

Route::post('/category/store', [\App\Http\Controllers\CategoryController::class, 'store']);


Route::get('/category/index', [\App\Http\Controllers\CategoryController::class, 'index']);

Route::get('/brand', [\App\Http\Controllers\BrandController::class, 'index']);
Route::get('/brand/create', [\App\Http\Controllers\BrandController::class, 'create']);
Route::get('/brand/edit/{id}', [\App\Http\Controllers\BrandController::class, 'edit']);
Route::post('/brand/store', [\App\Http\Controllers\BrandController::class, 'store']);
Route::post('/brand/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [\App\Http\Controllers\BrandController::class, 'destroy']);

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/product/store', [\App\Http\Controllers\ProductController::class, 'store']);
Route::post('/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::get('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);


// Route::get('/product/list', [\App\Http\Controllers\ProductController::class, 'index']);
// Route::get('/product/form', [\App\Http\Controllers\ProductController::class, 'maformho']);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; 



