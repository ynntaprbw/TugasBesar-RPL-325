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
        $table->uuid('id');
        $table->unsignedBigInteger('idBuku');
        $table->unsignedBigInteger('idKategori');
        $table->integer('jumlah_buku');
        $table->integer('total_harga');
        $table->timestamps();

        $table->foreign('id')->references('id')->on('users');
        $table->foreign('idBuku')->references('idBuku')->on('buku');
        $table->foreign('idKategori')->references('idKategori')->on('kategori');
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
