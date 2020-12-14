<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptiveQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptive_question', function (Blueprint $table) {
            $table->id();
            $table->float('question_weight', 4, 2);
            $table->integer('number_question');
            $table->text('description_question');
            $table->text('answer_question');
            $table->bigInteger('questionary_id')->unsigned()->index();
            $table->foreign('questionary_id')->references('id')->on('questionary');
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
        Schema::dropIfExists('descriptive_question');
    }
}
