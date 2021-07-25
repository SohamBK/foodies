<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\CityArea;
use App\Category;
use App\User;
use App\Restaurent;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

       return view('Frontend.show',['cities'=>$cities,'success'=>false]);
    }

    public function search(Request $request)
    {
        $restarents = Restaurent::where(['restaurents.status'=>10])->leftJoin('user_address','restaurents.user_id','=','user_address.user_id')
        ->leftJoin('addresses','user_address.address_id','=','addresses.id')
        ->where(['addresses.city_id'=>$request->all('city_id')['city_id']])
        ->where(['addresses.area_id'=>$request->all('area_id')['area_id']])
        ->get();

        $restarents_count = Restaurent::where(['restaurents.status'=>10])->leftJoin('user_address','restaurents.user_id','=','user_address.user_id')
        ->leftJoin('addresses','user_address.address_id','=','addresses.id')
        ->where(['addresses.city_id'=>$request->all('city_id')['city_id']])
        ->where(['addresses.area_id'=>$request->all('area_id')['area_id']])
        ->count();
        //dd($restarents_count);
          // dd("hiiii");
        $city = '';
        $area = '';
        if($restarents->count()>0)
        {
            $city = City::find($restarents[0]->user->userAddress->address->city_id)->name;
            $area = CityArea::find($restarents[0]->user->userAddress->address->area_id)->name;
        }
     
        // dd($area);
        return view('restaurants.lists',['restaurents'=>$restarents,'restarents_count'=>$restarents_count,'city_new'=>$city,'area'=>$area]);
    }

    public function searchajax(Request $request)
    {

        $restarents = Restaurent::where(['restaurents.status'=>10])->leftJoin('user_address','restaurents.user_id','=','user_address.user_id')
        ->leftJoin('addresses','user_address.address_id','=','addresses.id')
        ->where(['addresses.city_id'=>$request['selected_city']])
        ->where(['addresses.area_id'=>$request['selected_area']])
        ->get();

        // return json_encode($restarents);

        return view('restaurants.lists',['restaurents'=>$restarents]);
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

    public function restshow(Request $request)
    {
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();
        $categories = Category::where(['status'=>Category::STATUS_ACTIVE])->get();

        return view('restaurants.lists',['cities'=>$cities,'success'=>false]);
    }

    public function dishesshow($id)
    {
        // dd($id);
        return view('restaurants.dishesshow',['id'=>$id]);
    }

    public function addFavourite(Request $request)
    {
        if(\App\Favourite::where(['rest_id'=>$request['id'],'user_id'=>Auth::user()->id])->count() != 1)
        {
            $f = new \App\Favourite();
            $f->rest_id = $request['id'];
            $f->user_id = Auth::user()->id;

            if($f->save())
            {
                return $f->id;
            }
        }
    }

    public function login()
    {
        return view('Frontend.login');
    }

    public function register()
    {
        return view('Frontend.register');
    }

    public function registerUser(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'username' => 'required | min:4 | max:100 | string',
            'email' => 'required | email | unique:users,email' ,
            'mobile' => 'required | numeric | unique:users,mobile' ,
            'password' => 'required | min:6 | max:100', 
        ]);

        $model = User::create($request->validate([
            'username' => 'required | min:4 | max:100 | string',
            'email' => 'required | email | unique:users,email' ,
            'mobile' => 'required | numeric | unique:users,mobile' ,
        ])+ ['role'=>'coustomer','status'=>User::STATUS_ACTIVE,'password' => bcrypt($request->all('password')['password'])]);

        if($model)
        {
            \Session::flash('message', 'User registered successfully !'); 
            \Session::flash('alert-class', 'alert-success');
        }
        return redirect('login');
    }

    public function userAccount()
    {
        return view('Frontend.account');
    }

    public function cart()
    {
        $cities = City::where(['status'=>City::STATUS_ACTIVE])->get();

        $cart = session()->get('cart');

        $cart_product=[];

        if($cart){
            foreach($cart as $k => $v)
            {
                $cart_product[] = \App\Dish::find($k);
            }
        }
        // return $cart;
        return view('cart.show',['cart_product'=>$cart_product,'cart'=>$cart,'cities'=>$cities]);
    }

    public function aboutus()
    {
        return view('Frontend.aboutus');
    }

    public function contactus()
    {
        return view('Frontend.contactus');
    }

    public function member()
    {
        return view('user_dashboard.index');
    }

    public function updatemember()
    {
        $user = Auth::user();
        return view('user_dashboard.update_user_profile',['user'=>$user]);
    }

    public function updateaddress()
    {
        return view('user_dashboard.update_address');
    }

    public function cust(Request $request)
    {
      $dish = \App\Dish::findOrfail($request['dish_id']);
      //return json_encode($dish);
      $custmization = [];
      foreach($dish->customization as $k => $c)
      {
            $custmization[$k]['name'] = $c->name;
            $custmization[$k]['id'] = $c->id;
            foreach($c->CustomizationName as $o)
            {
                $custmization[$k]['option'][$o->id] = $o->name;
                $custmization[$k]['optiop_price'][$o->id] = $o->price;
            }
      }

      return $custmization;
       
    }

    public function useredit(User $user,Request $request)
    {
        return $user;
    }

    public function favoriterest(User $user,Request $request)
    {
        return view('user_dashboard.favoriterest');
    }

}
