<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan; // Pastikan Anda mengimpor model ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:Pelanggan,Email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string', 'max:255'],
            'noHP' => ['required', 'string', 'max:20'],
        ]);

        // Simpan data ke tabel Pelanggan
        $pelanggan = Pelanggan::create([ // Pastikan Anda memanggil create() di sini
            'Nama' => $request->nama,
            'Email' => $request->email,
            'Password' => Hash::make($request->password),
            'Alamat' => $request->alamat,
            'noHP' => $request->noHP,
        ]);

        // Redirect atau respons lainnya
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}

