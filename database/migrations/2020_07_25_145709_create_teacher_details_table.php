<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_details', function (Blueprint $table) {
          $table->id();
          $table->integer('teacher_id');
          $table->string('full_name')->nullable();
          $table->string('name_kana')->nullable();
          $table->string('prefecture')->nullable();
          $table->string('college_name');
          $table->string('department');
          $table->string('major');
          $table->string('grade');
          for ($i = 1 ; $i < 23 ; $i++){
            $table->integer("subject_id_".$i);
          }
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_details');
    }
}
