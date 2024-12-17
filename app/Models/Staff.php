<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'idStaff';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idStaff', 'nama', 'alamat', 'nik', 'gambarStaff', 'noHPStaff'];

    // Metode untuk generate ID Staff
    public static function generateIdStaff()
    {
        $lastStaff = self::orderBy('idStaff', 'desc')->first();

        // Jika belum ada staff, ID pertama adalah "S1"
        if (!$lastStaff) {
            return 'S1';
        }

        // Ambil angka dari ID terakhir dan tambahkan 1
        $lastIdNumber = (int) substr($lastStaff->idStaff, 1); // Ambil angka setelah huruf "S"
        $newIdNumber = $lastIdNumber + 1;

        // Buat ID baru dengan format "S" diikuti nomor baru
        return 'S' . $newIdNumber;
    }
}
