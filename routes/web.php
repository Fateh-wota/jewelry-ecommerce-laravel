<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- AREA ADMIN ---
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/buyers', [AdminDashboardController::class, 'buyers'])->name('admin.buyers');
    Route::post('/admin/make-seller/{id}', [AdminDashboardController::class, 'makeSeller'])->name('admin.makeSeller');
});

// --- AREA SELLER ---
Route::middleware(['auth', 'checkRole:seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/seller/add-product', [SellerDashboardController::class, 'create'])->name('seller.product.create');
    Route::post('/seller/add-product', [SellerDashboardController::class, 'store'])->name('seller.product.store');
});

// --- AREA PROFILE ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';