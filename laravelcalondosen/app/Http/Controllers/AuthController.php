<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index');
    }

    public function showRegisterForm()
    {
        return view('login.register'); // Mengarahkan ke resources/views/login/register.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Login::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan informasi login di sesi
            Session::put('user', $user);
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['login' => 'Username atau password salah!']);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:tb_login,username|max:225',
            'email' => 'required|email|unique:tb_login,email|max:225',
            'password' => 'required|min:5',
            'nama_lengkap' => 'required|max:225',
        ]);

        // Simpan data ke database
        Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Bisa gunakan Hash::make($request->password) untuk hashing
            'nama_lengkap' => $request->nama_lengkap,
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
