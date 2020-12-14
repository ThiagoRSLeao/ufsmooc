<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyingCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studying_course', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned()->index();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('student_id')->references('id')->on('student');
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
        Schema::dropIfExists('studying_course');
    }
}
