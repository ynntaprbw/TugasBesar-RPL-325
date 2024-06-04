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
            $table->id('idSumbangan');
            $table->uuid('id');
            $table->unsignedBigInteger('idBuku');
            $table->integer('jumlah_buku');
            $table->dateTime('tanggalSumbangan');
            $table->dateTime('tanggalPenyerahan');

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('idBuku')->references('idBuku')->on('buku');
            
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
