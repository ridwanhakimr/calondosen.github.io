<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kategori dari query parameter, default ke 'Semua'
        $category = $request->get('category', 'Semua');

        if ($category === 'Semua') {
            // Jika kategori "Semua", ambil semua video
            $videos = Video::with('user')->get();
        } else {
            // Filter berdasarkan kategori
            $videos = Video::with('user')->where('category', $category)->get();
        }

        // Daftar kategori
        $categories = ['Semua', 'Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 'IPA', 'IPS', 'Teknik Informatika', 'Lainnya'];

        // Kirim data ke view
        return view('login.dashboard', compact('videos', 'categories', 'category'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'video' => 'required|mimes:mp4,avi,mov|max:20480', // Max 20MB
        ]);

        // Simpan video ke storage lokal
        $path = $request->file('video')->store('videos', 'public');

        // Simpan data ke database
        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'video_path' => $path,
            'user_id' => session('user')->id_user,
        ]);

        return redirect()->route('dashboard')->with('success', 'Video berhasil ditambahkan!');
    }

    public function create()
    {
        // Daftar kategori untuk form
        $categories = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 'IPA', 'IPS', 'Teknik Informatika', 'Lainnya'];

        return view('login.createvid', compact('categories'));
    }

    public function destroy($id)
    {
        // Hapus video berdasarkan ID
        $video = Video::findOrFail($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($video->video_path);

        $video->delete();

        return redirect()->back()->with('success', 'Video berhasil dihapus!');
    }

    public function show($id)
    {
        // Tampilkan video besar
        $video = Video::findOrFail($id);
        return view('login.video', compact('video'));
    }

    public function edit($id)
    {
        // Ambil data video berdasarkan ID
        $video = Video::findOrFail($id);

        // Daftar kategori
        $categories = ['Semua', 'Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 'IPA', 'IPS', 'Teknik Informatika', 'Lainnya'];

        // Kirim data video ke form edit
        return view('login.edit', compact('video', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'video' => 'nullable|mimes:mp4,avi,mov|max:20480', // Max 20MB
        ]);

        // Ambil data video
        $video = Video::findOrFail($id);

        // Update video jika file baru diunggah
        if ($request->hasFile('video')) {
            // Hapus file video lama
            Storage::disk('public')->delete($video->video_path);

            // Simpan file video baru
            $path = $request->file('video')->store('videos', 'public');
            $video->video_path = $path;
        }

        // Update data lainnya
        $video->title = $request->title;
        $video->description = $request->description;
        $video->category = $request->category;
        $video->save();

        return redirect()->route('dashboard')->with('success', 'Video berhasil diperbarui!');
    }

}
