<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinisteringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministering', function (Blueprint $table) {
            $table->id();
            $table->char('tp_ministering', 1);
            $table->boolean('acess_doubts');
            $table->boolean('acess_manage_modules');
            $table->boolean('acess_manage_questionary');
            $table->boolean('acess_manage_work');
            $table->boolean('acess_evaluate_questionary');
            $table->boolean('acess_evaluate_work');
            $table->text('reason_tutor');
            $table->bigInteger('users_id');
            $table->bigInteger('course_id');
            $table->boolean('is_temporary');
            $table->timeStamp('dt_begin_ministering');
            $table->timeStamp('dt_end_ministering');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
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
