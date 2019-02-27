<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools')->nullable();
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->nullable();
            $table->string('name');
            $table->tinyInteger('lesson_type');
            $table->tinyInteger('opening_year');
            $table->integer('target_year');
            $table->integer('semester');
            $table->tinyInteger('unit');
            $table->tinyInteger('day_of_the_week');
            $table->tinyInteger('period');
            $table->text('outline');
            $table->text('goal');
            $table->text('book');
            $table->text('test');
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
        Schema::dropIfExists('lessons');
    }
}
