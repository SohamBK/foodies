<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->hasOne('App\City','id','city_id');
    }

    public function area()
    {
        return $this->hasOne('App\CityArea','id','area_id');
    }
}
