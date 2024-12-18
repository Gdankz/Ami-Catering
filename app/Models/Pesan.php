<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'kodeMakanan', 'kodeMakanan');
    }
    protected $table = 'pesan'; // Nama tabel
    protected $primaryKey = 'noPesanan'; // Primary key
    public $timestamps = true; // Gunakan timestamps
    protected $fillable = [
        'idPelanggan',
        'idAdmin',
        'kodeMakanan',
        'idStaff',
        'statusAntar',
        'tanggalPesan',
        'tanggalSelesai',
        'totalBiaya',
    ];
}
