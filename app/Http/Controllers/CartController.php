<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;

class CartController extends Controller
{
    // Menampilkan halaman menu
    public function showMenu()
    {
        $makanans = Makanan::all(); // Ambil semua data makanan
        return view('homeMenu', compact('makanans'));
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        // Ambil kodeMakanan dan quantity dari request
        $kodeMakanan = $request->kodeMakanan;
        $quantity = $request->quantity;

        // Tambahkan item ke keranjang menggunakan kodeMakanan
        if (isset($cart[$kodeMakanan])) {
            $cart[$kodeMakanan]['quantity'] += $quantity; // Jika sudah ada, tambah quantity
        } else {
            $cart[$kodeMakanan] = [
                'kodeMakanan' => $kodeMakanan,
                'quantity' => $quantity,
            ];
        }

        session(['cart' => $cart]); // Simpan keranjang ke session
        return redirect()->route('checkout')->with('success', 'Makanan berhasil ditambahkan ke keranjang!');
    }

    public function showCheckout()
    {
        $cart = session()->get('cart', []);

        // Ambil data makanan berdasarkan kodeMakanan di keranjang
        $pesan = collect($cart)->map(function ($item) {
            // Cari makanan berdasarkan kodeMakanan
            $makanan = Makanan::where('kodeMakanan', $item['kodeMakanan'])->first();

            // Cek jika makanan ditemukan
            if ($makanan) {
                return [
                    'kodeMakanan' => $makanan->kodeMakanan,
                    'namaMakanan' => $makanan->namaMakanan,
                    'quantity' => $item['quantity'],
                    'totalBiaya' => $makanan->harga * $item['quantity'],
                ];
            }

            // Jika makanan tidak ditemukan, kembalikan item dengan error atau default
            return [
                'kodeMakanan' => 'Unknown',
                'namaMakanan' => 'Makanan tidak ditemukan',
                'quantity' => $item['quantity'],
                'totalBiaya' => 0,
            ];
        });

        return view('checkout', compact('pesan'));
    }

    // Memproses checkout
    public function processCheckout(Request $request)
    {
        // Kosongkan session keranjang setelah checkout
        session()->forget('cart');
        return redirect()->route('homeMenu')->with('success', 'Checkout berhasil dilakukan!');
    }
}
