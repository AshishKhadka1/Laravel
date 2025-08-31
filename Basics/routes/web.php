<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// shortcut 
// Route::view('/home','home');

//Redirect
// Route::redirect('/home',destination: '/');

Route::get('/home', function () {
    return view(view: 'home');
});

Route::get('/about/{name}', function ($name) {
    return view('about',['name'=>$name]);
});

// CONTROLLER Practice
Route::get('user', action: [UserController::class, 'getUser']);
Route::get('user/{name}', action: [UserController::class, 'getUserName']);
Route::get('admin/{name}', action: [UserController::class, 'adminLogin']);

// view Practice 
Route ::get('user-home', [UserController::class, 'userHome']);