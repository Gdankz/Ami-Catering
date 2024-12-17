<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('idStaff')->primary(); // Ubah tipe menjadi string
            $table->string('nama');
            $table->string('alamat');
            $table->string('noHPStaff');
            $table->string('nik')->unique(); // NIK biasanya harus unik
            $table->string('gambarStaff')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
