<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EatingType extends Model
{
    public $timestamps = false;
    public $table = "eatings";

    /*public function dietFood(){
        return $this->hasMany(DietFood::class);
    }*/
    /*public function diet(){
        return $this->belongsTo(Diet::class);
    }*/
}
