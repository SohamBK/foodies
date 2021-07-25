<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'favourite';

    protected $guarded = [];

    public function rest()
    {
        return $this->hasOne('App\Restaurent','id','rest_id');
    }

}
