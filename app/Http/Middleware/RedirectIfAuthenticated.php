<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            
            $shouldRedirect = in_array($request->path(), ['login', 'register']); 
            
            if ($shouldRedirect) {
                // Ambil role user yang sedang login
                $role = Auth::user()->role;

                // Lempar ke dashboard yang sesuai
                switch ($role) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'seller':
                        return redirect()->route('seller.dashboard');
                    default:
                        return redirect()->route('buyer.dashboard');
                }
            }
        }
    }

    return $next($request);
}
}