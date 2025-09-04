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

Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/admin', 'admin.login');

// CONTROLLER Practice
Route::get('user', action: [UserController::class, 'getUser']);
Route::get('user/{name}', action: [UserController::class, 'getUserName']);
Route::get('admin/{name}', action: [UserController::class, 'adminLogin']);

// view Practice 
Route ::get('user-home', action: [UserController::class, 'userHome']);
Route ::get('user-about/{name}', action: [UserController::class, 'userAbout']);
Route ::get('admin-login', action: [UserController::class, 'adminLogin']);