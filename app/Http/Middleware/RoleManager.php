<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Ambil role user dari database
        $userRole = Auth::user()->role;

        // 3. Jika role sesuai dengan yang diminta rute, izinkan lewat
        if ($userRole === $role) {
            return $next($request);
        }

        // 4. Jika nyasar (misal: Buyer mau masuk ke Admin)
        // Lempar balik ke dashboard aslinya masing-masing
        return match($userRole) {
            'admin' => redirect()->route('admin.dashboard'),
            'seller' => redirect()->route('seller.dashboard'),
            default => redirect()->route('buyer.dashboard'),
        };
    }
}