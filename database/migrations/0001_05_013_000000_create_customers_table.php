<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('idCustomer')->primary()->default('');
            $table->string('email')->unique();
            $table->string('namaLengkap');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->primary();
        //     $table->uuid('customer_id')->nullable()->index();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('customer_agent')->nullable();
        //     $table->longText('payload');
        //     $table->integer('last_activity')->index();
        // });

        // Generate UUID for existing customers
        DB::table('customers')->get()->each(function ($customer) {
            DB::table('customers')->where('idCustomer', $customer->idCustomer)->update(['idCustomer' => Uuid::uuid4()]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
