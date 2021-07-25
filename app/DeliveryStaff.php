<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStaff extends Model
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static $status=[
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    protected $guarded = [];

    public function scopeSearch($query, $column = 'first_name', $keyword, $status)
    {
        
        return $query->where($column?$column:'first_name' , 'like' , '%'.$keyword.'%');
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
