<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizs = Quiz::all();
        return view('quizs.index', compact('quizs'));
    }
    public function create()
    {
        $materi = Materi::all();
        return view('quizs.create',compact('materi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_materi' => 'required|integer',
            'questions' => 'required|string',
            'answer' => 'required|string|max:250',
        ]);

        Quiz::create($request->all());

        return redirect()->route('quizs.index')->with('success', 'Quiz berhasil ditambahkan.');
    }

    public function show(Quiz $quiz)
    {
        return view('quizs.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        $materi = Materi::all();
        return view('quizs.edit', compact('quiz','materi'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'id_materi' => 'required|integer',
            'questions' => 'required|string',
            'answer' => 'required|string|max:250',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizs.index')->with('success', 'Quiz berhasil diperbarui.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('quizs.index')->with('success', 'Quiz berhasil dihapus.');
    }
}
