<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah user login dan memiliki role admin
        if (session('user') && session('user')->role === 'admin') {
            return $next($request);
        }

        // Redirect jika bukan admin
        return redirect('/')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
    }
}
