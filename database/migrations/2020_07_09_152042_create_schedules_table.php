<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
          $table->id();
          $table->string('user_id');
          $table->date('Monday_of_the_Week');
          $table->integer('period');
          $table->boolean('MON');
          $table->boolean('TUE');
          $table->boolean('WED');
          $table->boolean('THU');
          $table->boolean('FRI');
          $table->boolean('SAT');
          $table->boolean('SUN');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
