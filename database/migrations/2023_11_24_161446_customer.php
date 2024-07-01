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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('company')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('npwp')->nullable();
            $table->string('tax_address');
            $table->string('shipment')->nullable();
            $table->string('customer_no')->nullable();
            $table->string('province')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('cp')->nullable();
            $table->string('webpage')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
