<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;

// Route::get('/', function () {
//     return view('admin.homeAdmin');
// })->name('homeAdmin');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

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






Route::get('/admin/cutomer', function () {
    return view('admin.cutomerAdmin');
})->name('cutomerAdmin');

Route::get('/admin/pesanan', function () {
    return view('admin.pesananAdmin'); // Buat view sesuai kebutuhan
})->name('pesananAdmin');

Route::get('/admin/laporan', function () {
    return view('admin.laporan'); // Buat view sesuai kebutuhan
})->name('laporan');
 