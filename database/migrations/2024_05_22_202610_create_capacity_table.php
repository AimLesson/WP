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
        Schema::create('capacity', function (Blueprint $table) {
            $table->id();
            $table->string('plant');
            $table->string('group_no');
            $table->string('group_name');
            $table->string('load');
            $table->date('cap_week');
            $table->string('cap_actual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacity');
    }
};
