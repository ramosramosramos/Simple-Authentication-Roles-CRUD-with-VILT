<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::inertia('/', 'User/Dashboard')->name('dashboard');
    Route::resource('/products', ProductController::class);
});

// -----------------------------Authentication------------------------------------
// -----------------------------Authentication------------------------------------
Route::inertia('/login', 'Auth/Login')->name('login');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
