<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome'); // Menampilkan tampilan awal
});

Route::get('/register', function () {
    return view('auth.register'); // Ganti dengan view yang sesuai
})->name('register.form');

// Route untuk menyimpan registrasi
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Route untuk menampilkan halaman login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Route untuk memproses login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);


Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


/*require __DIR__.'/auth.php';*/
