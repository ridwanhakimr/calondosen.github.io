<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Route untuk registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth.user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('login.dashboard');
    });
});

Route::middleware(['auth.user'])->group(function () {
    Route::get('/dashboard', [VideoController::class, 'index'])->name('dashboard');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
    Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
});
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
Route::post('/questions/{id}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');