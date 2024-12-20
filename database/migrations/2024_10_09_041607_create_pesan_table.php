<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->id('noPesanan');
            $table->unsignedBigInteger('idPelanggan');
            $table->foreign('idPelanggan')->references('idPelanggan')->on('pelanggan')->onDelete('cascade');
            $table->unsignedBigInteger('idAdmin');
            $table->foreign('idAdmin')->references('idAdmin')->on('admin')->onDelete('cascade');
            $table->string('kodeMakanan', 255);
            $table->foreign('kodeMakanan')->references('kodeMakanan')->on('makanan')->onDelete('cascade');
            $table->unsignedBigInteger('idStaff');
            $table->foreign('idStaff')->references('idStaff')->on('staff')->onDelete('cascade');
            $table->string('statusAntar', 100)->notNull();
            $table->dateTime('tanggalPesan');
            $table->dateTime('tanggalSelesai');
            $table->decimal('totalBiaya', 10, 2)->nullable();

            // Tambahkan kolom untuk deskripsi dan bukti transfer
            $table->text('deskripsi')->nullable(); // Deskripsi bersifat opsional
            $table->string('buktiTransfer')->nullable(); // Path bukti transfer opsional

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }
}
