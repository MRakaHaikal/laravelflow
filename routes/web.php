<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/questions/{question:slug}', [QuestionController::class, 'show'])->name('questions.show');
Route::resource('/questions', QuestionController::class)->except(['index', 'show'])
    ->middleware('auth');
Route::resource('/questions.answers', AnswerController::class)->only(['store', 'update', 'destroy'])
    ->middleware('auth');
