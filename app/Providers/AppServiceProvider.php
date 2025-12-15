<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Method ini sekarang kosong dari logic pemuatan route Admin/Seller
        // karena logic tersebut sudah dipindahkan ke routes/web.php.
    }
}