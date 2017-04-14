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
            $table->double("blood_pressure");
            $table->double("pulse");
            $table->double("cholesterol");
            $table->double("mtl");
            $table->double("dtl");
            $table->double("triglycerides");
            $table->double("glucose");
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
