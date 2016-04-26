<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Scheme::create('base_data', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('wrist');
            $table->integer('waist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('base_data');
    }
}
