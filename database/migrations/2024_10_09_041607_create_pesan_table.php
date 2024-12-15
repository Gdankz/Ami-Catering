<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    public function up()
    {
        // Pastikan kita menggunakan InnoDB sebagai engine
        Schema::create('pesan', function (Blueprint $table) {
            // Pastikan semua kolom yang menjadi foreign key adalah unsignedBigInteger
            $table->id('noPesanan'); // idPesanan menggunakan big integer
            $table->unsignedBigInteger('idPelanggan'); // foreign key ke tabel pelanggan
            $table->foreign('idPelanggan')->references('idPelanggan')->on('pelanggan')->onDelete('cascade');

            $table->unsignedBigInteger('idAdmin'); // foreign key ke tabel admin
            $table->foreign('idAdmin')->references('idAdmin')->on('admin')->onDelete('cascade');

            $table->string('kodeMakanan', 255); // kodeMakanan sebagai string, disesuaikan dengan tabel makanan
            $table->foreign('kodeMakanan')->references('kodeMakanan')->on('makanan')->onDelete('cascade');

            $table->unsignedBigInteger('idStaff'); // foreign key ke tabel staff
            $table->foreign('idStaff')->references('idStaff')->on('staff')->onDelete('cascade');

            // Kolom lainnya
            $table->string('statusAntar', 100)->notNull();
            $table->dateTime('tanggalPesan');
            $table->dateTime('tanggalSelesai');
            $table->decimal('totalBiaya', 10, 2)->nullable();
            $table->timestamps();

            // Pastikan tabel ini menggunakan InnoDB
            $table->engine = 'InnoDB'; // Menggunakan engine InnoDB untuk mendukung foreign key
        });
    }

    public function down()
    {
        // Drop tabel pesan jika rollback migration
        Schema::dropIfExists('pesan');
    }
}
