<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
//Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard', [PelangganController::class, 'index'])->name('dashboard');


// Tambahkan route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
