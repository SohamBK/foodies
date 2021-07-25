<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_address';
    protected $guarded = [];

    public function address()
    {
        return $this->hasOne('App\Address','id','address_id');
    }
}
