<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id');
            $table->integer('teacher_id');
            $table->timestamps();
            $table->unique(array('lesson_id', 'teacher_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_teachers');
    }
}
