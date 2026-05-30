<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftars', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_pendaftaran')->unique();

    $table->string('jenis_pendaftar')->default('Umum');
    $table->foreignId('formasi_id')->constrained('formasis')->onDelete('cascade');

    $table->string('nik');
    $table->string('nama');
    $table->string('tempat_lahir')->nullable();
    $table->date('tanggal_lahir')->nullable();
    $table->string('jenis_kelamin')->nullable();
    $table->text('alamat')->nullable();
    $table->string('no_hp')->nullable();
    $table->string('email')->nullable();

    $table->string('ktp')->nullable();
    $table->string('ijazah')->nullable();
    $table->string('pas_foto')->nullable();
    $table->string('file_pendukung')->nullable();

    $table->string('status_verifikasi')->default('Menunggu Verifikasi');
    $table->string('status_seleksi')->default('Belum Diproses');
    $table->text('catatan')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
