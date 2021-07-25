<?php

namespace App\Http\Controllers;

use App\DeliveryStaff;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;

class DeliveryStaffController extends Controller
{
    public function role()
    {
        // if(!Gate::allows('isRestaurent')){
        //     abort(403,"Sorry, You can't do this actions");
        // }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blamable()
    {
        Category::creating(function($category){
            $category->created_by = \Auth::id();
        });

        Category::updating(function($category){
            $category->updated_by = \Auth::id();
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->role();

        $column = $request->input('column');
        $keyword = $request->input('search');
        $status = $request->input('status');
        $deliverystaffs = Deliverystaff::where(['rest_id'=>Auth::user()->restnew->id])->latest()->search($column,$keyword,$status)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword,'status'=>$status]);

        // $category = new Category();
        return view('deliverystaff.index',['deliverystaffs'=>$deliverystaffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->role();

        return view('deliverystaff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->role();

        $request->validate([
            'restaurent_name' => 'string',
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'email' => 'required | email | unique:users,email' ,
            'mobile' => 'required | numeric | unique:users,mobile' ,
            'password' => 'required | min:6 | max:100',
            'status' => 'required | numeric',
        ]);

        $deliverystaff = Deliverystaff::create($request->all()+['rest_id'=>Auth::user()->restnew->id]);
        return view('deliverystaff.show',['deliveryStaff' => $deliverystaff]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryStaff  $deliveryStaff
     * @return \Illuminate\Http\Response
     */
    public function show($deliverystaff)
    {
        $this->role();

        $model = Deliverystaff::find($deliverystaff);
        return view('deliveryStaff.show',['deliveryStaff'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliveryStaff  $deliveryStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliverystaff $deliverystaff)
    {
        $this->role();

        
        // dd($deliverystaff);
        //$model = Deliverystaff::find($deliverystaff);
        return view('deliveryStaff.edit',['deliveryStaff' => $deliverystaff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeliveryStaff  $deliveryStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliverystaff $deliverystaff)
    {
        $this->role();

        $model = $deliverystaff->update($request->validate([
            //restaurent_name' => 'required | string',
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'email' => 'required | email | unique:users,email' ,
            'mobile' => 'required | numeric | unique:users,mobile' ,
            // 'password' => 'required | min:6 | max:100',
            'status' => 'required | numeric',
        ]));
        
        Deliverystaff::updating(function($deliverystaff){
            $deliverystaff->updated_by = \Auth::id();
        });

        $model = $deliverystaff->update($request->all());
        return view('deliveryStaff.show',['deliveryStaff'=>Deliverystaff::findOrfail($deliverystaff->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryStaff  $deliveryStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliverystaff $deliverystaff)
    {
        $this->role();
        
        $deliverystaff->delete(); 
        
        return redirect('/deliverystaff');
    }
}
