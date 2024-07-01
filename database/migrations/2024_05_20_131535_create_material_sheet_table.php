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
        Schema::create('material_sheet', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('customer');
            $table->string('product');
            $table->string('so_no');
            $table->date('dod');
            $table->string('no_product');
            $table->string('item_no');
            $table->string('item_name');
            $table->string('dwg_no');
            $table->string('nos');
            $table->string('material');
            $table->string('shape');
            $table->string('length');
            $table->string('width');
            $table->string('thick');
            $table->string('weight');
            $table->string('mat_cost');
            $table->string('mat_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_sheet');
    }
};
