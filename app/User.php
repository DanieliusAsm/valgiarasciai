<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    public $timestamps = false;

    public function blood(){
        return $this->hasMany('App\Blood');
    }
    public function body(){
        return $this->hasMany('App\Body');
    }
    public function base(){
        return $this->hasMany('App\Base');
    }
    public function diets(){
        return $this->hasMany('App\Diet');
    }
}