<?php

namespace App\Http\Controllers;

use App\PlanRegistration;
use Illuminate\Http\Request;
use PaytmWallet;

class PlanRegistrationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlanRegistration  $planRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(PlanRegistration $planRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanRegistration  $planRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanRegistration $planRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanRegistration  $planRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanRegistration $planRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanRegistration  $planRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanRegistration $planRegistration)
    {
        //
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function register()
    {
        return view('order_payment.register');
    }

     /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function order(Request $request)
    {

//|unique:plan_registration,  mobile_no',
        $this->validate($request, [
            'name' => 'required',
            'mobile_no' => 'required|numeric|digits:10|unique:plan_registration,mobile_no',
            'address' => 'required',
        ]);


        $input = $request->all();
        $input['order_id'] = $request->mobile_no.rand(1,100);
        $input['fee'] = 50;


        PlanRegistration::create($input);


        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            // 'env' => 'local', // values : (local | production)
            // 'MID' => 'xDXBgS57377830380708',
            // 'merchant_key' => 'c8BseEv%f!KLzQx7',
            // 'WEBSITE' => 'WEBSTAGING ',
            // 'channel' => 'WEB ',
            // 'INDUSTRY_TYPE_ID' => 'Retail',
          'order' => $input['order_id'],
          'user' => 'user123',
          'mobile_number' => '8454081359',
          'email' => 'sohamtesting2@gmail.com',
          'amount' => $input['fee'],
          'callback_url' => url('/login')
        ]);
        //dd($payment->receive());
        return $payment->receive();
    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');


        $response = $transaction->response();
        $order_id = $transaction->getOrderId();


        if($transaction->isSuccessful()){
          PlanRegistration::where('order_id',$order_id)->update(['status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);


          dd('Payment Successfully Paid.');
        }else if($transaction->isFailed()){
            PlanRegistration::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
          dd('Payment Failed.');
        }
    }    
}
