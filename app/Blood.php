<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    public $timestamps = false;
    public $table = "blood_database";

    public function user(){
        return $this->belongsTo('App\User');
    }
}