<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static $status=[
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    const STATUS_VEGETARIAN = 1;
    const STATUS_NONVEGETARIAN = 2;

    public static $dish_for=[
        self::STATUS_VEGETARIAN => 'VEGETARIAN',
        self::STATUS_NONVEGETARIAN => 'NONVEGETARIAN'
    ];

    protected $guarded = [];

    public function Image()
    {
        return $this->hasOne('App\Media','id','image_id');
    }

    public function scopeSearch($query, $column = 'name', $keyword, $status)
    {
        
        return $query->where($column?$column:'name' , 'like' , '%'.$keyword.'%');
    }

    public function dishCategory()
    {
        return $this->hasOne('App\DishCategory','dish_id','id');
    }

    public function dishCategorys()
    {
        return $this->hasMany('App\DishCategory','dish_id','id');
    }

    public function customization()
    {
        return $this->hasMany('App\Customization','dish_id','id');
    }

    public function restaurent()
    {
        return $this->hasOne('App\Restaurent','id','restaurent_id');
    }

}
