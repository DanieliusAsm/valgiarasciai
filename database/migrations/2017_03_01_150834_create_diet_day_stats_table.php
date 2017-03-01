<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietDayStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_day_stats', function(Blueprint $table){
            $table->increments('id');
            $table->integer('diet_id')->unsigned();
            $table->foreign('diet_id')->references('id')->on('diets');
            $table->integer('day');
            $table->double("protein");
            $table->double("fat");
            $table->double("carbs");
            $table->double("cholesterol");
            $table->double("energy_value");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diet_day_stats');
    }
}
