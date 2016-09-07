<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    public $table = "diets";
    public $timestamps = false;

    public function eating(){
        return $this->belongsToMany(Eating::class, 'diet_eating_product')
            ->withPivot('product_id','day','quantity');
    }
}
