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
            $table->unsignedBigInteger('processing_id'); // Use unsignedBigInteger for foreign key

            $table->foreign('processing_id') // Define foreign key constraint
                ->references('id')
                ->on('processingadd') // Use the correct table name
                ->onDelete('cascade'); // Optional: Set onDelete behavior

            $table->string('status')->default('not_started');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('stopped_at')->nullable();
            $table->integer('duration')->default(0); // Duration in seconds
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('used_times');
    }
}
