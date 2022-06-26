<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id')->unique();
            $table->string('email')->uniqu();
            $table->string('provisional_password');  // 仮のパスワード　８桁の文字列
            $table->string('college_name');
            $table->string('department');
            $table->string('major');
            $table->string('grade');
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
        Schema::dropIfExists('teacher_applications');
    }
}
