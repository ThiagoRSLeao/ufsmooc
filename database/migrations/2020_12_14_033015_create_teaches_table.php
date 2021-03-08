<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaches', function (Blueprint $table) {
            $table->id();
            $table->char('type', 1)->default('0');
            $table->boolean('acess_doubts');
            $table->boolean('acess_manage_modules');
            $table->boolean('acess_manage_questionary');
            $table->boolean('acess_manage_work');
            $table->boolean('acess_evaluate_questionary');
            $table->boolean('acess_evaluate_work');
            $table->text('reason_tutor');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
            $table->boolean('is_temporary');
            $table->datetime('dt_begin_ministering');
            $table->datetime('dt_end_ministering');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ministering');
    }
}
