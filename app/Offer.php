<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static $status=[
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];
    
    const TYPE_ACTIVE = 1;
    const TYPE_INACTIVE = 2;

    public static $type=[
        self::TYPE_ACTIVE => 'Percentage',
        self::TYPE_INACTIVE => 'Fixed amount'
    ];
    
    const TYPE_OFFER = 10;
    const TYPE_COUPON = 0;

    public static $discount_type=[
        self::TYPE_OFFER => 'offer',
        self::TYPE_COUPON => 'coupon'
    ];

    protected $guarded = ['id','created_at','updated_at','created_by','updated_by'];
    // protected $guarded = [];

    public function scopeSearch($query, $column = 'name', $keyword)
    {
        
        return $query->where($column?$column:'name' , 'like' , '%'.$keyword.'%');
    }

    public function CreatedBy()
    {
        return $this->hasOne('App\User','id','created_by');
    }

    public function UpdatedBy()
    {
        return $this->hasOne('App\User','id','updated_by');
    }
}
