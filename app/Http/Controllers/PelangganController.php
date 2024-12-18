<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function index()
    {
        // Ambil data pelanggan yang sedang login
        //        $pelanggan = Auth::user();

        $pelanggan = Auth::user();
        //        dd($pelanggan);

        // Debugging: Log data pelanggan yang login
        //        \Log::info('Pelanggan yang login:', [$pelanggan]);

        // Kirim data pelanggan ke view dashboard
        // return view('dashboard', ['pelanggan' => $pelanggan]);


        // Kirim data pelanggan ke view 'customer.blade.php'
        $pelanggans = Pelanggan::all();

        return view('admin.customerAdmin', ['pelanggan' => $pelanggans]);
    }

    public function showProfile()
    {
        // Mendapatkan data pengguna yang sedang login
        $pelanggan = Auth::user();

        // Mengirimkan data pengguna ke view
        return view('dashboard', ['pelanggan' => $pelanggan]);
    }
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'noHP' => 'required|string|max:15',
        ]);

        // Mendapatkan user yang sedang login
        $user = Auth::user();
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');
        $user->noHP = $request->input('noHP');

        // Menyimpan perubahan
        $user->save();
        session()->flash('message', 'Data successfully saved!');

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
