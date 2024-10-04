<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Pelanggan'; // Nama tabel yang sesuai

    protected $fillable = [
        'Nama',
        'Alamat',
        'noHP',
        'Email',
        'Password',
    ];

    protected $hidden = [
        'Password', // Kolom yang harus disembunyikan
    ];
}
