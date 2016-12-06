<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_stats', function(Blueprint $table){
            $table->increments('id');
            $table->integer('diet_id');
            $table->integer('day');
            $table->double("baltymai");
            $table->double("riebalai");
            $table->double("angliavandeniai");
            $table->double("cholesterolis");
            $table->double("eVerte");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diet_stats');
    }
}
