<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work', function (Blueprint $table) {
            $table->id();
            $table->string('name_title_work')->nullable();
            $table->float('work_weight', 5, 2)->nullable();
            $table->string('name_work_path')->nullable();
            $table->bigInteger('module_partition_id')->unsigned()->index();
            //$table->foreign('module_partition_id')->references('id')->on('module_partition');
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
        Schema::dropIfExists('work');
    }
}
