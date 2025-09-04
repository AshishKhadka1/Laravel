<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/add-task', [TaskController::class, 'index'])->name('tasks.create');
    Route::post('/task-store', [TaskController::class, 'store'])->name('tasks.store');
    // Route::patch('/profile', [TaskController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [TaskController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks', [TaskController::class, 'display'])->name('tasks.list');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});
require __DIR__.'/auth.php';
