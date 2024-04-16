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
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id('idKomunitas');
            $table->string('namaKomunitas', 100);
            $table->integer('jumlahAnggota');
            $table->string('logoKomunitas');
            $table->longText('tentangKomunitas');
            $table->longText('aturanKomunitas');
            $table->timestamps();

            // Menambahkan foreign key constraint
            // $table->foreign('idPengunjung')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komunitas');
    }
};
