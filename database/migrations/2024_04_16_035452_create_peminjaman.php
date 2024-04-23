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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('idPeminjaman');
            $table->uuid('idUser');
            // $table->integer('idAdmin');
            $table->unsignedBigInteger('idBuku');
            $table->dateTime('tanggalPeminjaman');
            $table->integer('durasiPeminjaman');
            $table->dateTime('batasPengembalian');
            $table->dateTime('tanggalPengembalian');
            $table->string('statusPeminjaman');
            $table->string('statusPengambilan');
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')->on('users');
            // $table->foreign('idAdmin')->references('idAdmin')->on('admin');
            $table->foreign('idBuku')->references('idBuku')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
