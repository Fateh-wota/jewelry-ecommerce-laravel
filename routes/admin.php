<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController; // Import Controller yang baru dibuat

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Semua route di file ini memiliki prefix 'admin/' dan menggunakan middleware 'auth'.
|
*/

// Route Default Admin Dashboard (Contoh yang sudah Anda buat)
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


// =======================================================
// Product Management (CRUD Resource)
// =======================================================
Route::resource('products', ProductController::class);