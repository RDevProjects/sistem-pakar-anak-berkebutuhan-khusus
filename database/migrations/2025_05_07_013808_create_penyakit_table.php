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
        Schema::create('penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit')->unique(); // Contoh: P01 (Autisme), P02 (ADHD)
            $table->string('nama_penyakit');
            $table->text('deskripsi');
            $table->text('penanganan'); // Rekomendasi penanganan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyakit');
    }
};
