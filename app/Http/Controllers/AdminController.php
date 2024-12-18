<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Pesan;
use Illuminate\Support\Facades\DB; // Perbaiki namespace DB

class AdminController extends Controller
{
    // Fungsi untuk menampilkan halaman dashboard admin
    public function index()
    {
        return view('admin.dashboard'); // Sesuaikan dengan path file blade Anda
    }

    // Fungsi untuk mengambil semua data pelanggan dan mengirimkannya ke tampilan
    public function showPesananAdmin()
    {
        $pelanggan = Pelanggan::all(); // Ambil semua data dari tabel pelanggan
        return view('admin.pesananAdmin', compact('pelanggan')); // Kirim data ke view
    }

    // Fungsi untuk menampilkan daftar pesanan
    public function daftarPesanan()
    {
        $pesanan = Pesan::all();
        $filteredPesanan = $pesanan->unique('idPelanggan'); // Filter berdasarkan idPelanggan
        return view('admin.pesananAdmin', compact('filteredPesanan')); // Kirim data ke view
    }

    // Fungsi untuk mengambil detail pesanan berdasarkan idPelanggan
    public function getPesananByPelanggan($idPelanggan)
    {
        // Ambil semua pesanan berdasarkan idPelanggan
        $pesanan = DB::table('pesanan')
            ->join('makanan', 'pesanan.kodeMakanan', '=', 'makanan.kodeMakanan')
            ->where('pesanan.idPelanggan', $idPelanggan)
            ->select('makanan.namaMakanan')
            ->get();
    
        return response()->json($pesanan); // Kembalikan data sebagai JSON
    }
    
}
