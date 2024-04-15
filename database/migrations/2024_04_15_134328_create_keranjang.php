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
        $table->id();
        $table->integer('noBuku');
        $table->bigInteger('idKategori');
        $table->integer('idUlasan');
        $table->integer('jumlah_buku');
        $table->string('produkDipilih');
        $table->timestamps();

        // $table->foreign('noBuku')->references('id')->on('buku');
        // $table->foreign('idKategori')->references('id')->on('kategori');
        // $table->foreign('idUlasan')->references('id')->on('ulasan');
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
