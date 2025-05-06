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
        Schema::create('gejala', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala')->unique(); // Contoh: G01, G02
            $table->text('deskripsi'); // Deskripsi gejala
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejala');
    }
};
