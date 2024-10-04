<?php


namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'noHP' => 'required|string|max:15',
            'Email' => 'required|string|email|max:255',
            'Password' => 'required|string|min:8|confirmed',
        ]);

        Pelanggan::create([
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'noHP' => $request->noHP,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
        ]);

        return redirect('/')->with('success', 'Registrasi berhasil!');
    }

    // Menampilkan halaman form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required|string|email',
            'Password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'Email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

