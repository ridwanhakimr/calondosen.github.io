<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AdminAnswerController extends Controller
{
    public function destroy($id)
    {
        // Hapus jawaban
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return redirect()->back()->with('success', 'Jawaban berhasil dihapus!');
    }
}
