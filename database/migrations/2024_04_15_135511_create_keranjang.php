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
    Schema::create('keranjang', function (Blueprint $table) {
        $table->id('idKeranjang');
        $table->unsignedBigInteger('idUser');
        $table->unsignedBigInteger('idBuku');
        $table->unsignedBigInteger('idKategori');
        $table->unsignedBigInteger('idUlasan');
        $table->integer('jumlah_buku');
        $table->string('produkDipilih');
        $table->integer('total_harga');
        $table->timestamps();

        $table->foreign('idUser')->references('idUser')->on('users');
        $table->foreign('idBuku')->references('idBuku')->on('buku');
        $table->foreign('idKategori')->references('idKategori')->on('kategori');
        $table->foreign('idUlasan')->references('idUlasan')->on('ulasan');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};