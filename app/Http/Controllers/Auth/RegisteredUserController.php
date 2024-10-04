<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
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

        // Gunakan model Pelanggan untuk membuat entri baru
        Pelanggan::create([
            'Nama' => $request->input('nama'),
            'Email' => $request->input('email'),
            'Password' => Hash::make($request->input('password')),
            'Alamat' => $request->input('alamat'),
            'noHP' => $request->input('noHP'),
        ]);

        // Redirect atau respons lainnya
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
