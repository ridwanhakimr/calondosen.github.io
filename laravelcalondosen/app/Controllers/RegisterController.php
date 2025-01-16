<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|unique:tb_login,username|max:225',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:tb_login,email|max:225',
            'namalengkap' => 'required|max:225',
        ]);

        // Simpan data ke database
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password); // Hash password
        $user->email = $request->email;
        $user->nama_lengkap = $request->namalengkap;
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
