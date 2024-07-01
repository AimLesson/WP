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
        Schema::create('salesorder', function (Blueprint $table) {
            $table->id();
            $table->string('so_number')->unique();
            $table->string('quotation_no')->nullable();
            $table->string('company_name')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('order_unit')->nullable();
            $table->string('sow_no')->nullable();
            $table->string('tax_address')->nullable();
            $table->string('npwp')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('type')->nullable();
            $table->string('sample')->nullable();
            $table->string('ass_type')->nullable();
            $table->string('qc_statement')->nullable();
            $table->string('packing_type')->nullable();
            $table->string('ptp')->nullable();
            $table->date('dod')->nullable();
            $table->string('shipping_address')->nullable();
            $table->date('date')->nullable();
            $table->string('top')->nullable();
            $table->string('net_days')->nullable();
            $table->string('fob')->nullable();
            $table->string('shipping')->nullable();
            $table->date('ship_date')->nullable();
            $table->string('po_number')->nullable();
            $table->string('salesman')->nullable();
            $table->string('dp')->nullable();
            $table->string('dp_percent')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('file')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax')->nullable();
            $table->string('freight')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('tax_type')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('salesorder');
    }
};