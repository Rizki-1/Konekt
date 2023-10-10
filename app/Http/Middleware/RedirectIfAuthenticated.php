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
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;

            // Mengecek apakah peran pengguna adalah "admin", "user", atau "penjual"
            if ($userRole == 'admin' || $userRole == 'user' || $userRole == 'penjual') {
                return redirect()->back();
            }
        }

        return $next($request);
    }

}
