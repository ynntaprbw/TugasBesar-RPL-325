<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->id('idDenda');
            $table->unsignedBigInteger('idPeminjaman');
            $table->uuid('idCustomer');
            $table->integer('totalDenda');
            $table->dateTime('tanggalBayarDenda');
            $table->string('statusDenda');
            $table->string('metodePembayaran');
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('idCustomer')->references('idCustomer')->on('customers');
            $table->foreign('idPeminjaman')->references('idPeminjaman')->on('peminjaman');
        });

        // Adding check constraint for statusDenda column using raw SQL
        DB::statement('ALTER TABLE denda ADD CONSTRAINT chk_statusDenda CHECK (statusDenda IN ("Paid", "Unpaid", "Verifying"))');
    }

    public function down()
    {
        Schema::dropIfExists('denda');
    }
};
