<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Kalau buka homepage, lempar aja ke halaman login
Route::redirect('/', '/login');

// Rute Login
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'handleLogin'])->name('login.post');

// Rute halaman-halaman utama UTS
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
