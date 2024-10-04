<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function create()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mencoba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session untuk mencegah serangan session fixation
            return redirect()->route('dashboard'); // Redirect ke dashboard setelah login berhasil
        }

        // Jika login gagal, kembali ke form dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menangani proses logout
    public function destroy(Request $request)
    {
        Auth::logout(); // Logout pengguna
        $request->session()->invalidate(); // Hapus semua session
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/'); // Redirect ke halaman awal
    }
}
