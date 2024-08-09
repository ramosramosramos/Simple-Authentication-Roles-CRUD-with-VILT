<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::inertia('/','User/Dashboard')->name('dashboard');
Route::resource('/products',ProductController::class);
