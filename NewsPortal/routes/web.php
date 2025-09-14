<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'index'])->name('news.index');

Route::middleware('auth')->group(function () {
    Route::get('/admin/news/add', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/news/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('admin/categories.index', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('admin/categories.create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories.store', [CategoriesController::class, 'store'])->name('categories.store');
});

    
require __DIR__ . '/auth.php';
