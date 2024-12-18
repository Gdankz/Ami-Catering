<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


// Route::get('/', function () {
//     return view('admin.homeAdmin');
// })->name('homeAdmin');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth:pelanggan')->get('/home', [HomeController::class, 'index'])->name('homeWelcome');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
//Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard', [PelangganController::class, 'index'])->name('auth');


Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/edit-alamat', [AuthController::class, 'editAlamat'])->name('edit-alamat');
    Route::post('/update-alamat', [AuthController::class, 'updateAlamat'])->name('update-alamat');
    Route::get('/edit-nohp', [AuthController::class, 'editNoHp'])->name('edit-nohp');
    Route::post('/update-nohp', [AuthController::class, 'updateNoHp'])->name('update-nohp');
    Route::get('/menu', [MakananController::class, 'ShowMakanan'])->name('menu');
    Route::get('/profile', [PelangganController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [PelangganController::class, 'update'])->name('update-profile');
});

//Route::middleware(['auth'])->group(function () {
//    Route::get('/edit-alamat', [AuthController::class, 'editAlamat'])->name('edit-alamat');
//    Route::post('/update-alamat', [AuthController::class, 'updateAlamat'])->name('update-alamat');
//    Route::get('/edit-nohp', [AuthController::class, 'editNoHp'])->name('edit-nohp');
//    Route::post('/update-nohp', [AuthController::class, 'updateNoHp'])->name('update-nohp');
//});

// Tambahkan route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Definisikan rute homeAdmin
Route::get('/admin/home', function () {
    return view('admin.homeAdmin'); // Pastikan merujuk ke nama file yang benar
})->name('homeAdmin');



//bagian menambahkan data makanan dari admin ke database
// Route::get('/admin/menu', function () {
//     return view('admin.menuAdmin'); // Buat view sesuai kebutuhan
// })->name('menuAdmin');
use App\Http\Controllers\MakananController;
Route::post('/makanan/store', [MakananController::class, 'store'])->name('makanan.store');
Route::get('/admin/menu', [MakananController::class, 'index'])->name('menuAdmin');
Route::get('/makanan/{kodeMakanan}/edit', [MakananController::class, 'edit'])->name('makanan.edit');
Route::put('/makanan/{kodeMakanan}', [MakananController::class, 'update'])->name('makanan.update');
Route::delete('/makanan/{kodeMakanan}', [MakananController::class, 'destroy'])->name('makanan.destroy');
Route::resource('/makanans', MakananController::class);


// bagian halamanstaff dari pov admin
use App\Http\Controllers\StaffController;
// Route::get('/admin/staff', function () {
//     return view('admin.staff');
// })->name('staff');
Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
Route::get('/admin/staff', [StaffController::class, 'index'])->name('staff');
Route::put('/staff/{idStaff}', [StaffController::class, 'update'])->name('staff.update');
Route::delete('/staff/{idStaff}', [StaffController::class, 'destroy'])->name('staff.destroy');

Route::resource('/staffs', StaffController::class);
Route::resource('staff', StaffController::class);

Route::get('/menu', function () {
    return view('menu');
})->name('menu');


Route::get('/admin/cutomer', function () {
    return view('admin.cutomerAdmin');
})->name('cutomerAdmin');

//Route::get('/admin/pesanan', function () {
//    return view('admin.pesananAdmin'); // Buat view sesuai kebutuhan
//})->name('pesananAdmin');
Route::get('/admin/pesanan', [AdminController::class, 'daftarPesanan'])->name('admin.pesanan');

Route::get('/admin/laporan', function () {
    return view('admin.laporan'); // Buat view sesuai kebutuhan
})->name('laporan');

Route::get('/menu', [MakananController::class, 'ShowMakanan'])->name('menu');

Route::middleware('auth:pelanggan')->get('/home-menu', function () {
    return view('homeMenu');
})->name('homeMenu');

Route::get('/home-menu', [MakananController::class, 'ShowAllMakanan'])->name('homeMenu');

Route::get('/checkout', [PesanController::class, 'index'])->name('checkout')->middleware('auth:pelanggan');
Route::post('/checkout', [PesanController::class, 'checkout'])->middleware('auth:pelanggan');


//Route::get('/menu', [CartController::class, 'showMenu'])->name('homeMenu');
Route::middleware('auth:pelanggan')->group(function () {
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'processCheckout'])->name('processCheckout');
});

Route::middleware('auth:pelanggan')->group(function () {
    // Define pesananAdmin route
    Route::get('/pesanan-admin', [AdminController::class, 'daftarPesanan'])->name('pesananAdmin');
});


use App\Http\Controllers\CustomerController;

// web.php
Route::get('admin/customers', [CustomerController::class, 'index']);



