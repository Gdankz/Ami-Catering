<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Pesan;

class CartController extends Controller
{
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $pesan = collect($cart)->map(function ($item) {
            $makanan = Makanan::where('kodeMakanan', $item['kodeMakanan'])->first();
            return [
                'kodeMakanan' => $item['kodeMakanan'],
                'namaMakanan' => $makanan->namaMakanan ?? 'Tidak Ditemukan',
                'quantity' => $item['quantity'],
                'totalBiaya' => ($makanan->harga ?? 0) * $item['quantity'],
            ];
        });

        return view('checkout', compact('pesan'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string|max:1000',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('checkout')->with('error', 'Keranjang Anda kosong.');
        }

        $buktiTransferPath = $request->file('photo')?->store('bukti_transfer', 'public');

        foreach ($cart as $item) {
            Pesan::create([
                'idPelanggan' => auth()->id(),
                'kodeMakanan' => $item['kodeMakanan'],
                'totalBiaya' => $item['quantity'] * Makanan::where('kodeMakanan', $item['kodeMakanan'])->value('harga'),
                'deskripsi' => $request->description,
                'buktiTransfer' => $buktiTransferPath,
                'tanggalPesan' => now(),
                'tanggalSelesai' => now()->addDays(3),
                'statusAntar' => 'Pending',
                'idAdmin' => 1,
                'idStaff' => 1,
            ]);
        }

        session()->forget('cart');
        return redirect()->route('homeMenu')->with('success', 'Pesanan berhasil diproses!');
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $kodeMakanan = $request->kodeMakanan;
        $quantity = $request->quantity;

        if (empty($kodeMakanan) || empty($quantity)) {
            return redirect()->route('homeMenu')->with('error', 'Kode Makanan atau Quantity tidak valid.');
        }

        if (isset($cart[$kodeMakanan])) {
            $cart[$kodeMakanan]['quantity'] += $quantity;
        } else {
            $cart[$kodeMakanan] = [
                'kodeMakanan' => $kodeMakanan,
                'quantity' => $quantity,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('checkout')->with('success', 'Makanan berhasil ditambahkan ke keranjang!');
    }
}
