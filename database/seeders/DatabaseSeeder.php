<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Panggil seeder-seeder yang Anda buat di sini
        $this->call([
            ProductSeeder::class, // Memanggil ProductSeeder
        ]);

        // 2. Buat User Admin dan Seller default
        
        // Contoh User Admin (ID: 1)
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Utama',
                'password' => bcrypt('password'), // Password: password
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Contoh User Seller (ID: 2)
        User::updateOrCreate(
            ['email' => 'seller@example.com'],
            [
                'name' => 'Penjual Toko',
                'password' => bcrypt('password'), // Password: password
                'role' => 'seller',
                'email_verified_at' => now(),
            ]
        );
    }
}