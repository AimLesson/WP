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
        Schema::create('so_target', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('product_type');
            $table->string('total_order');
            $table->string('nominal_value');
            $table->string('year');
            // Tambahkan kolom lain jika diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('so_target');
    }
};
