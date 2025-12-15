// routes/admin.php
<?php 
// Perintah 'use' harus berada di dalam tag PHP
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\CategoryController; 
use Illuminate\Support\Facades\Route; // Wajib: Pastikan Route Facade di-import

Route::middleware('auth', 'role:admin')->group(function () { 
    // ... (rute Anda)
});

// Tidak perlu tag penutup PHP (?>) di file route