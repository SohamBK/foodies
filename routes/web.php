<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::domain('foodies.com')->group(function () {
    Route::get('/', 'FrontendController@show');
    Route::post('/search', 'FrontendController@search');
    Route::post('/searchajax', 'FrontendController@searchajax');
    Route::get('/restaurants', 'FrontendController@restshow');
    Route::get('/dishes/{id}', 'FrontendController@dishesshow');
    Route::get('/login', 'FrontendController@login');
    Route::get('/register', 'FrontendController@register');
    Route::post('/registerUser', 'FrontendController@registerUser');
    Route::get('/useraccount', 'FrontendController@userAccount');
    Route::get('/cart', 'FrontendController@cart');
    Route::get('/about', 'FrontendController@aboutus');
    Route::get('/contactus', 'FrontendController@contactus');
    Route::get('/member', 'FrontendController@member');
    Route::get('/updatemember', 'FrontendController@updatemember');
    Route::get('/updateaddress', 'FrontendController@updateaddress');
    Route::get('/favoriterest', 'FrontendController@favoriterest');
    Route::get('/user/frontend/{user}', 'FrontendController@useredit');
    Route::post('/dish/cust', 'FrontendController@cust');
    Route::post('/order/addcart', 'OrderProductControllerer@addcart');
    Route::get('/placeorder/{flag}', 'OrderProductControllerer@placeorder');
    Route::post('/orderproduct/saveaddress', 'OrderProductControllerer@saveAddress');
    Route::get('/order/{id}', 'OrderProductControllerer@paymentstatus');
    Route::post('/star', 'OrderProductControllerer@starrating');
    Route::post('/favourite', 'FrontendController@addFavourite');

});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/one',function(){
    $url = url('/storage/uploads/');
    $slash =  '/';
    $file = (Auth::user()->image?Auth::user()->image->file_name:'download.png');
    echo $url.''.$slash.''.$file;
});


// Route::get('/tp', function () {
//    // dd(Auth::user()->restaurent());
//    echo Auth::user()->id;
//    if(App\Restaurent::where(['user_id'=>Auth::user()->id])->get()->count()!== 0)
//    {
//         echo "true";
//    }else {
//        echo "false";
//    }
//    dd(App\Restaurent::where(['user_id'=>Auth::user()->id])->get());
//     dd(App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id);
// });

Route::get('/user/create','UserController@create');
Route::get('/user','UserController@index');
Route::get('/user/{user}','UserController@show');
Route::post('/user','UserController@store');
Route::get('/user/{user}/edit','userController@edit');
Route::patch('/user/{user}','userController@update');
Route::delete('/user/{user}','userController@destroy');

Route::resource('city','cityController');

Route::resource('offer','offerController');

Route::resource('email', 'emailController');
Route::post('/email/senders','emailController@senders');

Route::resource('category', 'CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('rest', 'RestaurentRegisterController');
Route::post('/rest/areas','RestaurentRegisterController@areas');
// Route::get('/restaurent/merchantid/{restaurent}','RestaurentRegisterController@merchantid');


Route::get('/restaurent','RestaurentController@index');
Route::get('/restaurent/{restaurent}','RestaurentController@show');

Route::get('/restaurent/owner/{restaurent}','RestaurentController@rshow');
Route::get('/restaurent/owner/{restaurent}/edit','RestaurentController@redit');
Route::post('/restaurent','RestaurentController@rupdate');
Route::get('/order/received','RestaurentController@orderrec');
Route::get('/order/show/{id}','RestaurentController@ordershow');
Route::get('/restaurent/merchantid/{restaurent}','RestaurentController@merchantid');
Route::post('/restaurent/merchantid','RestaurentController@merchantupdate');
Route::post('/changestatus', 'RestaurentController@changeStatus');

Route::resource('dish', 'DishController');

Route::get('customization/{id}/create', 'CustomizationController@create');
Route::post('/customization', 'CustomizationController@store');
Route::post('/customization/optionstore', 'CustomizationController@optionstore');

//subscriptio
Route::get('/subscribe/create', 'SubscriptionController@create');
Route::post('/subscribe', 'SubscriptionController@store');
Route::get('/subscribe','SubscriptionController@show');
Route::get('/subscribe/{subscription}','SubscriptionController@invoice');
Route::get('/subscribe/delete/{subscription}','SubscriptionController@destroy');

Route::resource('deliverystaff','DeliveryStaffController');

//for logout
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

//for Paytm integration
Route::get('plan_registration', 'PlanRegistrationController@register');
Route::post('payment', 'PlanRegistrationController@order');
Route::post('payment/status', 'PlanRegistrationController@paymentCallback');