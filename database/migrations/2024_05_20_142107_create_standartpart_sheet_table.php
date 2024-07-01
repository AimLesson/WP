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
        Schema::create('standartpart_sheet', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('customer');
            $table->string('product');
            $table->string('so_no');
            $table->date('dod');
            $table->string('no_product');
            $table->string('item_no');
            $table->string('item_name');
            $table->string('part_no');
            $table->string('part_name');
            $table->string('qty');
            $table->string('unit');
            $table->string('price');
            $table->string('total_price');
            $table->string('info');
            $table->string('pemesanan');
            $table->string('pesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standartpart_sheet');
    }
};
