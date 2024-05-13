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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('idPembelian');
            $table->uuid('id');
            // $table->unsignedBiginteger('idAdmin');
            $table->unsignedBigInteger('idKeranjang');
            $table->dateTime('tanggalPembayaran');
            $table->decimal('diskon');
            $table->integer('total_bayar');
            $table->string('metodePembayaran');
            $table->string('statusPembayaran');
            $table->string('statusPengambilan');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
            // $table->foreign('idAdmin')->references('idAdmin')->on('admin');
            $table->foreign('idKeranjang')->references('idKeranjang')->on('keranjang');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
