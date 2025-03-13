<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'Semua');

        if ($category === 'Semua') {
            $questions = Question::with('user')->latest()->get();
        } else {
            $questions = Question::with('user')->where('category', $category)->latest()->get();
        }

        $categories = ['Semua', 'Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 'IPA', 'IPS', 'Teknik Informatika', 'Lainnya'];

        return view('questions.index', compact('questions', 'categories', 'category'));
    }

    public function create()
    {
        $categories = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 'IPA', 'IPS', 'Teknik Informatika', 'Lainnya'];
        return view('questions', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'user_id' => session('user')->id_user,
        ]);

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dibuat!');
    }

    public function show($id)
    {
        $question = Question::with('answers.user')->findOrFail($id);
        return view('questions.show', compact('question'));
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('profile')->with('success', 'Pertanyaan berhasil dihapus!');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $categories = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 'IPA', 'IPS', 'Teknik Informatika', 'Lainnya'];

        return view('questions.edit', compact('question', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $question = Question::findOrFail($id);
        $question->title = $request->title;
        $question->content = $request->content;
        $question->category = $request->category;
        $question->save();

        return redirect()->route('profile')->with('success', 'Pertanyaan berhasil diperbarui!');
    }

}
