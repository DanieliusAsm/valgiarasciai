<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $timestamps = false;
    public $table = "recipe_database";

    public function product(){
        return $this->belongsTo('App\Product');
    }
}