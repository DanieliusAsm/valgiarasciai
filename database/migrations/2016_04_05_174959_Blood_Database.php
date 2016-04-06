<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BloodDatabase extends Migration
{

    public function up()
    {
        Schema::create("blood_database", function(Blueprint $table){

            $table->increments("id");
            $table->integer("user_id");
            $table->integer("arterija");
            $table->integer("pulsas");
            $table->integer("cholesterolis");
            $table->integer("mtl");
            $table->integer("dtl");
            $table->integer("trig");
            $table->integer("gliukozė");

        });
    }

    public function down()
    {
        Schema::drop("blood_database");
    }
}
