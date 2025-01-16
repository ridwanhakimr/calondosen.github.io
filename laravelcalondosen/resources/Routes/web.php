<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register'); // File view untuk form register
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard'); // Ganti dengan view file kamu
})->name('dashboard');

