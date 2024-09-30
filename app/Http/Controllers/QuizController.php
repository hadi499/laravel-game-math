<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function easy()
    {
        $quizzes = Quiz::where('level', 'Easy')->get();
        return view('quiz.easy', [
            'title' => 'quiz',
            'quizzes' => $quizzes
        ]);
    }

    public function medium()
    {
        $quizzes = Quiz::where('level', 'Medium')->get();


        return view('quiz.medium', [
            'title' => 'Medium Level Quizzes',
            'quizzes' => $quizzes
        ]);
    }


    public function easyStart(Quiz $quiz)
    {
        $questions = $quiz->questions; // Ambil semua pertanyaan dalam quiz
        return view('quiz.start-easy', [
            'title' => 'start-game',
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function mediumStart(Quiz $quiz)
    {
        $numQuestions = $quiz->number_of_questions;

        // Ambil pertanyaan secara acak dan batasi sesuai jumlah pertanyaan yang diinginkan
        $selectedQuestions = $quiz->questions()->inRandomOrder()->take($numQuestions)->get();

        return view('quiz.start-medium', [
            'title' => 'medium-game',
            'quiz' => $quiz,
            'questions' => $selectedQuestions
        ]);
    }


    public function submitEasy(Request $request, Quiz $quiz)
    {
        $score = 0;
        $multiplier = 100 / $quiz->number_of_questions;
        $answers = $request->input('answers'); // Ambil jawaban dari form
        $questions = $quiz->questions;


        // Buat array untuk menyimpan pertanyaan yang salah dijawab
        $incorrectQuestions = [];

        foreach ($questions as $question) {
            if (isset($answers[$question->id])) {
                // Jika jawabannya benar, tambahkan skor
                if ($answers[$question->id] == $question->correct_answer) {
                    $score += 1; // Misal 10 poin per jawaban benar
                } else {
                    // Jika salah, tambahkan pertanyaan ke array incorrectQuestions
                    $incorrectQuestions[] = [
                        'question' => $question->question_text,
                        'your_answer' => 'Jawaban Anda: ' . $answers[$question->id],
                        'correct_answer' => $question->correct_answer
                    ];
                }
            } else {
                // Jika tidak ada jawaban, tambahkan ke array incorrectQuestions
                $incorrectQuestions[] = [
                    'question' => $question->question_text,
                    'your_answer' => 'Tidak dijawab',
                    'correct_answer' => $question->correct_answer
                ];
            }
        }

        $score = $score * $multiplier;

        // Simpan hasil kuis ke dalam database
        Result::create([
            'quiz_id' => $quiz->id,
            'user_id' => auth()->id(), // Menggunakan user yang sedang login
            'score' => $score
        ]);

        return view('quiz.result-easy', [
            'score' => $score,
            'quiz' => $quiz,
            'incorrectQuestions' => $incorrectQuestions, // Kirim pertanyaan salah ke view
            'title' => 'result'
        ]);
    }

    public function submitMedium(Request $request, Quiz $quiz)
    {
        $score = 0;
        $multiplier = 100 / $quiz->number_of_questions;
        $answers = $request->input('answers'); // Ambil jawaban dari form

        // Ambil hanya pertanyaan yang dikirimkan dari form (yang dipilih acak)
        $questionIds = array_keys($answers); // Ambil ID pertanyaan dari jawaban yang dikirim
        $questions = $quiz->questions()->whereIn('id', $questionIds)->get(); // Ambil pertanyaan berdasarkan ID yang dikirim

        // Buat array untuk menyimpan pertanyaan yang salah dijawab
        $incorrectQuestions = [];

        foreach ($questions as $question) {
            if (isset($answers[$question->id])) {
                // Jika jawabannya benar, tambahkan skor
                if ($answers[$question->id] == $question->correct_answer) {
                    $score += 1;
                } else {
                    // Jika salah, tambahkan pertanyaan ke array incorrectQuestions
                    $incorrectQuestions[] = [
                        'question' => $question->question_text,
                        'your_answer' => 'Jawaban Anda: ' . $answers[$question->id],
                        'correct_answer' => $question->correct_answer
                    ];
                }
            } else {
                // Jika tidak ada jawaban, tambahkan ke array incorrectQuestions
                $incorrectQuestions[] = [
                    'question' => $question->question_text,
                    'your_answer' => 'Tidak dijawab',
                    'correct_answer' => $question->correct_answer
                ];
            }
        }

        // Hitung skor berdasarkan jawaban yang benar
        $score = $score * $multiplier;

        // Simpan hasil kuis ke dalam database
        Result::create([
            'quiz_id' => $quiz->id,
            'user_id' => auth()->id(), // Menggunakan user yang sedang login
            'score' => $score
        ]);

        return view('quiz.result-medium', [
            'score' => $score,
            'quiz' => $quiz,
            'incorrectQuestions' => $incorrectQuestions, // Kirim pertanyaan salah ke view
            'title' => 'result'
        ]);
    }
}
