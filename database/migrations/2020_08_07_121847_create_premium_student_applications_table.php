<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumStudentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_student_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('full_name');
            $table->string('name_kana');
            $table->string('user_id');
            $table->string('email');
            $table->string('phone_number');
            $table->string('plan');
            $table->integer('grade');
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
        Schema::dropIfExists('premium_student_applications');
    }
}
