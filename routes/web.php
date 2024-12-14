<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/questions/{question:slug}', [QuestionController::class, 'show'])->name('questions.show');
