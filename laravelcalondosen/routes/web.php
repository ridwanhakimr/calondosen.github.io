<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminAnswerController;
use App\Http\Controllers\AdminLoginController;

// Halaman utama
Route::get('/', function () {
    return view('index');
});

// Autentikasi pengguna
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Registrasi pengguna
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Profil pengguna
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

// Dashboard dan video pengguna
Route::middleware(['auth.user'])->group(function () {
    Route::get('/dashboard', [VideoController::class, 'index'])->name('dashboard');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
    Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
});

// Pertanyaan dan jawaban pengguna
Route::middleware(['auth.user'])->group(function () {
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    Route::post('/questions/{id}/answers', [AnswerController::class, 'store'])->name('answers.store');
});

// Admin login dan logout
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Halaman admin
Route::middleware(['admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Kelola pengguna
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Kelola video
    Route::get('/admin/videos', [AdminVideoController::class, 'index'])->name('admin.videos.index');
    Route::delete('/admin/videos/delete/{id}', [AdminVideoController::class, 'destroy'])->name('admin.videos.destroy');

    // Kelola pertanyaan dan jawaban
    Route::get('/admin/questions', [AdminQuestionController::class, 'index'])->name('admin.questions.index');
    Route::get('/admin/questions/{id}/answers', [AdminQuestionController::class, 'showAnswers'])->name('admin.questions.answers');
    Route::delete('/admin/questions/delete/{id}', [AdminQuestionController::class, 'destroy'])->name('admin.questions.destroy');
    Route::delete('/admin/answers/delete/{id}', [AdminAnswerController::class, 'destroy'])->name('admin.answers.destroy');
});
