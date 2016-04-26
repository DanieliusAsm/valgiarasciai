<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public $table = "base_table";

    public function user(){
        return $this->belongsTo('user');
    }
}
