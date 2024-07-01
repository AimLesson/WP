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
        Schema::create('rekap_order', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable();
            $table->string('product')->nullable();
            $table->string('so_number')->nullable();
            $table->string('qty')->nullable();
            $table->string('harga')->nullable();
            $table->string('total_harga')->nullable();
            $table->date('tahun')->nullable();
            $table->string('kbli_code')->nullable();
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
