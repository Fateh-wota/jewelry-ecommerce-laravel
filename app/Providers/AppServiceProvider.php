<?php
    
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    // ... (kode lainnya)

    public function boot(): void
    {
        // ... (Jika sudah ada kode lain di sini, biarkan saja)

        // =======================================================
        // TAMBAHKAN KODE INI UNTUK MENGAKTIFKAN routes/admin.php
        // =======================================================
        $this->mapAdminRoutes();
        // =======================================================
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth', 'role:admin']) // Gunakan middleware yang sudah kita buat
            ->prefix('admin') // URL dimulai dengan /admin
            ->name('admin.') // Nama route dimulai dengan admin.
            ->group(base_path('routes/admin.php'));
    }
}
