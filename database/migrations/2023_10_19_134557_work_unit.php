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
        Schema::create('work_unit', function (Blueprint $table) {
            $table->id();
            $table->string('work_unit', 10)->unique();
            $table->string('group',10);
            $table->string('information')->nullable();
            // Tambahkan kolom lain jika diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_unit');
    }
};
