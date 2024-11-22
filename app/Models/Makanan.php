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
        'deskripsi', 
        'jenisMakanan', 
        'harga', 
        'gambarMakanan',
        'availability'
    ];
}
