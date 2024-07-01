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
        Schema::create('processingadd', function (Blueprint $table) {
            $table->id();
            $table->string('no_process')->nullable();
            $table->string('nos')->nullable();
            $table->string('machine')->nullable();
            $table->string('group_name')->nullable();
            $table->string('operation')->nullable();
            $table->string('estimated_time')->nullable();
            $table->string('date_wanted')->nullable();
            $table->string('barcode_id')->nullable();
            $table->string('mach_cost')->nullable();
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
        Schema::dropIfExists('processingadd');
    }
};