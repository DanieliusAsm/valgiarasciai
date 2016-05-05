<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("diet_food",function(Blueprint $table){
            $table->increments("id");
            $table->integer("diet_id");
            $table->integer("product_id");
            $table->string("eating_time"); //9:40
            $table->string("eating_type"); // pusryciai
            $table->integer("day"); // 1st day
            $table->integer("quantity");
            $table->integer("recommended_rate");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("diet_food");
    }
}
