<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soadd', function (Blueprint $table) {
            $table->id();
            $table->string('so_number');
            $table->string('item')->nullable();
            $table->string('item_desc')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('unit')->nullable();
            $table->string('disc')->nullable();
            $table->string('amount')->nullable();
            $table->string('product_type')->nullable();
            $table->string('order_no')->nullable();
            $table->string('spec')->nullable();
            $table->string('kbli')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     */
    public function down()
    {
        Schema::dropIfExists('soadd');
    }
};