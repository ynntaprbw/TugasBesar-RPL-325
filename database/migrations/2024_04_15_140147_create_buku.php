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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idKategori');
            $table->string('judulBuku', 100);
            $table->string('namaPenulis', 45);
            $table->string('namaPenerbit', 100);
            $table->year('tahunTerbit');
            $table->integer('harga');
            $table->integer('stokBuku');
            $table->string('fotoSampul'); // Kolom ini untuk menyimpan nama file foto, tidak perlu tipe file submit
            $table->unsignedBigInteger('idUlasan');
            $table->timestamps();

            // Menambahkan foreign key constraint
            // $table->foreign('idKategori')->references('id')->on('kategori');
            // $table->foreign('idUlasan')->references('id')->on('ulasan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
