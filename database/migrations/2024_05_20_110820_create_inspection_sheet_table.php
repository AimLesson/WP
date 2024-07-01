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
        Schema::create('inspection_sheet', function (Blueprint $table) {
            $table->id();
            $table->string('item_no')->unique();
            $table->string('qty')->nullable();
            $table->date('date')->nullable();
            $table->string('so_no')->nullable()->unique();
            $table->string('material')->nullable();
            $table->string('weight')->nullable();
            $table->string('dwg_no')->nullable();
            $table->string('no_s')->nullable();
            $table->string('no_b')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('thickness')->nullable();
            $table->string('rack')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_sheet');
    }
};
