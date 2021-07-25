<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $guarded = [];

    const EMAIL_SEND = 1;
    const EMAIL_UNSEND = 2;

    public static $status=[
        self::EMAIL_SEND => 'Send',
        self::EMAIL_UNSEND => 'Unsend'
    ];

    public function scopeSearch($query, $column = 'to', $keyword)
    {
        
            return $query->where($column?$column:'to' , 'like' , '%'.$keyword.'%');
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
