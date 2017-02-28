<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    public $table = "diets";
    public $timestamps = false;

    public function eatings(){
        return $this->hasMany(Eating::class);
    }
    public function stats(){
        return $this->hasMany(DietStat::class);
    }
}
