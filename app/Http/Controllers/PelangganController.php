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

//        $iduser = Auth::user();
//        dd($iduser);
        $pelanggan = Auth::user();
//        dd($pelanggan);

        // Debugging: Log data pelanggan yang login
//        \Log::info('Pelanggan yang login:', [$pelanggan]);

        // Kirim data pelanggan ke view dashboard
        return view('dashboard', ['pelanggan' => $pelanggan]);
    }
}

