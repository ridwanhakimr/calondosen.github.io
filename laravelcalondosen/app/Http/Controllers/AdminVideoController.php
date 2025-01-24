<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('user')->get(); // Ambil semua video beserta relasi user
        return view('admin.videos.index', compact('videos')); // Ganti view menjadi admin.videos.index
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Hapus video dari storage
        Storage::disk('public')->delete($video->video_path);

        // Hapus data video dari database
        $video->delete();

        // Kembali ke halaman daftar video
        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil dihapus!');
    }
}
