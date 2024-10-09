<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('idAdmin'); // menggunakan big integer
            $table->string('namaAdmin', 100);
            $table->string('alamatAdmin', 100)->nullable();
            $table->string('noHPAdmin', 100)->nullable();
            $table->string('username', 100)->unique();
            $table->string('password', 255); // password
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}

