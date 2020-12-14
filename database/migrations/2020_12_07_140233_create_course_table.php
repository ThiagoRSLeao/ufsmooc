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
            $table->text('course_description');
            $table->string('route_picture_course', 80);
            $table->bool('has_tutoring');
            $table->bool('has_certification');
            $table->bool('has_deadline');
            $table->bool('has_end');
            $table->timestamp('begin_subscriptions_date');
            $table->timestamp('end_subscriptions_date');
            $table->timestamp('begin_course_date');
            $table->timestamp('end_course_date');
            $table->bigInteger('course_cartegory_id');
            $table->foreign('course_cartegory_id')->references('id')->on('course_cartegory');
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
