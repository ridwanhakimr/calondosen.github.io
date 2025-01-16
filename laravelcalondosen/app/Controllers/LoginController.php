<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Cari user berdasarkan username
        $user = User::where('username', $credentials['username'])->first();

        if ($user) {
            // Periksa apakah password sudah di-hash
            if (!password_get_info($user->password)['algo']) {
                // Jika belum di-hash, hash password dan simpan kembali
                $user->password = bcrypt($user->password);
                $user->save();
            }

            // Verifikasi password
            if (Hash::check($credentials['password'], $user->password)) {
                // Login sukses
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan!');
        }
    }

}
