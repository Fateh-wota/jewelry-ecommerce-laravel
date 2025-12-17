<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    /**
     * Tampilan Dashboard Utama Seller
     */
    public function index()
    {
        // Mengambil produk milik seller yang sedang login
        $products = Product::where('user_id', Auth::id())->get();
        
        return view('seller.dashboard', compact('products'));
    }

    /**
     * Form Tambah Produk
     */
    public function create()
    {
        return view('seller.add-product');
    }

    /**
     * Simpan Produk Baru ke Database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('seller.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }
}