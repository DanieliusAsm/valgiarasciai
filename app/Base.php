<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public $table = "base_data";

    public function user(){
        return $this->belongsTo('user');
    }
}
