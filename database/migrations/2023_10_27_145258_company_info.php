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
        Schema::create('company_info', function (Blueprint $table) {
            $table->id();
            $table->string('company_name'); // Kolom teks
            $table->text('address');
            $table->string('machines_type');
            $table->string('production_director');
            $table->string('image')->nullable(); // Kolom untuk nama file gambar (dapat bernilai null)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_info');
    }
};
