<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('poin');
            $table->integer('project_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('description')->nullable();
            $table->integer('priority');
            $table->integer('status');
            $table->integer('type_task');
            $table->timestamps();
        });

        Schema::table('tasks', function(Blueprint $table){
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
