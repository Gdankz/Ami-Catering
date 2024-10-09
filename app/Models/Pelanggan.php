<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Pelanggan extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    protected $table = 'pelanggan';
    protected $primaryKey = 'idPelanggan';
    protected $fillable = [
        'nama',
        'alamat',
        'noHP',
        'email',
        'password',
    ];

    public $timestamps = false;
}
