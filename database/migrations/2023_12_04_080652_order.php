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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('so_number');
            $table->string('quotation_number');
            $table->string('kbli_code');
            $table->string('reff_number')->nullable();
            $table->date('order_date');
            $table->string('product_type');
            $table->string('po_number');
            $table->string('sale_price');
            $table->string('production_cost')->nullable();
            $table->text('information')->nullable();
            $table->text('information2')->nullable();
            $table->text('information3')->nullable();
            $table->string('order_status')->nullable();
            $table->string('customer');
            $table->string('product');
            $table->string('qty');
            $table->date('dod');
            $table->date('dod_forecast')->nullable();
            $table->string('sample')->nullable();
            $table->string('material')->nullable();
            $table->string('catalog_number')->nullable();
            $table->string('material_cost')->nullable();
            $table->date('dod_adj')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
