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
        Schema::create('standart_partadd', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('item')->nullable();
            $table->string('item_desc')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('unit')->nullable();
            $table->string('disc')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
