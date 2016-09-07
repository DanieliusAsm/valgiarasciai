<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eating extends Model
{
    public $timestamps = false;
    public $table = "eatings";

    public function product(){
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }
}
