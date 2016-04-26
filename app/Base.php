<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public $timestamps = false;
    public $table = "base_data";

    public function user(){
        return $this->belongsTo('user');
    }
}
