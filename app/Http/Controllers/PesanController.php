<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Str;

class PesanController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        $pesan = Pesan::where('idPelanggan', auth()->id())->get();

        return view('checkout', compact('pesan'));
    }

    // Proses checkout
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'idPelanggan' => 'required|integer|exists:pelanggan,id',
            'kodeMakanan' => 'required|string|exists:makanan,kode',
            'quantity' => 'required|integer|min:1',
            'hargaMakanan' => 'required|integer|min:0',
        ]);

        Pesan::create([
            'noPesanan' => Str::uuid(),
            'idPelanggan' => $validated['idPelanggan'],
            'kodeMakanan' => $validated['kodeMakanan'],
            'idStaff' => null,
            'statusAntar' => 'pending',
            'tanggalPesan' => now(),
            'tanggalSelesai' => null,
            'totalBiaya' => $validated['quantity'] * $validated['hargaMakanan'],
        ]);

        return response()->json(['success' => true]);
    }
}
