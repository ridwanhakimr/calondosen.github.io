<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Video;
use App\Models\Question;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data untuk halaman admin
        $users = Login::all();
        $videos = Video::all();
        $questions = Question::all();

        // Debug untuk memeriksa isi $users
        // dd($users);

        return view('admin.dashboard', compact('users', 'videos', 'questions'));
    }
}
