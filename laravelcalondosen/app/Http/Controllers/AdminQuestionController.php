<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AdminQuestionController extends Controller
{
    public function index()
    {
        // Ambil semua pertanyaan
        $questions = Question::with('user')->get();
        return view('admin.questions.index', compact('questions'));
    }

    public function destroy($id)
    {
        // Hapus pertanyaan dan jawaban terkait
        $question = Question::findOrFail($id);
        $question->answers()->delete(); // Hapus jawaban terkait
        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil dihapus!');
    }

    public function showAnswers($id)
    {
        // Ambil pertanyaan dan jawabannya
        $question = Question::with('answers.user')->findOrFail($id);
        return view('admin.questions.answers', compact('question'));
    }
}
