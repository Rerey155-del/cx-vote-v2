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
        Schema::create('anggota_luar_biasas', function (Blueprint $table) {
            $table->id();
            $table->string('angkatan');
            $table->string('name');
            $table->date('tanggal')->nullable();
            $table->time('absen_pagi')->nullable();
            $table->time('absen_siang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_luar_biasas');
    }
};
