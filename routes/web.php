<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =======================================================
// ROUTE UTAMA: / (GUEST DASHBOARD)
// Selalu tampilkan halaman 'welcome' sebagai Dashboard Tamu.
// =======================================================
Route::get('/', function () {
    return view('welcome');
})->name('guest.dashboard'); 


// =======================================================
// ROUTE /dashboard UNTUK REDIRECT BERDASARKAN ROLE (Setelah Login)
// Ini menangani apa yang terjadi segera setelah login sukses.
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
        
        // Default: Kembalikan ke welcome page
        return view('welcome'); 
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
// PEMUATAN ROUTE ADMIN
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