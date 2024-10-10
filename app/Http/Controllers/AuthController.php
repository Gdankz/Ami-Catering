<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $datalogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

//        dd($datalogin);

        if(Auth::attempt($datalogin)){
            return redirect()->route('dashboard');
        }

        // Mencari pelanggan berdasarkan email
//        $pelanggan = Pelanggan::where('email', $request->email)->first();
//
//        // Jika pelanggan ditemukan dan password cocok
//        if ($pelanggan && Hash::check($request->password, $pelanggan->password)) {
//            // Login pelanggan
//            Auth::login($pelanggan);
//
//            // Redirect ke dashboard setelah login berhasil
//            return redirect()->route('dashboard');
//        }
//
//        // Jika login gagal, kirim pesan kesalahan
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'noHP' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:pelanggan',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menggunakan model Pelanggan untuk menyimpan data
        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'noHP' => $request->noHP,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }

//    public function dashboard(Request $request){
//        $pelanggan = Auth::user();
//
//        // Debugging: Log data pelanggan yang login
////        \Log::info('Pelanggan yang login:', [$pelanggan]);
//
//        // Kirim data pelanggan ke view dashboard
//        return view('dashboard', compact('pelanggan'));
//    }
}

