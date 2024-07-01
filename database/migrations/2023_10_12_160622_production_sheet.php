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
        Schema::create('production_sheet', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer');
            $table->string('product');
            $table->string('so_no')->unique();
            $table->date('dod');
            $table->string('assy_drawing');
            $table->string('po_ref');
            $table->string('no_prod');
            $table->string('no_item');
            $table->string('no_drawing');
            $table->date('date_wanted');
            $table->string('no_piece');
            $table->string('material');
            $table->string('no_blank');
            $table->string('weight');
            $table->string('blank_size');
            $table->string('item_name');
            $table->string('rack');
            $table->string('issued');
            $table->string('amount');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_sheet');
    }
};
