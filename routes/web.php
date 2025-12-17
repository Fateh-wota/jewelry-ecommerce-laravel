<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Depan
Route::get('/', function () {
    return view('welcome');
});

// 2. Dashboard User Biasa (Bawaan Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. AREA ADMIN (Middleware Auth + CheckRole Admin)
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Manajemen Buyer
    Route::get('/admin/buyers', [AdminDashboardController::class, 'buyers'])->name('admin.buyers');
    
    // Action Jadikan Seller
    Route::post('/admin/make-seller/{id}', [AdminDashboardController::class, 'makeSeller'])->name('admin.makeSeller');
});

// 4. ROUTE PROFILE (Ini yang bikin error tadi kalau nggak ada)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 5. Route Auth (Login, Register, Logout, dll)
require __DIR__.'/auth.php';