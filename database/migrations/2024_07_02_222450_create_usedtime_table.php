
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedTimeTable extends Migration
{
    public function up()
    {
        Schema::create('used_time', function (Blueprint $table) {
            $table->id();
            $table->integer('proceed_number');
            $table->time('est_time');
            $table->time('duration')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('pending_at')->nullable();
            $table->timestamp('finished_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('used_time');
    }
}
