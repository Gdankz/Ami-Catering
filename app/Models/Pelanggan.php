<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pelanggan extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'Pelanggan'; // Nama tabel

    protected $fillable = [
        'Nama',
        'Alamat',
        'noHP',
        'Email',
        'Password',
    ];

    protected $hidden = [
        'Password', // Kolom yang disembunyikan
    ];

    public $timestamps = false;
}
