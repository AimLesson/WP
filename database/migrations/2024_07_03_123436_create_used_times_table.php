<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedTimesTable extends Migration
{
    public function up()
    {
        Schema::create('used_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('processing_id')->constrained('processings')->onDelete('cascade');
            $table->string('process');
            $table->enum('status', ['queue', 'pending', 'finished']);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('used_times');
    }
}
