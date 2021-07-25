<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Media;
use App\City;
use App\CityArea;
use App\Category;
use App\User;
use App\Address;
use App\Restaurent;
use App\UserAddress;

class RestaurentRegisterController extends Controller
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
        //dd('hii');
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

         return view('restaturent_layout.main',['cities'=>$cities,'categories'=>$categories,'success'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

        $request->validate([
            'address' => 'required | string',
            'city_id' => 'required | integer' ,
            'area_id' => 'required | integer' ,
            'zip_code' => 'required | integer', 
            'username' => 'required | min:4 | max:100 | string',
            // 'email' => 'required | email | unique:users,email' ,
            // 'mobile' => 'required | numeric | unique:users,mobile' ,
            'email' => 'required | email ' ,
            'mobile' => 'required | numeric ' ,
            'password' => 'required | min:6 | max:100',
            'name' => 'required | string',
            'number_of_outlet' => 'integer' ,
            'category' => 'required | array',
            'website_address' => 'required | string',
            'shop_register_number' => 'required | string',
            'gstn' => 'required | integer' ,
            'fssai' => 'required | integer' , 
            'weekly_off' => 'required | string', 
            'payment_method' => 'required | integer', 
            'start_time' => 'required ',
            'end_time' => 'required ',
        ]);
       $address = Address::create($request->validate([
            'address' => 'required | string',
            'city_id' => 'required | integer' ,
            'area_id' => 'required | integer' ,
            'zip_code' => 'required | integer', 
        ]) + ['status'=>User::STATUS_ACTIVE]);

        $user = User::create($request->validate([
            'username' => 'required | min:4 | max:100 | string',
            // 'email' => 'required | email | unique:users,email' ,
            // 'mobile' => 'required | numeric | unique:users,mobile' ,
            'email' => 'required | email ' ,
            'mobile' => 'required | numeric ' ,
            
        ]) + ['role'=>'restaurent','status'=>User::STATUS_ACTIVE,'password' => bcrypt($request->all('password')['password'])]);

        UserAddress::create(['user_id'=>$user->id,'address_id'=>$address->id,'status'=>10]);

        $res_cat = '';
            $categories_arr = '';
            foreach ($request->category as $key => $value) {
                $categories_arr .= $value.'|';
            }
            $res_cat = rtrim($categories_arr,'|');

        Restaurent::create($request->validate([
            'name' => 'required | string',
            'website_address' => 'required | string',
            'shop_register_number' => 'required | string',
            'gstn' => 'required | integer' ,
            'fssai' => 'required | integer' ,
            'weekly_off' => 'required | string', 
            'payment_method' => 'required | integer', 
        ]) + ['user_id'=>$user->id,'status'=>User::STATUS_ACTIVE,'category'=>$res_cat,'timing'=>$request->start_time.' - '.$request->end_time]);
        
        return view('restaturent_layout.main',['cities'=>$cities,'categories'=>$categories,'success'=>true]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function areas(Request $request)
    {
        //$this->role();

        //return 'hii';

        $selected = $request->all('selected');
        $models = CityArea::where(['city_id' => $selected['selected']])->get();
        $city_areas = [];
        foreach($models as $model)
        {
            $city_areas[$model->id] = $model->name;
        }

        return json_encode($city_areas);
        
    }

    
}
