<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static $status=[
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    const STATUS_CASH_ON_DELIVERY = 10;
    const STATUS_ONLINE_PAYMENT = 5;
    const STATUS_BOTH = 0;

    public static $payment_method=[
        self::STATUS_CASH_ON_DELIVERY => 'Cast On Delivery',
        self::STATUS_ONLINE_PAYMENT => 'Online Payment',
        self::STATUS_BOTH => 'Both',
    ];

    protected $guarded = [];

    public function scopeSearch($query, $column = 'name', $keyword, $status)
    {
        
        return $query->where($column?$column:'name' , 'like' , '%'.$keyword.'%');
    }

    public function Image()
    {
        return $this->hasOne('App\Media','id','kitchen_id');
    }

    public function CreatedBy()
    {
        return $this->hasOne('App\User','id','created_by');
    }

    public function UpdatedBy()
    {
        return $this->hasOne('App\User','id','updated_by');
    }

    public function restaurent()
    {
        return $this->hasOne('App\Restaurent','id','user_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    
}
