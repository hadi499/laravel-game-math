<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

        $questions = Question::all();
        return view('question.index', [
            'title' => 'question',
            'questions' => $questions
        ]);
    }

    public function create(Quiz $quiz)
    {
        $questions = Question::where('quiz_id', $quiz->id)->get();


        return view('question.create', [
            'title' => 'question-create',
            'quiz' => $quiz,
            'questions' => $questions


        ]);
    }

    public function store(Request $request, Quiz $quiz)
    {
        $question = new Question();
        $question->quiz_id = $quiz->id;
        $question->question_text = $request->question_text;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->correct_answer = $request->correct_answer;
        $question->save();

        return redirect()->route('question.create', $quiz)->with('success', 'Question "' . $question->question_text . '" has been added successfully!');;
    }

    public function edit(Question $question)
    {
        $quiz = Quiz::findOrFail($question->quiz_id); // Ambil quiz terkait dengan pertanyaan
        return view('question.edit', [
            'title' => 'Edit Question',
            'question' => $question,
            'quiz' => $quiz
        ]);
    }

    // Method untuk mengupdate pertanyaan
    public function update(Request $request, Question $question)
    {
        $question->question_text = $request->question_text;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->correct_answer = $request->correct_answer;
        $question->save();

        return redirect()->route('question.create', $question->quiz_id)->with('success', 'Question "' . $question->question_text . '" has been updated successfully!');
    }
}
