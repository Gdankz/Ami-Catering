<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;



class PelangganController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'noHP' => 'nullable|string|max:20',
            'email' => 'required|email|unique:Pelanggan,Email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Pelanggan::create([
            'Nama' => $request->nama,
            'Alamat' => $request->alamat,
            'noHP' => $request->noHP,
            'Email' => $request->email,
            'Password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

}
