<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePartitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_partition', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->type('char');
            $table->integer('sequence_position');
            $table->text('content');
            $table->bigInteger('id_module');
            $table->foreign('id_module')->references('id')->on('module');
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
        Schema::dropIfExists('module_partition');
    }
}
