<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    public $timestamps = false;
    public $table = "body_data";

    public function user(){
        return $this->belongsTo('App\User');
    }
}
