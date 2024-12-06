<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToPelangganTable extends Migration
{
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->string('role', 50)->default('user'); // Menambahkan kolom role
        });
    }

    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn('role'); // Menghapus kolom role jika migrasi dibatalkan
        });
    }
}
