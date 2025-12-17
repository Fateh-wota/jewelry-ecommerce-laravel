<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun Seller
        \App\Models\User::create([
            'name' => 'Toko Emas Jaya',
            'email' => 'seller@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'seller',
        ]);

        // Akun Buyer
        \App\Models\User::create([
            'name' => 'Budi Pembeli',
            'email' => 'buyer@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'buyer',
        ]);
    }
}
