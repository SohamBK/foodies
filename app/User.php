<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static $status=[
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'username', 'email', 'password','first_name','last_name','mobile','media_id','status'
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected $fillable = [
    //     'stripe_id',
    // ];

    public function scopeSearch($query, $column, $keyword)
    {
        return $query->where($column?$column:'username' , 'like' , '%'.$keyword.'%');
    }
    
    public function Image()
    {
        return $this->hasOne('App\Media','id','media_id');
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
        return $this->hasOne('App\Restaurent','id','user_id')->select('id');
    }

    public function rest()
    {
        return $this->hasOne('App\Restaurent','id','user_id')->select('id');
    }

    public function restnew()
    {
        return $this->hasOne('App\Restaurent','user_id','id');
    }

    public function userAddress()
    {
        return $this->hasOne('App\UserAddress','user_id','id');
    }
}

