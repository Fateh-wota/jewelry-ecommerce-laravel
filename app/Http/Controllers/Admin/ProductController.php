<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Product; // Uncomment jika Model Product sudah dibuat

class ProductController extends Controller
{
    /**
     * Menampilkan detail satu produk.
     * Kita menggunakan $slug sebagai identifikasi unik (misalnya: diamond-ring-gold).
     */
    public function show($slug)
    {
        // --- LOGIKA PENGAMBILAN DATA PRODUK (Future Work) ---
        
        // Contoh: Ambil data produk berdasarkan slug
        /*
        $product = Product::where('slug', $slug)->firstOrFail();
        
        return view('guest.product-detail', compact('product'));
        */

        // Untuk saat ini, kita kembalikan view dummy agar tidak error.
        return view('guest.product-detail', ['product_name' => str_replace('-', ' ', $slug)]);
    }
}