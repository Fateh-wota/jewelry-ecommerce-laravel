<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController; 

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Pengelolaan Kategori
Route::resource('categories', CategoryController::class);