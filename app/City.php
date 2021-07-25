<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static $status=[
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    protected $fillable = [];
    
    protected $guarded = ['city_areas'];

    public function scopeSearch($query, $column = 'name', $keyword, $status)
    {
        // if($status)
        // {
        //     dd($status);
        //     return $query->where('status',$status);
        // }
        // else 
        // {
            return $query->where($column?$column:'name' , 'like' , '%'.$keyword.'%');//->where('status', $status?$status: self::STATUS_ACTIVE);
        //}
    }

    public function CreatedBy()
    {
        return $this->hasOne('App\User','id','created_by');
    }

    public function UpdatedBy()
    {
        return $this->hasOne('App\User','id','updated_by');
    }

    public function CityAreas()
    {
        return $this->hasMany('App\CityArea','city_id','id');
    }
}
