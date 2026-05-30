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
        Schema::create('formasis', function (Blueprint $table) {
    $table->id();
    $table->string('nama_formasi');
    $table->integer('kuota');
    $table->string('lokasi')->nullable();
    $table->text('syarat')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formasis');
    }
};
