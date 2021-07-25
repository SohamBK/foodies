<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];

    public function product()
    {
       return $this->hasOne('App\Dish','id','dish_id');
    }
}
