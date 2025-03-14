<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (session('user') && session('user')->role === 'user') {
            return $next($request);
        }

        return redirect('/')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
    }
}
