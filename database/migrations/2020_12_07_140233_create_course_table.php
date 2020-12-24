<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('course_title', 40);
            $table->string('course_subtitle', 40);
            $table->string('path_picture_course', 80);
            $table->text('course_description');
            $table->boolean('has_tutoring');
            $table->boolean('has_certification');
            $table->boolean('has_deadline');
            $table->boolean('has_end');
            $table->dateTime('begin_subscriptions_date');
            $table->dateTime('end_subscriptions_date');
            $table->dateTime('begin_course_date');
            $table->dateTime('end_course_date');
            $table->string('course_cartegory');
            //$table->foreign('course_cartegory_id')->references('id')->on('course_cartegory');
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
        Schema::dropIfExists('course');
    }
}
