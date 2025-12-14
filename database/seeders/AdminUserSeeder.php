<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <-- PENTING: Kelas User
use Illuminate\Support\Facades\Hash; // <-- PENTING: Untuk enkripsi password

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin Utama
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@jewelry.test',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // 2. Seller Sampel
        User::create([
            'name' => 'Sample Seller',
            'email' => 'seller@jewelry.test',
            'role' => 'seller',
            'password' => Hash::make('password'),
        ]);

        // 3. Customer Sampel
        User::create([
            'name' => 'Sample Customer',
            'email' => 'customer@jewelry.test',
            'role' => 'customer',
            'password' => Hash::make('password'),
        ]);
    }
}