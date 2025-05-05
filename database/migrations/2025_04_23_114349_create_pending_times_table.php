<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pending_times', function (Blueprint $table) {
        $table->id();
        $table->foreignId('processing_add_id')->constrained('processing_adds')->onDelete('cascade');
        $table->dateTime('started_at');
        $table->dateTime('pending_at');
        $table->integer('duration_seconds');
        $table->string('user_name');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_times');
    }
};
