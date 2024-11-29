<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Sesuaikan dengan path file blade Anda
    }
    // Fungsi untuk mengambil data pelanggan dan mengphpirimkannya ke tampilan
    public function showPelanggan()
    {
        $pelanggan = Pelanggan::all(); // Mengambil semua data pelanggan dari database

        // Mengirim data pelanggan ke tampilan
        return view('admin.pelanggan', compact('pelanggan'));
    }
}
