<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_no')->unique();
            $table->string('company_name')->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('address')->nullable();
            $table->string('npwp')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('tax_address')->nullable();
            $table->string('email')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('sample')->nullable();
            $table->string('ass_type')->nullable();
            $table->string('qc_statement')->nullable();
            $table->string('packing_type')->nullable();
            $table->string('top')->nullable();
            $table->string('net_days')->nullable();
            $table->string('ptp')->nullable();
            $table->string('dod')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('file')->nullable();
            $table->date('valid')->nullable();
            $table->string('mdp')->nullable();
            $table->string('salesman')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('tax_type')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax')->nullable();
            $table->string('freight')->nullable();
            $table->string('total_amount')->nullable();
            // Tambahkan kolom-kolom lain sesuai kebutuhan Anda

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation');
    }
};