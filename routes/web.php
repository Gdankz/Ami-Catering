<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// Tambahkan route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup route dengan middleware 'auth' untuk membatasi akses hanya untuk pengguna yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PelangganController::class, 'index'])->name('dashboard');
    Route::get('/profil', [PelangganController::class, 'showProfile'])->name('profil');
    Route::get('/edit-alamat', [AuthController::class, 'editAlamat'])->name('edit-alamat');
    Route::post('/update-alamat', [AuthController::class, 'updateAlamat'])->name('update-alamat');
    Route::get('/edit-nohp', [AuthController::class, 'editNoHp'])->name('edit-nohp');
    Route::post('/update-nohp', [AuthController::class, 'updateNoHp'])->name('update-nohp');
});
