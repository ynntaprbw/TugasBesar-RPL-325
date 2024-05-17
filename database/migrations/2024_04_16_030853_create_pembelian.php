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
            $table->unsignedBigInteger('idBuku');
            $table->dateTime('tanggalPembayaran');
            $table->decimal('diskon')->default(0.0);
            $table->integer('total_bayar');
            $table->enum('metodePembayaran', ['Ovo', 'Gopay', 'Shopeepay', 'Dana']);
            $table->enum('statusPembayaran', ['Belum Lunas', 'Lunas'])->default('Belum Lunas');
            $table->enum('statusPengambilan', ['Belum Diambil', 'Diambil'])->default('Belum Diambil');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
            // $table->foreign('idAdmin')->references('idAdmin')->on('admin');
            $table->foreign('idBuku')->references('idBuku')->on('buku');

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
