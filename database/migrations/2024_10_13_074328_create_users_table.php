<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /*
     * Run the migrations.
     */
    public function up(): void
    {
        // Membuat tabel 'pelanggan'

        // Periksa apakah tabel 'pelanggan' sudah ada
        if (!Schema::hasTable('pelanggan')) {
            Schema::create('pelanggan', function (Blueprint $table) {
                $table->id('idPelanggan');
                $table->string('nama', 100);
                $table->string('alamat', 255)->nullable();
                $table->string('noHP', 20)->nullable();
                $table->string('email', 100)->unique();
                $table->string('password', 255);
                $table->timestamps();
            });
        }

        // Membuat tabel 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Membuat tabel 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); // ID pengguna yang terkait
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
