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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('idUlasan');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idBuku');
            $table->decimal('rating');
            $table->longText('komentar');
            $table->dateTime('tanggalUlasan');
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idBuku')->references('idBuku')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     */

     
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
