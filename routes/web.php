<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. HALAMAN PUBLIK
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product}', [OrderController::class, 'show'])->name('product.detail');

// 2. DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. AREA PEMBELI
Route::middleware(['auth'])->group(function () {
    Route::post('/product/{product}/order', [OrderController::class, 'store'])->name('order.store');
});

// 4. AREA ADMIN
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/buyers', [AdminDashboardController::class, 'buyers'])->name('admin.buyers');
    Route::post('/admin/make-seller/{id}', [AdminDashboardController::class, 'makeSeller'])->name('admin.makeSeller');
});

// 5. AREA SELLER
Route::middleware(['auth', 'checkRole:seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/seller/add-product', [SellerDashboardController::class, 'create'])->name('seller.product.create');
    Route::post('/seller/add-product', [SellerDashboardController::class, 'store'])->name('seller.product.store');
    Route::get('/seller/edit-product/{id}', [SellerDashboardController::class, 'edit'])->name('seller.product.edit');
    Route::put('/seller/edit-product/{id}', [SellerDashboardController::class, 'update'])->name('seller.product.update');
    Route::delete('/seller/delete-product/{id}', [SellerDashboardController::class, 'destroy'])->name('seller.product.destroy');
});

// 6. PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';