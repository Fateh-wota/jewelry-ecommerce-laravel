<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // PASTIKAN TIDAK ADA FUNGSI public function __construct() { ... } DI SINI

    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.admin-login'); 
    }

    /**
     * Tangani permintaan login yang masuk.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectToRoleDashboard();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logika Redirection Berbasis Peran
     */
    protected function redirectToRoleDashboard()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'seller':
                return redirect()->route('seller.dashboard');
            case 'buyer':
            default:
                return redirect()->route('buyer.dashboard');
        }
    }


    /**
     * Log user keluar dari aplikasi.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home')); 
    }
}