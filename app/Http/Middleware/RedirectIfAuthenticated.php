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
                
                // =======================================================
                // MODIFIKASI:
                // Kita hanya redirect user yang sudah login jika mereka
                // mencoba mengakses Halaman Login atau Register.
                // Kita biarkan mereka mengakses halaman root '/'.
                // =======================================================
                $shouldRedirect = in_array(request()->path(), ['login', 'register']); 
                
                if ($shouldRedirect) {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}