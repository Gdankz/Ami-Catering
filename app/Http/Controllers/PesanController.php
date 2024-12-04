<?php
namespace App\Http\Controllers;

use App\Models\Pesan; // Import model Pesan
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel pesan
        $pesanan = Pesan::all();

        // Kirim data ke view admin/pesananAdmin.blade.php
        return view('admin.pesananAdmin', compact('pesanan'));
    }
}



