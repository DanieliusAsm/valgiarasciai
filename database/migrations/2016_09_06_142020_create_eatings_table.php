<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("eatings",function(Blueprint $table){
            $table->increments('id');
            $table->integer('diet_id')->unsigned();
            $table->foreign('diet_id')->references('id')->on('diets');
            $table->string("eating_time");//9:40
            $table->string("eating_type");//pusryciai
            $table->integer("recommended_rate"); //30% kcal dienos normos suvartojama per pusrycius
            $table->double("protein");
            $table->double("fat");
            $table->double("carbs");
            $table->double("cholesterol");
            $table->double("energy_value");
            $table->smallInteger("day"); // to be used to sort by.
            $table->boolean("enabled"); // to be used editing add/remove eatings
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("eatings");
    }
}
