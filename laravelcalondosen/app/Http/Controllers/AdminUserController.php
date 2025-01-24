<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function create()
    {
        // Halaman form tambah akun
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:tb_login,username|max:225',
            'email' => 'required|email|unique:tb_login,email|max:225',
            'password' => 'required|min:5',
            'nama_lengkap' => 'required|max:225',
            'role' => 'required|in:admin,user', // Hanya menerima admin atau user
        ]);

        // Simpan data akun baru
        Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil dibuat!');
        }
        public function edit($id)
        {
            $user = \App\Models\Login::findOrFail($id); // Ambil data user berdasarkan ID
            $roles = ['admin', 'user']; // Daftar role
            return view('admin.users.edit', compact('user', 'roles'));
        }
        public function update(Request $request, $id)
        {
            // Validasi input
            $request->validate([
                'username' => 'required|max:225',
                'email' => 'required|email|max:225',
                'password' => 'nullable|min:5', // Opsional untuk mengganti password
                'nama_lengkap' => 'required|max:225',
                'role' => 'required|in:admin,user',
            ]);

            // Update data akun
            $user = \App\Models\Login::findOrFail($id);
            $user->username = $request->username;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password); // Hash password baru jika diisi
            }
            $user->nama_lengkap = $request->nama_lengkap;
            $user->role = $request->role;
            $user->save();

            return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil diperbarui!');
        }
        public function destroy($id)
        {
            $user = \App\Models\Login::findOrFail($id);
            $user->delete(); // Hapus akun
            return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil dihapus!');
        }
        
}
