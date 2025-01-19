<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user')) {
            return redirect('/login')->withErrors(['auth' => 'Anda harus login terlebih dahulu!']);
        }

        return $next($request);
    }
}
