<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Kita matikan dulu ProductSeeder agar tidak error 'SET FOREIGN_KEY_CHECKS' di SQLite
        // $this->call([
        //     ProductSeeder::class, 
        // ]);

        // 2. Buat User Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Utama',
                'password' => Hash::make('12345678'), 
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 3. Buat User Seller
        User::updateOrCreate(
            ['email' => 'seller@example.com'],
            [
                'name' => 'Penjual Toko Jewelry',
                'password' => Hash::make('12345678'),
                'role' => 'seller',
                'email_verified_at' => now(),
            ]
        );

        // 4. Buat User Buyer
        User::updateOrCreate(
            ['email' => 'buyer@example.com'],
            [
                'name' => 'Budi Pembeli',
                'password' => Hash::make('12345678'),
                'role' => 'buyer',
                'email_verified_at' => now(),
            ]
        );
    }
}