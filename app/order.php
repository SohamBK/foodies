<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $guarded = [];

     const STATUS_PENDING = 10;
     const STATUS_IN_PROCESS = 3;
     const STATUS_CANCELLED = 5;
     const STATUS_ON_THE_WAY = 2;
     const STATUS_DELIVERED = 1;
 
     public static $status=[
         self::STATUS_PENDING => 'Pending',
         self::STATUS_IN_PROCESS => 'In Process',
         self::STATUS_DELIVERED => 'Delivered',
         self::STATUS_CANCELLED => 'Cancelled',
         self::STATUS_ON_THE_WAY => 'On the way',
     ];

     public function orderproduct()
     {
        return $this->hasMany('App\OrderProduct','order_id','id');
     }

     public function address()
     {
        return $this->hasOne('App\Address','id','address_id');
     }

     public function staff()
     {
        return $this->hasOne('App\DeliveryStaff','id','staff_id');
     }
}
