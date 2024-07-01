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
        Schema::create('itemadd', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('id_item')->nullable();
            $table->string('no_item')->nullable();
            $table->string('item')->nullable();
            $table->date('dod_item')->nullable();
            $table->string('material')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('thickness')->nullable();
            $table->string('qty')->nullable();
            $table->string('nos')->nullable();
            $table->string('nob')->nullable();
            $table->date('issued_item')->nullable();
            $table->string('ass_drawing')->nullable();
            $table->string('drawing_no')->nullable();
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
        Schema::dropIfExists('itemadd');
    }
};