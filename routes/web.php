<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =======================================================
// 1. ROUTE UTAMA: / (GUEST DASHBOARD)
// Memastikan halaman root selalu menampilkan view 'guest' (Toko Online).
// TIDAK ADA cek auth() di sini, sehingga sesi admin/seller tidak memaksa redirect.
// =======================================================
Route::get('/', function () {
    // Memanggil view yang berisi desain toko online (guest.blade.php)
    return view('guest'); 
})->name('guest.dashboard'); 


// =======================================================
// 2. ROUTE /dashboard UNTUK REDIRECT BERDASARKAN ROLE (Setelah Login)
// Ini adalah route yang dipanggil setelah otentikasi sukses.
// =======================================================
Route::get('/dashboard', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            // Admin diarahkan ke /admin/dashboard
            return redirect()->route('admin.dashboard'); 
        }
        if ($role === 'seller') {
            // Seller diarahkan ke /seller/dashboard
            return redirect()->route('seller.dashboard'); 
        }
        
        // Default: Jika role tidak dikenali (misalnya customer biasa), kembali ke view tamu
        return view('guest'); 
    }
    
    // Jika entah bagaimana route ini diakses tanpa auth, kembalikan ke root
    return redirect('/');

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.delete');
});

require __DIR__.'/auth.php';

// =======================================================
// 3. PEMUATAN ROUTE ADMIN
// =======================================================

Route::middleware(['web', 'auth']) 
    ->prefix('admin') 
    ->name('admin.') 
    ->group(base_path('routes/admin.php'));

// Pemuatan Seller masih dinonaktifkan sementara
/* Route::middleware(['web', 'auth']) 
    ->prefix('seller') 
    ->name('seller.') 
    ->group(base_path('routes/seller.php'));
*/