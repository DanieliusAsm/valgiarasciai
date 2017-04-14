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
        Schema::create('base_data', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->double('height');
            $table->double('weight');
            $table->double('wrist');
            $table->double('waist');
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
        Schema::drop('base_data');
    }
}
