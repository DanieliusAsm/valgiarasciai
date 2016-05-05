<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("diets", function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id");
            $table->integer("total_days");
            $table->string("notes");
            $table->date("created");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("diets");
    }
}
