<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Sesuaikan dengan path file blade Anda
    }
    // Fungsi untuk mengambil data pelanggan dan mengphpirimkannya ke tampilan
    public function showPesananAdmin()
    {
        $pelanggan = Pelanggan::all(); // Ambil semua data dari tabel pelanggan
        return view('admin.pesananAdmin', compact('pelanggan')); // Kirim data ke view
    }

}
