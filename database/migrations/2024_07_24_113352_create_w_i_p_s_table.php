<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWIPsTable extends Migration
{
    public function up()
    {
        Schema::create('w_i_p_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->unique();
            $table->decimal('total_sales', 15, 2);
            $table->decimal('total_material_cost', 15, 2);
            $table->decimal('total_labor_cost', 15, 2);
            $table->decimal('total_machine_cost', 15, 2);
            $table->decimal('total_standard_part_cost', 15, 2);
            $table->decimal('total_sub_contract_cost', 15, 2);
            $table->decimal('total_overhead_cost', 15, 2);
            $table->decimal('cogs', 15, 2);
            $table->decimal('gpm', 15, 2);
            $table->decimal('oh_org', 15, 2);
            $table->decimal('noi', 15, 2);
            $table->decimal('bnp', 15, 2);
            $table->decimal('lsp', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('w_i_p_s');
    }
}
