<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        // Halaman login admin
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan username
        $user = Login::where('username', $request->username)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && $user->role === 'admin' && Hash::check($request->password, $user->password)) {
            // Simpan data user ke session
            session(['user' => $user]);

            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['login' => 'Username atau password salah, atau Anda bukan admin.']);
    }

    public function logout()
    {
        // Hapus session
        session()->forget('user');
        return redirect()->route('admin.login')->with('success', 'Berhasil logout!');
    }
}
