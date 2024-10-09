<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->id('noPesanan'); // menggunakan big integer
            $table->unsignedBigInteger('idPelanggan'); // untuk foreign key
            $table->foreign('idPelanggan')->references('idPelanggan')->on('pelanggan')->onDelete('cascade');

            $table->unsignedBigInteger('idAdmin'); // untuk foreign key
            $table->foreign('idAdmin')->references('idAdmin')->on('admin')->onDelete('cascade');

            $table->unsignedBigInteger('kodeMakanan'); // untuk foreign key
            $table->foreign('kodeMakanan')->references('kodeMakanan')->on('makanan')->onDelete('cascade');

            $table->unsignedBigInteger('idStaff'); // untuk foreign key
            $table->foreign('idStaff')->references('idStaff')->on('staff')->onDelete('cascade');

            $table->string('statusAntar', 100)->notNull();
            $table->dateTime('tanggalPesan');
            $table->dateTime('tanggalSelesai');
            $table->decimal('totalBiaya', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesan');
    }
}
