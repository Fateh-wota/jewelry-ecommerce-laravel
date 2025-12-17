<?php

namespace App\Http\Controllers;

use App\Models\Product; // Penting untuk Route Model Binding
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display the application's home screen.
     */
    public function index()
    {    
        return view('welcome'); 
    }

    /**
     * Show the detailed view for a single product.
     */
    public function show(Product $product)
    {
        // Product di-inject otomatis oleh Laravel (Route Model Binding)
        return view('product.show', compact('product'));
    }
}