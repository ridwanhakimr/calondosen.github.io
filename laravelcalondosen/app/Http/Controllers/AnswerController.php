<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $questionId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Answer::create([
            'content' => $request->content,
            'question_id' => $questionId,
            'user_id' => session('user')->id_user,
        ]);

        return redirect()->back()->with('success', 'Jawaban berhasil ditambahkan!');
    }
}
