<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('idPelanggan'); // menggunakan big integer
            $table->string('nama', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('noHP', 20)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255); // password
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
