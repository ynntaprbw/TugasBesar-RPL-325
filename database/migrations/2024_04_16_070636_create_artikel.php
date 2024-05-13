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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('idArtikel');
            $table->uuid('idCustomer');
            // $table->unsignedBigInteger('idAdmin');
            $table->string('media');// Kolom ini untuk menyimpan nama file foto, tidak perlu tipe file submit
            $table->string('judulArtikel', 20);
            $table->string('sumberArtikel');
            $table->longText('thumbnail');
            $table->dateTime('tanggalUnggah');
            $table->timestamps();

            $table->foreign('idCustomer')->references('idCustomer')->on('customers');
            // $table->foreign('idAdmin')->references('idAdmin')->on('Admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
