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
        Schema::create('denda', function (Blueprint $table) {
            $table->id('idDenda');
            $table->unsignedBigInteger('idPeminjaman');
            $table->unsignedBigInteger('idUser');
            // $table->integer('idAdmin');
            $table->integer('totalDenda');
            $table->dateTime('tanggalBayarDenda');
            $table->string('statusDenda')->default('Unpaid');
            $table->string('metodePembayaran');
            $table->timestamps();

            
            $table->foreign('idUser')->references('idUser')->on('users');
            // $table->foreign('idAdmin')->references('idAdmin')->on('admin');
            $table->foreign('idPeminjaman')->references('idPeminjaman')->on('peminjaman');
            
            
            $table->checkConstraint('statusDenda IN ("Paid", "Unpaid", "In Verify")');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
