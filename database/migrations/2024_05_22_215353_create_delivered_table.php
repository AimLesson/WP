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
        Schema::create('delivered', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('customer');
            $table->string('product');
            $table->string('cost_material');
            $table->string('cost_std');
            $table->string('cost_mach');
            $table->string('cost_labor');
            $table->string('cost_subcon');
            $table->string('cost_ohm');
            $table->string('amount');
            $table->string('so_amount');
            $table->string('state');
            $table->date('date_order');
            $table->date('date_finish');
            $table->date('date_delivery');
            $table->String('date_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivered');
    }
};
