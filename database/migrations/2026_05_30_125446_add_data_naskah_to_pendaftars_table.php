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
    Schema::table('pendaftars', function (Blueprint $table) {

        $table->string('judul_naskah')->nullable();

        $table->string('kategori_naskah')->nullable();

        $table->text('abstrak')->nullable();

        $table->string('instansi')->nullable();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('pendaftars', function (Blueprint $table) {

        $table->dropColumn([
            'judul_naskah',
            'kategori_naskah',
            'abstrak',
            'instansi'
        ]);

    });
}
};
