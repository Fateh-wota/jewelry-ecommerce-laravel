<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Tambahkan ini supaya bisa akses tabel User
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil jumlah user berdasarkan role
        $totalBuyer = User::where('role', 'buyer')->count();
        $totalSeller = User::where('role', 'seller')->count();

        // 2. Ambil list semua user selain admin untuk tabel
        $users = User::where('role', '!=', 'admin')->get();

        // 3. Kirim variabel ke view menggunakan compact
        return view('admin.dashboard', compact('totalBuyer', 'totalSeller', 'users'));
    }

    public function makeSeller($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'seller';
        $user->save();

        return redirect()->back()->with('success', 'User ' . $user->name . ' sekarang resmi jadi Seller!');
    }

    public function buyers()
{
    // Hanya ambil user dengan role buyer
    $buyers = User::where('role', 'buyer')->get();
    
    return view('admin.buyers', compact('buyers'));
}
}