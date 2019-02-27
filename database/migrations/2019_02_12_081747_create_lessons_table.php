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
            $table->string('lesson_code');
            $table->integer('school_id')->nullable();
            $table->string('school_name');
            $table->integer('department_id')->nullable();
            $table->string('department_name');
            $table->string('name');
            $table->string('teachers');
            $table->integer('opening_year');
            $table->integer('target_year');
            $table->integer('semester');
            $table->integer('is_general')->nullable();
            $table->integer('is_expert')->nullable();
            $table->integer('is_language')->nullable();
            $table->integer('unit');
            $table->integer('day_of_the_week');
            $table->integer('period');
            $table->string('outline');
            $table->string('goal');
            $table->string('book');
            $table->string('test');
            $table->timestamps();
            $table->unique(['lesson_code', 'school_id', 'department_id']);
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
