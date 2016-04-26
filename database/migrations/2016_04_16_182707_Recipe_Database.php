<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecipeDatabase extends Migration
{

    public function up()
    {
        Schema::create("recipe_database", function(Blueprint $table){

            $table->increments("id");
            $table->integer("product_id");
            $table->text("recipe");
        });
    }

    public function down()
    {

    }
}