<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietsTable extends Migration
{
    public function up()
    {
        Schema::create("diets", function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id"); // belongs to
            $table->integer("total_days"); //full diet in days
            $table->integer("total_eating"); // how many times per day
            $table->string("notes"); // notes regarding client
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
