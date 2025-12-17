<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman detail produk
    public function show(Product $product)
    {
        return view('product-detail', compact('product'));
    }

    // Proses simpan order
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        // 1. Buat data Order
        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'seller_id' => $product->user_id, // Ambil ID seller pemilik produk
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
            'status' => 'pending',
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
        ]);

        // 2. Kurangi stok produk secara otomatis
        $product->decrement('stock', $request->quantity);

        // 3. Lempar balik ke home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat! Seller akan segera memprosesnya.');
    }
}