<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome'); // Menampilkan tampilan awal
});


Route::get('/register', [PelangganController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [PelangganController::class, 'register'])->name('register');

require __DIR__.'/auth.php';
