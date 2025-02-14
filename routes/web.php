<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management Routes using Permission Middleware
    Route::get('/users', [UserController::class, 'index'])->middleware('can:read users')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('can:create users')->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->middleware('can:create users')->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('can:update users')->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->middleware('can:update users')->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('can:delete users')->name('users.destroy');
});

require __DIR__ . '/auth.php';
