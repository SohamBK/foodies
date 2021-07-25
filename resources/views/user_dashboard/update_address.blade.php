@extends('layouts.frontendnav')
@section('content')    

<div class="section section--content">
    <div class="container container--fixed">
        <div class="row">
           <div class="col-lg-3 col-md-4 col-sm-12">
              <span class="overlay overlay--box"></span>
              <div class="box box--bordered box--responsive box--bordered-first">
<div class="box__head">
<h6>Quick Links </h6>
</div>
<div class="box__body">
<div class="nav nav--vertical">
<ul>
  <li class=""><a href="/member">Dashboard</a></li>
  <li class=""><a href="/updatemember">Account</a></li>
  <li class="is--active"><a href="/updateaddress">My Addresses</a></li>
  <li class=""><a href="/member/orders">Orders</a></li>
  <li class=""><a href="/member/favourites">Favourite Orders</a></li>
  <li class=""><a href="/member/favourites-restaurants">Favourite Restaurants</a></li>
  <li class=""><a href="/member/reviews">Reviews</a></li>
  <li class=""><a href="/member/wallet">Wallet</a></li>
  <li class=""><a href="/member/rewards">Reward</a></li>
  <!--li class=""><a href="/member/notifications">Notifications <span  class="notification-count">55</span></a></li-->
</ul>
</div>
</div>
</div>                 </div> 
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="box box--bordered">
                    <div class="box__head">
                        <h6>My Addresses</h6>
                    </div>
                    <div class="box__body space">   
                        <div class="panel__top">
                             <h6 class="panel__title">Addresses Listing</h6>
                             <a href="javascript:void(0)" onclick="form()" class="link link-add-js">Add New Address</a>
                        </div>  
        <div class="panel__body">
          <div class="form-wrap-js">
            <div class="form-wrap" style="display:none;" id="form-tab">
            </div>
          </div>
          <div class="selection-list--container" id="address-list">            <div class="selection  is-active ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    Home					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +18855662214                                <br>
                        <small class="txt--small txt--light">
    122 River St, Austin, Texas</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('39');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','39')">
                Delete                    </a>
                            </div>


    </div>
</div>
        <div class="selection ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    home					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +11234567890                                <br>
                        <small class="txt--small txt--light">
    lexington, Lexington, Kentucky</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('30');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','30')">
                Delete                    </a>
            
                <a href="javascript:void(0)" class="btn btn--small btn--primary" onclick="setAsDefault('30')">
                    Set As Default                        </a>
                                </div>


    </div>
</div>
        <div class="selection ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    home					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +13509945778                                <br>
                        <small class="txt--small txt--light">
    10901 NW 146TH ST
UNIT 8, Miami, Florida</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('27');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','27')">
                Delete                    </a>
            
                <a href="javascript:void(0)" class="btn btn--small btn--primary" onclick="setAsDefault('27')">
                    Set As Default                        </a>
                                </div>


    </div>
</div>
        <div class="selection ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    home					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +14562563636                                <br>
                        <small class="txt--small txt--light">
    home, Charleston, South Carolina</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('15');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','15')">
                Delete                    </a>
            
                <a href="javascript:void(0)" class="btn btn--small btn--primary" onclick="setAsDefault('15')">
                    Set As Default                        </a>
                                </div>


    </div>
</div>
        <div class="selection ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    home					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +14524523232                                <br>
                        <small class="txt--small txt--light">
    home, Waterville, Maine</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('14');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','14')">
                Delete                    </a>
            
                <a href="javascript:void(0)" class="btn btn--small btn--primary" onclick="setAsDefault('14')">
                    Set As Default                        </a>
                                </div>


    </div>
</div>
        <div class="selection ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    office					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +14524523262                                <br>
                        <small class="txt--small txt--light">
    office, Augusta, Maine</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('13');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','13')">
                Delete                    </a>
            
                <a href="javascript:void(0)" class="btn btn--small btn--primary" onclick="setAsDefault('13')">
                    Set As Default                        </a>
                                </div>


    </div>
</div>
        <div class="selection ">
    <div class="selection__col">
        <div class="selection__content">
            <label class="selection__label">
    <h6>
    Office					   </h6>
            </label>

            <p>
                Jason Minaj                            <br>
                    +16858743764                                <br>
                        <small class="txt--small txt--light">
    Kentucky, Bardstown, Kentucky</small></p>
        </div>

        <div class="btn-groups--three">
            <a href="javascript:void(0)" class="btn btn--small btn--black" onclick="form('2');">
                Edit                    </a>
            <a href="javascript:void(0)" class="btn btn--small btn--secondary" onclick="deleteAddress('Do You Want To Delete','2')">
                Delete                    </a>
            
                <a href="javascript:void(0)" class="btn btn--small btn--primary" onclick="setAsDefault('2')">
                    Set As Default                        </a>
                                </div>


    </div>
</div>
            <h5 class="hide-for-myaccount">
<a href="javascript:void(0)" onclick="form()">Add New Address</a></h5>

</div>
         </div>
       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection