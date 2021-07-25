@extends('layouts.frontendnav')
@section('content')    
<br>
<br>
<br>
<br>
<div class="section section--profile">  
		<div class="container container--fixed">
			<div class="row row--collapseable">                   
			   <div class="col-lg-6 col-md-12 col-sm-12">
	<div class="box box--tabled">
		<div class="box__left">
      {{-- <div class="avtar avtar--large"><img src="/image/user/16/124/124?s=1553108411" alt=""></div> --}}
      <?php
        $url = url('/storage/uploads/');
        $slash =  '/';
        $file = (Auth::user()->image?Auth::user()->image->file_name:'download.png');
        $furl = $url.''.$slash.''.$file;
      ?>
    <img width="70" height="70" class="img-circle"  src="{{$furl}}" alt="Profile Photo">  
		</div>
		<div class="box__right">
    <span class="item__title">{{Auth::user()->username}}</span><img class="status" src="/images/tick_green.svg" alt="" title="Active"> <br>
						<span class="-gap"></span>
			<span class="-color-primary">{{Auth::user()->mobile}}</span><br>
			<a href="mailto:jason@dummyid.com"><span class="-color-secondary">{{Auth::user()->email}}</span></a><br>
			<a href="/updatemember" class="btn btn--small btn--white">Edit Details</a>
		</div>
	</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4">
	<div class="box box--white">
		<div class="stats stats--first">
			<img src="/images/box_icon_1.svg" style="left:-40px" alt="" class="stats__icon">
			<p> Orders</p>
			<h2>{{\App\Order::where(['user_id'=>Auth::user()->id])->count()}}</h2>
			<a href="#" class="stats__link"></a>
		</div>
	</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4">
	<div class="box box--white">
		<div class="stats stats--second">
			<img src="/images/box_icon_2.svg" alt="" style="left:-20px" class="stats__icon">
			<p>Favourites</p>
			<h2>{{\App\Favourite::where(['user_id'=>Auth::user()->id])->count()}}</h2>
			<a href="#" class=""></a>
		</div>
	</div>
</div>  
{{-- <div class="col-lg-2 col-md-4 col-sm-4">
	<div class="box box--white">
		<div class="stats stats--third">
			<img src="/images/box_icon_3.svg" alt="" style="left:-30px" class="stats__icon">
			<p>Reviews</p>
			<h2>2</h2>
			<a href="/member/reviews" class="stats__link"></a>
		</div>
	</div>
</div> --}}
			</div>
		</div>
  </div>
  
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
            <li class="is--active"><a href="/member">Dashboard</a></li>
            <li class=""><a href="/updatemember">Account</a></li>
            {{-- <li class=""><a href="/member/addresses">My Addresses</a></li> --}}
            {{-- <li class=""><a href="/member/orders">Orders</a></li> --}}
            {{-- <li class=""><a href="/member/favourites">Favourite Orders</a></li>--}}
            <li class=""><a href="/favoriterest">Favourite Restaurants</a></li>
            {{--<li class=""><a href="/member/reviews">Reviews</a></li>
            <li class=""><a href="/member/wallet">Wallet</a></li>
            <li class=""><a href="/member/rewards">Reward</a></li> --}}
            <!--li class=""><a href="/member/notifications">Notifications <span  class="notification-count">55</span></a></li-->
          </ul>
        </div>
    </div>
  </div>			 </div>
          <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="box box--bordered">
              <div class="box__head">
                <h6>Latest Orders</h6>
              </div>
              {{-- {{dd(\App\Order::where(['user_id'=>Auth::user()->id])->get())}} --}}
              <div>
              @foreach((\App\Order::where(['user_id'=>Auth::user()->id])->orderBy('id', 'desc')->get()) as $o)
                {{-- {{dd($o->orderproduct[0]->product->restaurent->name)}} --}}
            </div>
              <div class="box__body space">
                <div class="tabular-data">
                                                         <div class="tabular--grids">
                      <div class="grid first">
                        <div class="lists--inline">
                           <dl>
                            <dt>Order Id</dt>
                           <dd>{{$o->id}}</dd>
                          </dl>
                          <dl>
                            <dt>Restaurant</dt>
                          <dd>{{ $o->orderproduct[0]->product->restaurent?$o->orderproduct[0]->product->restaurent->name:'-' }}</dd>
                          </dl>
                          <dl>
                            <dt>Date</dt>
                          <dd>{{$o->created_at}}</dd>
                          </dl>
                          <dl>
                            <dt>Order Items</dt>
                            <div>
                            <?php 
                                $item_name = '';
                                foreach($o->orderproduct as $op)
                                {
                                  $item_name .= $op->product->name.',  ';
                                }

                            ?>
                            </div>
                          <dd><span class="ordr_itms">{{rtrim($item_name,',  ')}}</span></dd>
                          </dl>
                        </div>
  
                      </div>
                      <div class="grid second">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Status</dt>
                            <dd><span class="label label--warning"><?= $o->status?\App\Order::$status[$o->status]:'' ?></span></dd>
                            <?php if($o->staff_id){ ?>
                            <dt>Delivery Person</dt>
                            <dd><span class="label label--warning"><?= $o->staff_id?$o->staff->first_name.' '.$o->staff->last_name:'' ?></span></dd>
                            
                            <?php } ?>

                            <?php if($o->staff_id){ ?>
                              <dt>Delivery Person Mobile</dt>
                              <dd><span class="label label--warning"><?= $o->staff_id?$o->staff->mobile:'' ?></span></dd>
                              
                              <?php } ?>
                          </dl>
                                                  {{-- <dl>
                            <dt>Delivery Staff</dt>
                            <dd><span class="info--icon"><img alt="" src="images/delivery-man.svg"> </span></dd>
                        
                          </dl> --}}
                                                </div>
  
                      </div>
                      <div class="grid last">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Bill Amount</dt>
                          <dd>Rs. {{$o->price}}</dd>
                          </dl>
                        </div>
                      </div>
                      </div>
                    </div>
                      @endforeach	
                  </div>									
                       {{-- <div class="btn--group">
                                            <a href="javascript:;" onclick="addToFavourite('YYM1552693517')" class="btn btn--secondary btn--small">Add To Favourite</a>
                                              <a href="javascript:;" onclick="reorder('YYM1552693517')" class="btn btn--black btn--small">Reorder</a>
                        <a href="/member/invoice/YYM1552693517" class="btn btn--primary btn--small">View</a>
                      </div> --}}
                    </div>
                                   {{-- <div class="tabular--grids">
                      <div class="grid first">
                        <div class="lists--inline">
                           <dl>
                            <dt>Order Id</dt>
                            <dd>YYM1552456906</dd>
                          </dl>
                          <dl>
                            <dt>Restaurant</dt>
                            <dd>Taj India</dd>
                          </dl>
                          <dl>
                            <dt>Date</dt>
                            <dd>2019-03-13 11:31:46</dd>
                          </dl>
                          <dl>
                            <dt>Order Items</dt>
                            <dd><span class="ordr_itms">Hello</span></dd>
                          </dl>
                        </div>
  
                      </div>
                      <div class="grid second">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Status</dt>
                            <dd><span class="label label--success">Delivered</span></dd>
                          </dl>
                                                  <dl>
                            <dt>Delivery Staff</dt>
                            <dd><span class="info--icon"><img alt="" src="images/delivery-man.svg"> </span></dd>
                        
                          </dl>
                                                </div>
  
                      </div>
                      <div class="grid last">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Bill Amount</dt>
                            <dd>$434.01</dd>
                          </dl>
                        </div>
                        
                      </div>											
                       <div class="btn--group">
                                          <a href="javascript:;" onclick="removeToFavourite('YYM1552456906')" class="btn btn--secondary btn--small">Remove To Favourite</a>
                                            <a href="javascript:;" onclick="reorder('YYM1552456906')" class="btn btn--black btn--small">Reorder</a>
                        <a href="/member/invoice/YYM1552456906" class="btn btn--primary btn--small">View</a>
                      </div>
                    </div>
                                   <div class="tabular--grids">
                      <div class="grid first">
                        <div class="lists--inline">
                           <dl>
                            <dt>Order Id</dt>
                            <dd>YYM1552389407</dd>
                          </dl>
                          <dl>
                            <dt>Restaurant</dt>
                            <dd>Ambience</dd>
                          </dl>
                          <dl>
                            <dt>Date</dt>
                            <dd>2019-03-12 16:46:47</dd>
                          </dl>
                          <dl>
                            <dt>Order Items</dt>
                            <dd><span class="ordr_itms">Chicken noodle soup + Crackers</span></dd>
                          </dl>
                        </div>
  
                      </div>
                      <div class="grid second">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Status</dt>
                            <dd><span class="label label--danger">Cancelled</span></dd>
                          </dl>
                                                  <dl>
                            <dt>Delivery Staff</dt>
                            <dd><span class="info--icon"><img alt="" src="images/delivery-man.svg">David Wills</span></dd>
                        
                          </dl>
                                                </div>
  
                      </div>
                      <div class="grid last">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Bill Amount</dt>
                            <dd>$40.64</dd>
                          </dl>
                        </div>
                        
                      </div>											
                       <div class="btn--group">
                                            <a href="javascript:;" onclick="addToFavourite('YYM1552389407')" class="btn btn--secondary btn--small">Add To Favourite</a>
                                              <a href="javascript:;" onclick="reorder('YYM1552389407')" class="btn btn--black btn--small">Reorder</a>
                        <a href="/member/invoice/YYM1552389407" class="btn btn--primary btn--small">View</a>
                      </div>
                    </div>
                                   <div class="tabular--grids">
                      <div class="grid first">
                        <div class="lists--inline">
                           <dl>
                            <dt>Order Id</dt>
                            <dd>YYM1552372567</dd>
                          </dl>
                          <dl>
                            <dt>Restaurant</dt>
                            <dd>Husk</dd>
                          </dl>
                          <dl>
                            <dt>Date</dt>
                            <dd>2019-03-12 12:06:07</dd>
                          </dl>
                          <dl>
                            <dt>Order Items</dt>
                            <dd><span class="ordr_itms">Funnel Cake</span></dd>
                          </dl>
                        </div>
  
                      </div>
                      <div class="grid second">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Status</dt>
                            <dd><span class="label label--warning">Pending</span></dd>
                          </dl>
                                                </div>
  
                      </div>
                      <div class="grid last">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Bill Amount</dt>
                            <dd>$48.25</dd>
                          </dl>
                        </div>
                        
                      </div>											
                       <div class="btn--group">
                                            <a href="javascript:;" onclick="addToFavourite('YYM1552372567')" class="btn btn--secondary btn--small">Add To Favourite</a>
                                              <a href="javascript:;" onclick="reorder('YYM1552372567')" class="btn btn--black btn--small">Reorder</a>
                        <a href="/member/invoice/YYM1552372567" class="btn btn--primary btn--small">View</a>
                      </div>
                    </div>
                                   <div class="tabular--grids">
                      <div class="grid first">
                        <div class="lists--inline">
                           <dl>
                            <dt>Order Id</dt>
                            <dd>YYM1552355455</dd>
                          </dl>
                          <dl>
                            <dt>Restaurant</dt>
                            <dd>Moonshine Grill</dd>
                          </dl>
                          <dl>
                            <dt>Date</dt>
                            <dd>2019-03-12 07:20:55</dd>
                          </dl>
                          <dl>
                            <dt>Order Items</dt>
                            <dd><span class="ordr_itms">GREEN CHILE MACARONI + SEASONAL FARMER PLATE + NOAH'S MILL</span></dd>
                          </dl>
                        </div>
  
                      </div>
                      <div class="grid second">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Status</dt>
                            <dd><span class="label label--process">In Process</span></dd>
                          </dl>
                                                </div>
  
                      </div>
                      <div class="grid last">
                        <div class="lists--inline lists--inline-block">
                          <dl>
                            <dt>Bill Amount</dt>
                            <dd>$46.42</dd>
                          </dl>
                        </div>
                        
                      </div>											
                       <div class="btn--group">
                                            <a href="javascript:;" onclick="addToFavourite('YYM1552355455')" class="btn btn--secondary btn--small">Add To Favourite</a>
                                              <a href="javascript:;" onclick="reorder('YYM1552355455')" class="btn btn--black btn--small">Reorder</a>
                        <a href="/member/invoice/YYM1552355455" class="btn btn--primary btn--small">View</a>
                      </div>
                    </div>
                     
                 </div>
                                 <span class="-gap"></span> 
                   <a href="/member/orders" class="btn btn--gray btn--small btn--block">View More</a>
                            </div> --}}
            </div> 
          </div>
           {{-- <span class="-gap"></span>  --}}
                                {{-- <div class="box box--bordered">
                    <div class="box__head">
                      <h6>We Are Awaiting Your Reviews For... </h6>
                    </div>
                    <div class="box__body space">
                      
                      <div class="tabular-data">
                                              <div class="tabular--grids">
                          <div class="grid first">
                            <span class="ordr-location">The Aroma Angel</span>
                                                           <ul class="links--inline links--inline-small">
                                                                 <li><a href="/restaurants/lists?cuisines=italian"> Italian </a></li>
                                   
                                                                  <li><a href="/restaurants/lists?cuisines=spanish"> Spanish </a></li>
                                   
                                                                </ul>
                                                       <span class="location">73, Highway City,Fresno</span>
                          </div> --}}
                          {{-- <div class="grid last">
                             <a onclick="addReviewPopup('3')" href="javascript:;" class="btn btn--black btn--small">Review Now</a>
                          </div>
                        </div>
                                              <div class="tabular--grids">
                          <div class="grid first">
                            <span class="ordr-location">Taj India</span>
                                                           <ul class="links--inline links--inline-small">
                                                                 <li><a href="/restaurants/lists?cuisines=indian"> Indian </a></li>
                                   
                                                                  <li><a href="/restaurants/lists?cuisines=chinese"> Chinese </a></li>
                                   
                                                                </ul>
                                                       <span class="location">54 Patchen Dr #21,Lexington</span>
                          </div>
                          <div class="grid last">
                             <a onclick="addReviewPopup('15')" href="javascript:;" class="btn btn--black btn--small">Review Now</a>
                          </div> --}}
                        </div>
                                            </div>
                    </div>
                  </div>
                        </div>
        </div>
      </div>
    </div>

@endsection