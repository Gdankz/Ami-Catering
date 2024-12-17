<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Pesan;
use Carbon\Carbon;

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

        // Validasi: Pastikan kodeMakanan tidak kosong
        if (empty($kodeMakanan)) {
            return redirect()->route('homeMenu')->with('error', 'Kode Makanan tidak valid.');
        }

        // Periksa apakah kodeMakanan sudah ada di keranjang
        if (isset($cart[$kodeMakanan])) {
            // Jika sudah ada, tambah quantity
            $cart[$kodeMakanan]['quantity'] += $quantity;
        } else {
            // Jika belum ada, simpan item baru dengan kodeMakanan dan quantity
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
            // Pastikan kodeMakanan ada di item
            if (!isset($item['kodeMakanan'])) {
                // Jika tidak ada, kembalikan item dengan nilai default
                return [
                    'kodeMakanan' => 'Unknown',
                    'namaMakanan' => 'Makanan tidak ditemukan',
                    'quantity' => $item['quantity'],
                    'totalBiaya' => 0,
                ];
            }

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

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        // Periksa apakah keranjang kosong
        if (empty($cart)) {
            return redirect()->route('homeMenu')->with('error', 'Keranjang kosong, tidak ada pesanan yang dapat diproses.');
        }

        try {
            // Pastikan pengguna sudah login, jika tidak fallback ke ID pelanggan default
            $idPelanggan = auth()->check() ? auth()->user()->idPelanggan : 1; // ID pelanggan default adalah 1 jika tidak login

            // Iterasi melalui isi keranjang
            foreach ($cart as $item) {
                // Cari data makanan
                $makanan = Makanan::where('kodeMakanan', $item['kodeMakanan'])->first();

                if (!$makanan) {
                    // Jika makanan tidak ditemukan, kembalikan error
                    return redirect()->route('checkout')->with('error', 'Makanan dengan kode ' . $item['kodeMakanan'] . ' tidak ditemukan.');
                }

                // Simpan data pesanan ke tabel pesan
                Pesan::create([
                    'idPelanggan'   => $idPelanggan, // Gunakan ID pelanggan yang valid
                    'idAdmin'       => 1, // ID admin tetap
                    'kodeMakanan'   => $makanan->kodeMakanan,
                    'idStaff'       => 1, // ID staff tetap
                    'statusAntar'   => 'Proses',
                    'tanggalPesan'  => Carbon::now(), // Waktu pesan saat ini
                    'tanggalSelesai'=> Carbon::now()->addDays(1), // Default selesai +1 hari
                    'totalBiaya'    => $makanan->harga * $item['quantity'],
                ]);
            }

            // Hapus keranjang setelah semua data berhasil disimpan
            session()->forget('cart');

            // Redirect ke halaman menu dengan pesan sukses
            return redirect()->route('homeMenu')->with('success', 'Checkout berhasil! Pesanan Anda telah disimpan ke database.');
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan pesan ke halaman checkout
            \Log::error('Error while processing order: ' . $e->getMessage());
            return redirect()->route('checkout')->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }
}
