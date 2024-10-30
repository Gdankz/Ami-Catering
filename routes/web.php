<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('admin.homeAdmin');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
//Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard', [PelangganController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/edit-alamat', [AuthController::class, 'editAlamat'])->name('edit-alamat');
    Route::post('/update-alamat', [AuthController::class, 'updateAlamat'])->name('update-alamat');
    Route::get('/edit-nohp', [AuthController::class, 'editNoHp'])->name('edit-nohp');
    Route::post('/update-nohp', [AuthController::class, 'updateNoHp'])->name('update-nohp');
});

// Tambahkan route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Definisikan rute homeAdmin
Route::get('/admin/home', function () {
    return view('admin.homeAdmin'); // Pastikan merujuk ke nama file yang benar
})->name('homeAdmin');


Route::get('/admin/menu', function () {
    return view('admin.menuAdmin'); // Buat view sesuai kebutuhan
})->name('menuAdmin');

Route::get('/admin/staff', function () {
    return view('admin.staff'); // Buat view sesuai kebutuhan
})->name('staff');


Route::get('/admin/cutomer', function () {
    return view('admin.cutomerAdmin');
})->name('cutomerAdmin');

Route::get('/admin/pesanan', function () {
    return view('admin.pesananAdmin'); // Buat view sesuai kebutuhan
})->name('pesananAdmin');

Route::get('/admin/laporan', function () {
    return view('admin.laporan'); // Buat view sesuai kebutuhan
})->name('laporan');