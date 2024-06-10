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
        Schema::create('sumbangan', function (Blueprint $table) {
            $table->id('idBukuSumbangan');
            $table->uuid('id');
            $table->unsignedBigInteger('idKategori');
            $table->string('judulBuku', 100);
            $table->string('bahasa', 45);

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('idKategori')->references('idKategori')->on('kategori');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumbangan');
    }
};
