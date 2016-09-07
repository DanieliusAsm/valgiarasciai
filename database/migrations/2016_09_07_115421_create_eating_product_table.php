<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEatingProductTable extends Migration
{

    public function up()
    {
        Schema::create("eating_product",function(Blueprint $table){
            $table->increments("id");
            $table->integer("eating_id");
            $table->integer("product_id");
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
        Schema::drop("eating_product");
    }
}
