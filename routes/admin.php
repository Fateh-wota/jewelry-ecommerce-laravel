<?php 
// Wajib: Import class Controller yang dibutuhkan
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\CategoryController; 
use Illuminate\Support\Facades\Route; 

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Semua route di file ini otomatis menggunakan:
| - Prefix: /admin
| - Name Prefix: admin.
| - Middleware: ['web', 'auth']
| karena didefinisikan di routes/web.php
|
*/

// Route Dashboard (Contoh: /admin/dashboard)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    
// Route Resource untuk Category (Contoh: /admin/categories)
// Ini akan membuat 7 route sekaligus (index, create, store, show, edit, update, destroy)
Route::resource('categories', CategoryController::class);

// Anda dapat menambahkan route admin lain di sini