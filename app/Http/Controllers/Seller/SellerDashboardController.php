<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        // Ambil produk milik seller yang sedang login
        $products = Product::where('user_id', Auth::id())->latest()->get();
        return view('seller.dashboard', compact('products'));
    }

    public function create()
    {
        return view('seller.add-product');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // 2. Simpan ke Database
        Product::create([
            'user_id'     => Auth::id(), // Mengambil ID Seller yang sedang login
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);

        // 3. Redirect balik ke dashboard dengan pesan sukses
        return redirect()->route('seller.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }
}