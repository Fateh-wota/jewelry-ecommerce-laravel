<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // WAJIB DI-IMPORT

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. NONAKTIFKAN pemeriksaan Foreign Key sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        
        // 2. Hapus data lama (Sekarang perintah ini akan berhasil karena FK di-nonaktifkan)
        DB::table('products')->truncate();
        
        // 3. Data Produk
        $products = [
            [
                'name' => 'Diamond Solitaire Ring',
                'description' => 'A classic 1-carat diamond ring in white gold.',
                'price' => 25000000.00,
                'image' => 'images/diamond_ring.jpg',
                'category' => 'Rings',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emerald Pendant Necklace',
                'description' => 'Elegant emerald stone pendant with a delicate silver chain.',
                'price' => 12500000.00,
                'image' => 'images/emerald_necklace.jpg',
                'category' => 'Necklaces',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rose Gold Bangle',
                'description' => 'Simple yet stunning 18k rose gold bangle bracelet.',
                'price' => 8750000.00,
                'image' => 'images/rose_bangle.jpg',
                'category' => 'Bracelets',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Simple Pearl Stud Earrings',
                'description' => 'Classic pearl stud earrings suitable for everyday wear.',
                'price' => 1500000.00,
                'image' => 'images/pearl_earrings.jpg',
                'category' => 'Earrings',
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // 4. Masukkan data ke tabel 'products'
        DB::table('products')->insert($products);
        
        // 5. AKTIFKAN KEMBALI pemeriksaan Foreign Key (PENTING!)
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}