<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoController;

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
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
    Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
});