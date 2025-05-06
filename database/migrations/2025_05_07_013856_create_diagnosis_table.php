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
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Pengguna yang melakukan diagnosa
            $table->json('gejala_terpilih'); // Gejala yang dipilih pengguna
            $table->foreignId('penyakit_id')->constrained('penyakit'); // Hasil diagnosa
            $table->float('confidence_level')->nullable(); // Tingkat keyakinan (jika menggunakan Certainty Factor)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis');
    }
};
