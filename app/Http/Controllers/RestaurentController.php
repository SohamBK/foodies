<?php

namespace App\Http\Controllers;

use App\Restaurent;
use Illuminate\Http\Request;
use Gate;
use App\Media;

use App\Address;
use App\User;
use App\UserAddress;
use App\City;
use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class RestaurentController extends Controller
{
    public function role()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Sorry, You can't do this actions");
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blamable()
    {
        Restaurent::creating(function($restaurent){
            $restaurent->created_by = \Auth::id();
        });

        Restaurent::updating(function($restaurent){
            $restaurent->updated_by = \Auth::id();
        });

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $this->role();

        $column = $request->input('column');
        $keyword = $request->input('search');
        $status = $request->input('status');
        $restaurents = Restaurent::latest()->search($column,$keyword,$status)->paginate(10)->appends(['column'=>$column,
        'search'=>$keyword,'status'=>$status]);

        // $category = new Category();
        return view('restaurent.index',['restaurents'=>$restaurents]);
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
     * @param  \App\Restaurent  $restaurent
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurent $restaurent)
    {
        // dd('hiii');
        $this->role();

        return view('restaurent.show',['restaurent'=>$restaurent]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurent  $restaurent
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurent $restaurent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurent  $restaurent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurent $restaurent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurent  $restaurent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurent $restaurent)
    {
        //
    }

    public function rshow(Restaurent $restaurent)
    {
        // dd($restaurent);
        return view ('restaurent.ownershow',['restaurent'=>$restaurent]);
    }

    public function redit($id)
    {
        //dd(Restaurent::findorFail($id));
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();
        $restaurent = Restaurent::findorFail($id);
        $address = $restaurent->user->userAddress->address;
        $user = $restaurent->user;
        // dd($address);
        return view('restaurent.owneredit',['restaurent'=>$restaurent,'cities'=>$cities,'categories'=>$categories,'user'=>$user,'address'=>$address]);
    }

    public function rupdate(Request $request)
    {        
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

        $request->validate([
            'address' => 'required | string',
            'city_id' => 'required | integer' ,
            'area_id' => 'required | integer' ,
            'zip_code' => 'required | integer', 
            'username' => 'required | min:4 | max:100 | string',
            // 'email' => 'required | email | ',Rule::unique('users')->ignore($request->id),
            // 'mobile' => 'required | numeric | ',Rule::unique('users')->ignore($request->id),
            'password' => 'nullable | min:6 | max:100',
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
            'end_time' => 'required '
        ]);

        $address = Address::findOrFail($request->aid);
        $user = User::findOrFail($request->uid);
        $restaurent = Restaurent::findOrFail($request->rid);

        $address->update($request->validate([
            'address' => 'required | string',
            'city_id' => 'required | integer' ,
            'area_id' => 'required | integer' ,
            'zip_code' => 'required | integer', 
        ]) + ['status'=>User::STATUS_ACTIVE]);

        $user->update($request->validate([
            'username' => 'required | min:4 | max:100 | string',
            // 'email' => 'required | email | ',Rule::unique('users')->ignore($request->id),
            // 'mobile' => 'required | numeric | ',Rule::unique('users')->ignore($request->id),
        ]) + ['role'=>'restaurent','status'=>User::STATUS_ACTIVE,'password' => bcrypt($request->all('password')['password'])]);

        // UserAddress::update(['user_id'=>$user->id,'address_id'=>$address->id,'status'=>10]);
        
        // $images = ['kitchen_id','facade_id','dp_id','locality_id'];
        //Handle File Upload
        if($request->hasFile('kitchen_id')){

            //Get filename with the extension
            $filenamewithExt = $request->file('kitchen_id')->getClientOriginalName();
            
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            //Get just filesize
            $filesize = $request->file('kitchen_id')->getClientSize();
            
            //Get just ext
            $extension = $request->file('kitchen_id')->guessClientExtension();
            
            //FileName to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //Upload Image
            $path = $request->file('kitchen_id')->storeAs('public/uploads/',$fileNameToStore);

            if($path)
            {
            //dd('hii');
               $media = new Media;
               $media->alt = $filename;
               $media->file_name = $fileNameToStore;
               $media->file_type = $extension;
               $media->file_size = $filesize;
               $media->status = 10;
               $media->save();
            }
            Restaurent::saving(function($user) use ($media){
                    $user->kitchen_id = $media->id;
                   // $user->update(['media_id' => $media->id]);
            });
        }

        //$category = dd($request->category);
        $res_cat = '';
        //Restaurent::updating(function($category){
            $categories_arr = '';
            //dd($category);
            foreach ($request->category as $key => $value) {
                //dd($value.'');
                $categories_arr .= $value.'|';
            }
            //  dd($categories_arr);
            //$restaurent->category = rtrim($categories_arr,'|');
            $res_cat = rtrim($categories_arr,'|');
           // dd(rtrim($categories_arr,'|'));
        //});
        //dd($res_cat);
        $restaurent->update($request->validate([
            'name' => 'required | string',
            'number_of_outlet' => 'integer' ,
            'website_address' => 'required | string',
            'shop_register_number' => 'required | string',
            'gstn' => 'required | integer' ,
            'fssai' => 'required | integer' ,
            'weekly_off' => 'required | string', 
            'payment_method' => 'required | integer', 
        ]) + ['user_id'=>$user->id,'status'=>User::STATUS_ACTIVE,'category'=>$res_cat,'timing'=>$request->start_time.' - '.$request->end_time]);

        return redirect()->action(
            'RestaurentController@redit', ['id' => $restaurent->id]
        );
        
        // return view('restaturent_layout.main',['cities'=>$cities,'categories'=>$categories,'success'=>true]);
    }

    public function orderrec()
    {
        // dd(\App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id);
        $id = \App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id;
        $orders = \App\Order::where(['rest_id'=>$id])->orderBy('id','desc')->get();

        
        //$orders = \App\Order::where(['rest_id'=>20])->get();

        return view('restaurent.orderres',['orders'=>$orders]);
    }

    public function ordershow($id)
    {
        // dd('hiii');
        $order = \App\Order::find($id);

        return view('restaurent.ordershow',['order'=>$order]);
    }

    public function merchantid(Request $request)
    {
        $id = \App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id;
        // dd($id);

        return view ('restaurent.merchantid');

        // $request->validate([
        //     'merchant_id' => 'required | text',
        //     'secert_key' => 'required | text' ,
        // ]);

    }

    public function merchantupdate(Request $request, Restaurent $restaurent )
    {
        $id = \App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id;
        //dd($request);
        $restaurent = \App\Restaurent::find($id);
        $restaurent->merchant_id = $request['merchant_id'];
        $restaurent->secret_key = $request['secert_key'];
        $restaurent->save();

        return view('restaurent.show',['restaurent'=>$restaurent]);
    }

    public function changestatus(Request $request)
    {
        if($request['id'] && $request['order_status'])
        {
            $model = \App\Order::find($request['id']);
            // return $model;
            $model->status = $request['order_status'];
            if($request['person']) 
            {
                $model->staff_id = $request['person'];
            }
            $model->save();
        }
    }
}
