<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietEatingProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("diet_eating_product",function(Blueprint $table){
            $table->increments("id");
            $table->integer("diet_id");
            $table->integer("eating_id");
            $table->integer("product_id");
            $table->integer("day"); // Which day
            $table->integer("quantity");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("diet_eating_product");
    }
}
