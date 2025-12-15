<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Seller\SellerDashboardController; 
use App\Http\Controllers\Buyer\BuyerDashboardController; 


/* ---------------------------------- */
/* --------- GUEST/HOME ROUTES -------- */
/* ---------------------------------- */
Route::get('/', [GuestController::class, 'index'])->name('home');

// Rute Detail Produk (yang sudah kita perbaiki sebelumnya)
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show'); 


/* ---------------------------------- */
/* ------ AUTH (LOGIN/LOGOUT) ROUTES ----- */
/* ---------------------------------- */

// Login form hanya bisa diakses oleh tamu (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/* ---------------------------------- */
/* --------- DASHBOARD ROUTES --------- */
/* ---------------------------------- */
Route::middleware(['auth'])->group(function () {
    
    // 1. ADMIN DASHBOARD
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

    // 2. SELLER DASHBOARD
    Route::prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');
    });

    // 3. BUYER DASHBOARD
    Route::prefix('user')->name('buyer.')->group(function () {
        Route::get('/dashboard', [BuyerDashboardController::class, 'index'])->name('dashboard');
    });
});