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
        Schema::create('machine', function (Blueprint $table) {
            $table->id();
            $table->string('plant');
            $table->string('id_machine')->unique();
            $table->string('machine_name');
            $table->string('machine_type');
            $table->string('group_name');
            $table->string('group_id');
            $table->string('location');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('groupseq_id');
            $table->string('groupseq_name');
            $table->string('machine_state');
            $table->string('process');
            $table->string('image')->nullable();
            $table->string('purchase_date');
            $table->string('purchase_price');
            $table->string('depreciation_age');
            $table->integer('used_age');
            $table->integer('mach_hour');
            $table->integer('days_per_year');
            $table->string('bank_interest_percent'); // Kolom persentase bank_interest
            $table->string('floor_area');
            $table->string('maintenance_factor');
            $table->string('maintenance_cost_year');
            $table->string('floor_price');
            $table->string('power_consumption');
            $table->string('electric_price');
            $table->string('labor_cost');
            $table->string('machine_price');
            $table->string('depreciation_cost');
            $table->string('bank_interest'); // Kolom bunga bank dalam bentuk desimal
            $table->string('area_cost');
            $table->string('electrical_cost');
            $table->string('maintenance_cost');
            $table->string('mach_cost_per_hour');
            $table->string('total_mach');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine');
    }
};
