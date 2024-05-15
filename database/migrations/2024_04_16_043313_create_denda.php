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
            $table->uuid('id');
            $table->integer('totalDenda');
            $table->dateTime('tanggalBayarDenda') -> nullable();
            $table->enum('statusDenda', ['Belum Lunas', 'Lunas'])->default('Belum Lunas');
            $table->string('metodePembayaran');
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('id')->references('id')->on('users');
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
