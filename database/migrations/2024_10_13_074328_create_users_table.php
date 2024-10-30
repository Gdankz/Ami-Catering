<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /*
     
Run the migrations.*/
    public function up(): void
<<<<<<< HEAD:database/migrations/0001_01_01_000000_create_users_table.php
    {
        // Membuat tabel 'pelanggan' jika belum ada
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('idPelanggan');
            $table->string('nama', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('noHP', 20)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->timestamps();
        });
=======
    {// Membuat tabel penggunaSchema::create('users', function (Blueprint $table) {$table->id(); // ID auto increment$table->string('name'); // Nama pengguna$table->string('email')->unique(); // Email unik$table->string('password'); // Password$table->text('alamat')->nullable(); // Alamat pengguna$table->string('noHP', 20)->nullable(); // Nomor HP$table->timestamps(); // Timestamps untuk created_at dan updated_at});
>>>>>>> 8c46c732a2a534d23f28b1c8e49840f10c068f08:database/migrations/2024_10_13_074328_create_users_table.php

        // Membuat tabel password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Membuat tabel sessions
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
     
Reverse the migrations.*/
    public function down(): void
    {
<<<<<<< HEAD:database/migrations/0001_01_01_000000_create_users_table.php
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('password_reset_tokens');
=======
>>>>>>> 8c46c732a2a534d23f28b1c8e49840f10c068f08:database/migrations/2024_10_13_074328_create_users_table.php
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users'); // Hapus tabel users jika rollback
    }
};