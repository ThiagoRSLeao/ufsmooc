<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionary', function (Blueprint $table) {
            $table->id();
            $table->string('name_title', 50);
            $table->timestamps();
            $table->text('text_questionary');
            $table->char('type_question', 1);
            $table->bigInteger('module_id')->unsigned()->index();
            $table->foreign('module_id')->references('id')->on('module');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionary');
    }
}
