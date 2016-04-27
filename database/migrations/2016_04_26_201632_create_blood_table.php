<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("blood_data", function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id");
            $table->integer("blood_pressure");
            $table->integer("pulse");
            $table->integer("cholesterol");
            $table->integer("mtl");
            $table->integer("dtl");
            $table->integer("triglycerides");
            $table->integer("glucose");
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
        Schema::drop("blood_data");
    }
}
