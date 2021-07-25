<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanRegistration extends Model
{
    protected $table = 'plan_registration';


    // protected $fillable = ['name','mobile_no','address','status','fee','order_id','transaction_id'];

    protected $guarded = [];
}
