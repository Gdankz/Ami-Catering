<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan'; // Tambahkan baris ini untuk menentukan nama tabel
    use HasFactory;

    // Menggunakan kodeMakanan sebagai primary key
    protected $primaryKey = 'kodeMakanan';

    // Jika primary key bukan auto increment, set incrementing menjadi false
    public $incrementing = false;

    // Tentukan tipe primary key (string jika kodeMakanan berupa string)
    protected $keyType = 'string';
    protected $fillable = [
        'kodeMakanan',
        'namaMakanan',
        'jenisMakanan',
        'harga',
        'availability',
        'gambarMakanan',

    ];
    public static function generateKodeMakanan()
    {
        $lastMakanan = self::orderBy('kodeMakanan', 'desc')->first();

        // Jika belum ada staff, ID pertama adalah "S1"
        if (!$lastMakanan) {
            return 'M1';
        }

        // Ambil angka dari ID terakhir dan tambahkan 1
        $lastIdNumber = (int) substr($lastMakanan->kodeMakanan, 1); // Ambil angka setelah huruf "S"
        $newIdNumber = $lastIdNumber + 1;

        // Buat ID baru dengan format "S" diikuti nomor baru
        return 'M' . $newIdNumber;
    }
}
