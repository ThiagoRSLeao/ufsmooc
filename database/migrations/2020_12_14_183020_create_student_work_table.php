<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_work', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('work_id')->unsigned()->index();
            $table->bigInteger('minister_id')->unsigned()->index();
            $table->string('name_work_route');
            $table->timestamp('deadline_work');
            $table->boolean('rated');
            $table->float('grade', 4, 2);
            $table->text('description_rating');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('work_id')->references('id')->on('work');
            $table->foreign('minister_id')->references('id')->on('minister');
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
        Schema::dropIfExists('student_work');
    }
}
