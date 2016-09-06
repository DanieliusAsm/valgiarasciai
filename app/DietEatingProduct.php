<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietFood extends Model
{
    public $timestamps = false;
    public $table = "diet_eating_product";

    // pivot table no relationships here.
}
