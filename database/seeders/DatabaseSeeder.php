<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Buat Akun Seller (Toko Perhiasan Abadi)
        User::create([
            'name' => 'Toko Perhiasan Abadi',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'seller',
        ]);

        // 3. Buat Akun Buyer (Pembeli Setia)
        User::create([
            'name' => 'Budi Pembeli',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
        ]);
    }
}