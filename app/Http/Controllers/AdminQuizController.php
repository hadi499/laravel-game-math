<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class AdminQuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.quiz.index', [
            'title' => 'admin-quiz',
            'quizzes' => $quizzes
        ]);
    }

    public function create()
    {
        return view('admin.quiz.create', [
            'title' => 'quiz-create'
        ]);
    }

    public function store(Request $request)
    {
        $quiz = new Quiz();
        $quiz->title = $request->title;
        $quiz->topic = $request->topic;
        $quiz->time = $request->time;
        $quiz->number_of_questions = $request->number_of_questions;
        $quiz->level = $request->level;
        $quiz->save();

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz "' . $quiz->title . '" has been added successfully!');
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id); // Cari quiz berdasarkan id
        return view('admin.quiz.edit', [
            'title' => 'quiz-edit',
            'quiz' => $quiz
        ]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->topic = $request->topic;
        $quiz->time = $request->time;
        $quiz->number_of_questions = $request->number_of_questions;
        $quiz->level = $request->level;
        $quiz->save();

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz "' . $quiz->title . '" has been updated successfully!');
    }

    // Tambahkan method untuk delete quiz

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz "' . $quiz->title . '" has been deleted successfully!');
    }
}
