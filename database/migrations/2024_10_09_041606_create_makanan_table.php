<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakananTable extends Migration
{
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->id('kodeMakanan'); // menggunakan big integer
            $table->string('namaMakanan', 100);
            $table->string('deskripsi', 500)->nullable();
            $table->string('jenisMakanan', 20);
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makanan');
    }
}
