<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('gender');
            $table->integer('age');
            $table->string('email'); // ->unique() ?
            $table->string('phone');
            $table->string('notes');
            $table->integer('diet_id');
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
        Schema::drop('users');
    }
}
