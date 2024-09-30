<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminQuizController;
use App\Http\Controllers\HomeController;

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('userAkses:admin')->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/score', [AdminController::class, 'score'])->name('admin.score');
        Route::delete('/admin/results/delete-all', [AdminController::class, 'deleteResultAll'])->name('results.deleteAll');

        Route::get('/admin/quiz', [AdminQuizController::class, 'index'])->name('admin.quiz.index');
        Route::get('/admin/quiz/create', [AdminQuizController::class, 'create'])->name('admin.quiz.create');
        Route::post('/admin/quiz', [AdminQuizController::class, 'store'])->name('admin.quiz.store');
        Route::get('/admin/quiz/{id}/edit', [AdminQuizController::class, 'edit'])->name('admin.quiz.edit');
        Route::put('/admin/quiz/{id}', [AdminQuizController::class, 'update'])->name('admin.quiz.update');
        Route::delete('/admin/quiz/{id}/delete', [AdminQuizController::class, 'destroy'])->name('admin.quiz.destroy');

        // Route::get('/admin/question', [QuestionController::class, 'index'])->name('admin.question.index');
        Route::get('/admin/question/{quiz}/create', [AdminQuestionController::class, 'create'])->name('admin.question.create');
        Route::post('/admin/question/{quiz}/create', [AdminQuestionController::class, 'store'])->name('admin.question.store');
        Route::get('/admin/question/{question}/edit', [AdminQuestionController::class, 'edit'])->name('admin.question.edit');
        Route::put('/admin/question/{question}', [AdminQuestionController::class, 'update'])->name('admin.question.update');
    });

    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/easy', [QuizController::class, 'easy'])->name('quiz.easy.view');
    Route::get('/quiz/medium', [QuizController::class, 'medium'])->name('quiz.medium.view');
    Route::get('/quiz/{quiz}/easy-start', [QuizController::class, 'easyStart'])->name('quiz.easyStart');
    Route::get('/quiz/{quiz}/medium-start', [QuizController::class, 'mediumStart'])->name('quiz.mediumStart');

    Route::post('/quiz/{quiz}/submit-easy', [QuizController::class, 'submitEasy'])->name('quiz.submitEasy');
    Route::post('/quiz/{quiz}/submit-medium', [QuizController::class, 'submitMedium'])->name('quiz.submitMedium');
});

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
