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
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('work_unit', 10);
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('group',10);
            $table->string('user_novvel');
            $table->string('information')->nullable();
            $table->string('nik')->nullable();
            // Tambahkan kolom lain jika diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department');
    }
};
