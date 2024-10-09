<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id('idStaff'); // menggunakan big integer
            $table->string('nama', 100);
            $table->string('alamat', 100)->nullable();
            $table->string('noHPStaff', 100)->nullable();
            $table->date('tanggalMulaiKerja')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
