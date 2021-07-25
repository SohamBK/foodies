<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscription = Subscription::where('ends_at','>=',date('Y-m-d'))->where(['user_id'=>Auth::user()->id])->limit(1)->get();

        $allow = true;
        if($subscription->count() == 0)
        {
            $allow = false;
        }
        return view('subscribe.create',['allow'=>$allow]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $token = $request->all('stripeToken')['stripeToken'];

        \Stripe\Stripe::setApiKey("sk_test_m9IJeDawzB34S1Xdrmla2m5p");

        $customer = \Stripe\Customer::create([
            'email' => $request->all('stripeEmail')['stripeEmail'],
            'source' => $token,
        ]);

        $subscription = \Stripe\Subscription::create([
            'customer' => $customer,
            'items' => [['plan' => $request->all('plan')['plan']]],
        ]);

        // dd($subscription->id);

        //dd($subscription);
        $subscription = Subscription::create([
            'user_id' => Auth::id(),
            'name'=> '',
            'stripe_id' => $subscription['customer'],
            'subscription_id' => $subscription->id,
            'quantity' => 1,
            'stripe_plan' =>$request->all('plan')['plan'],
            'ends_at'=> date('Y-m-d H:i:s',$subscription['current_period_end']),
            'created_at' => date('Y-m-d H:i:s',$subscription['current_period_start']),
        ]);

        return redirect('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $subscription = Subscription::where('ends_at','>=',date('Y-m-d'))->where(['user_id'=>Auth::user()->id])->limit(1)->get();

       return view('subscribe.show',['subscription'=>$subscription->count()>0?$subscription[0]:$subscription]);

        // return view('subscribe.show',['subscription'=>(!empty($subscription->items))?$subscription[0]:$subscription]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $s = $subscription;

        \Stripe\Stripe::setApiKey("sk_test_m9IJeDawzB34S1Xdrmla2m5p");

        $subscription = \Stripe\Subscription::retrieve($subscription->subscription_id);
        $subscription->cancel_at_period_end = true;
        $subscription->save();

        if($subscription["cancel_at_period_end"] == true)
        {
            $s->is_recurrsive=1;
            $s->save();
        }

        return redirect('show');
    }

    public function invoice(Subscription $subscription)
    {
        // dd($subscription);
        
        \Stripe\Stripe::setApiKey("sk_test_m9IJeDawzB34S1Xdrmla2m5p");

        // $response = \Stripe\Invoice::all(array('customer' => 'cus_Ebk4zBddFxAS5I'));
        $response = \Stripe\Invoice::all(array('customer' => $subscription->stripe_id));

        //$invoice = \Stripe\Invoice::create([
        //    'customer' => $subscription->stripe_id,
         //   'billing' => 'send_invoice',
         //   'days_until_due' => 30,
        //]);

        // dd($response->data[0]['hosted_invoice_url']);

        return redirect()->away($response->data[0]['hosted_invoice_url']);
    }

}
