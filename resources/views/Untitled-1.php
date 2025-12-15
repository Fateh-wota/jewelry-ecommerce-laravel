<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController; // ASUMSI: Menggunakan GuestController
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminDashboardController; 

// === GUEST / FRONTEND ROUTES ===
Route::get('/', [GuestController::class, 'index'])->name('home');

// Rute Detail Produk (Guest)
Route::get('/product/{product}', [GuestController::class, 'show'])->name('product.show'); 

// === ADMIN ROUTES ===
// Jika Anda menggunakan middleware auth bawaan Laravel/breeze/jetstream, pastikan rute ini dilindungi
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
});

// ... (Jika ada rute login/register/logout lainnya, tambahkan di sini)