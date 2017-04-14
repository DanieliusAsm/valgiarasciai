<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("body_data", function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id");
            $table->double("biological_age");
            $table->string("body_fluid");
            $table->string("abdominal_fat");
            $table->double("weight");
            $table->string("fat_expression");
            $table->string("muscle_mass");
            $table->string("bone_mass");
            $table->double("kmi");
            $table->string("calorie_intake");
            $table->date('created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("body_data");
    }
}
