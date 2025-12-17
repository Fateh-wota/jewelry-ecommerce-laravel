<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman detail produk dan form order
    public function show(Product $product)
    {
        return view('product-detail', compact('product'));
    }

    // Menyimpan pesanan ke database
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'seller_id' => $product->user_id, // Mengambil ID seller dari pemilik produk
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
            'status' => 'pending',
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
        ]);

        // Kurangi stok produk
        $product->decrement('stock', $request->quantity);

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat! Seller akan segera memprosesnya.');
    }
}