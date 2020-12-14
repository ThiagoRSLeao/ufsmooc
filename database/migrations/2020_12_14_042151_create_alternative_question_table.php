<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_question', function (Blueprint $table) {
            $table->id();
            $table->float('question_weight', 4, 2);
            $table->integer('number_question');
            $table->text('description_question');
            $table->bigInt('questionary_id');
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
        Schema::dropIfExists('alternative_question');
    }
}
