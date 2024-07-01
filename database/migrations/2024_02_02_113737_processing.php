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
        Schema::create('processing', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('no_item')->nullable();
            $table->date('dod')->nullable();
            $table->string('item')->nullable();
            $table->string('total_process')->nullable();
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
        Schema::dropIfExists('processing');
    }
};