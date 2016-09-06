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
            $table->string("eating_time");//9:40
            $table->string("eating_type");//pusryciai
            $table->integer("recommended_rate"); //30% kcal dienos normos suvartojama per pusrycius
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
