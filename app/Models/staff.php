<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'idStaff'; // Tentukan primary key
    public $incrementing = false; // Nonaktifkan auto-increment jika idStaff bukan integer biasa
    protected $keyType = 'string'; // Atur tipe data primary key

    protected $fillable = [
        'idStaff',
        'nama',
        'alamat',
        'nik',
        'gambarStaff',
        'noHPStaff',
    ];
}
