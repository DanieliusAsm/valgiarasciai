<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    public $table = "diets";
    public $timestamps = false;

   /* public function eatingType(){
        return $this->hasMany(EatingType::class);
    }*/
    public function dietFood(){
        return $this->belongsToMany(DietFood::class,'eating_types','');
    }
    /*public function dietFood(){
        return $this->hasManyThrough(EatingType::class, DietFood::class, 'eating_type_id' ,'diet_id', 'id');
    }*/

}
