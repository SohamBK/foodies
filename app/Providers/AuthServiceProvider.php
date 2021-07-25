<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($user){
            return $user->role == 'admin';
        });
    
        $gate->define('isMarketing', function($user){
            return $user->role == 'marketing';
        });
        
        $gate->define('isRestaurant', function($user){
            return $user->role == 'restaurant';
        });
        
        $gate->define('isCoustomer', function($user){
            return $user->role == 'coustomer';
        });

        $gate->define('isSubscribe', function($user){
            $subscription = \App\Subscription::where('ends_at','>=',date('Y-m-d'))->where(['user_id'=>Auth::user()->id])->limit(1)->get();

            if($subscription->count() == 0)
            {
                return true;
            }else{
                return false;
            }
        });
    }
}
