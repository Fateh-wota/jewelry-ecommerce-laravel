<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;

Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');
// Anda akan mendapatkan error Controller not found jika SellerDashboardController belum dibuat.
// Untuk sementara, Anda bisa menggunakan closure agar aman:
/*
Route::get('/dashboard', function () {
    return view('seller.dashboard');
})->name('dashboard');
*/