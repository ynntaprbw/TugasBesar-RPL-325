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
        Schema::create('post', function (Blueprint $table) {
            $table->id('idPost');
            $table->unsignedBigInteger('idKomunitas');
            // $table->unsignedBigInteger('idAdmin');
            $table->string('media');// Kolom ini untuk menyimpan nama file foto, tidak perlu tipe file submit
            $table->string('judulPost');
            $table->string('sumberPost');
            $table->longText('thumbnail');
            $table->dateTime('tanggalUnggah');
            $table->timestamps();

            $table->foreign('idKomunitas')->references('idKomunitas')->on('komunitas');
            // $table->foreign('idAdmin')->references('idAdmin')->on('Admin');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
