{{-- {{dd('hiii')}} --}}
<?php
// use Illuminate\Support\Facades\Auth;

// echo "<pre>";
// print_r(Auth::user());
// exit;
$rest_info = App\Restaurent::find($id);
?>

@extends('layouts.frontendnav')
@section('content')   
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script> 

{{-- star ratinf bootstrap --}}
{{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script> --}}
{{-- star ratinf bootstrap --}}
<style>
  .modal-btn{
    padding: 12px;
    height: 33px;
    line-height: 11px;
    background-color: #4ca146;
  }
</style>
<div id="body" class="body">
  <section class="section section--form section--form-mobile section--form-js">
<a href="javascript:void(0)" class="link__close btn--search-js hide--desktop"></a>
<div class="container container--fixed">
  <h5 class="-align-center hide--desktop">Select Location</h5>
  <div class="form form--search form--search-inline location-search"> 
    <form class="form form--search" id="searchLocation" name="locationForm" method="post" action="/restaurants/search-location" onsubmit="searchPopLocation(searchLocationFormValidator, this);return false;" > 
      <ul> 
          <?php  $cities = App\City::where(['status'=>App\City::STATUS_ACTIVE])->get();
          ?>
          <li class="first">
          {{-- <div class="col-md-4" style="">   --}}
              {{-- <div class="form-group"> --}}
                  {{-- <select class="form-control city" name="city_id" required>
                    <option  value="">Select City Here...</option>
                    @foreach($cities as $city)
                      <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                  </select> --}}
              {{-- </div> --}}
            {{-- </div> --}}
          </li>
        {{-- <li class="first"><input id="ajax_city" placeholder="Select City" class="citySearch" title="Select City" data-fatreq="{&quot;required&quot;:true}" type="text" name="ucity" value=""  /></li> --}}

        {{-- <li>
          <select class="form-control cityarea" name="area_id" required>
              <option  value="">Select Location Here...</option>
            </select>
        </li> --}}

        <li class="last">
          <input title="" data-fatreq="{&quot;required&quot;:false}" type="submit" name="submit_btn" value="Find Now"  />						<input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="param" value="{&quot;url&quot;:&quot;restaurant\/menu\/ambience\/6&quot;}"  />						<input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="redirect" value=""  /> 
        </li>  
      </ul>
      <script type="text/javascript">//<![CDATA[
    searchLocationFormValidator_formatting={"errordisplay":3,"summaryElementId":""};searchLocationFormValidator=$("#searchLocation").validation(searchLocationFormValidator_formatting);
    //]]></script> 
    </form>
  </div>
</div>
</section>
  <script>
  var restaurant_id = '6';
  var cart_id = '0';
</script>
<script type="text/javascript">var switchTo5x = true;</script>
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script> 
<script type="text/javascript">stLight.options({publisher: "9b65836b-9483-487a-8124-9dd4c7a7759b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<section class="section section--details">
  <div class="container container--fixed">
      <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-4 col--left">
              <figure class="item__pic item__pic--centerd sign">
                  <?php
                  $url = url('/storage/uploads/');
                  $slash =  '/';
                  $file = ($rest_info->image?$rest_info->image->file_name:'download.png');
                  $furl = $url.''.$slash.''.$file;
              ?>
                <img src="{{$furl}}" alt="{{$rest_info->name}}" title="{{$rest_info->name}}">
                {{-- <img src="/image/restaurant-logo/6/400/400" alt=""></figure> --}}
          </div>
          <div class="col-lg-6 col-md-8 col-sm-8 col--middle">
            <br>
            <br>
            <br>
            <br>
          <span class="item__title item__title--large"><a >{{$rest_info->name}}</span>
                                      <span class="tag tag--large tag--green"></span><span class="tag tag--large tag--red"></span> 
                       
      
              
              <span class="location"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>{{$rest_info->user->userAddress->address->address}}</span>
              <div class="boxes--white">
                  <ul>
                      {{-- <li> --}}
                          {{-- <div class="rating">
                              <a href="javascript:;" onclick="goToReview();" class="rating__link" >
                <div class="Fr-star size-3"  data-rating="4.1"><div class="Fr-star-value" style="width: 82%"></div><div class="Fr-star-bg"></div></div>  
                                  <span class="span">(5  Reviews)</span></a>
                          </div> --}}
                      {{-- </li> --}}
                       

                      {{-- <li>
                                                          <img class="box--icon" >
                                                          {{-- <i style="margin-top:5px;" class="fa fa-cutlery fa-2x" aria-hidden="true"></i> 
                                                          <span class="spantxt">Min. Order<span>$20.00</span></span>
                                                  </li> --}}
                  </ul>
              </div>
              <div class="item__tags">
                  <ul class="links--inline links--inline-icons">
                        
                          <li><i class="fa fa-money " aria-hidden="true"></i> Cash On Delivery</li>
                          <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Online Payment</li>
                                                
                  </ul>
              </div>
             
                      <!-- Restaurant open close code-->
                          
        <span class="closed-time">
          {{-- <span class="redclr ">
          07:00 AM To 11:30 PM (Restaurant Timing)						</span> --}}
        </span>
        
                  
                  
              {{-- <div class="list--info">
                  <ul>
                                                      <li class="active_day">
                                  <span class="head">Monday</span>  
                                   
                                                                                   <span class="txt">07:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                                                              <li >
                                  <span class="head">Tuesday</span>  
                                   
                                                                                   <span class="txt">07:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                                                              <li >
                                  <span class="head">Wednesday</span>  
                                   
                                                                                   <span class="txt">07:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                                                              <li >
                                  <span class="head">Thursday</span>  
                                   
                                                                                   <span class="txt">07:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                                                              <li >
                                  <span class="head">Friday</span>  
                                   
                                                                                   <span class="txt">07:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                                                              <li >
                                  <span class="head">Saturday</span>  
                                   
                                                                                   <span class="txt">07:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                                                              <li >
                                  <span class="head">Sunday</span>  
                                   
                                                                                   <span class="txt">05:00 AM</span> 
                                           <span class="txt txt--light">11:30 PM</span>
                                                                                  
                                
                                 
                              </li>
                              
                  </ul>
              </div> --}}
                      
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 col--last">
              <div class="links--icon">
        <div class="link__group" style="font-size: 20px;padding: 10px;">
                      {{-- <a onclick="markFavouriteRestaurant(this, '6')" href="javascript:void(0);" class="link  " title="Add To Favourite"><span class="fav_un">Add To Favourite</span> --}}
                        Add To Favourite
                        <?php 
                        
                          $style = '';
                          if(Auth::user())
                          {
                            $fav = \App\Favourite::where(['rest_id'=>$rest_info->id,'user_id'=>Auth::user()->id])->count();
                            if($fav == 1)
                            {
                              $style = 'color:red;';
                            }
                          }
                        ?>
                      <span class="icon-new" data-id="{{$rest_info->id}}" style="font-size:30px; margin-left:5px;{{$style}}"> 
                ♥
              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 19 18">
              <path d="M13.639,0A5.377,5.377,0,0,0,9.5,1.944,5.366,5.366,0,0,0,0,5.32c0,2.3,1.38,4.954,4.1,7.9a39.4,39.4,0,0,0,5.022,4.5L9.5,18l0.376-.28a39.4,39.4,0,0,0,5.022-4.5c2.722-2.943,4.1-5.6,4.1-7.9A5.347,5.347,0,0,0,13.639,0Zm0.336,12.377A38.008,38.008,0,0,1,9.5,16.439a38.027,38.027,0,0,1-4.475-4.063C2.557,9.708,1.253,7.268,1.253,5.32a4.111,4.111,0,0,1,7.7-1.973L9.5,4.328l0.548-.981a4.111,4.111,0,0,1,7.7,1.973C17.747,7.268,16.443,9.708,13.975,12.377Z"/></svg> --}}
            </span>   
          </a>
        </div>
        {{-- <div class="link__group">
                      <a class="link link-js" href="javascript:void(0)">Best Deals<i class="fa fa-shopping-bag icon" aria-hidden="true"></i></a>
                      <div class="link__target link__target--even -clearfix link__target-js">
                              <div class="group--data"><p>Already at Best Price</p></div> 
                          
                      </div>
                  </div> --}}
        
                  {{-- <div class="link__group">
                      <a class="link link-js  last" href="javascript:void(0)">Social Share<i class="fa fa-share icon" aria-hidden="true"></i>/a>
                      <div class="link__target link__target-js -clearfix" style="display:none;">
                          <p>Share</p>
                          <ul class="social--share">
                                                          <li><span class='st_sharethis_large' displayText='ShareThis'><img alt="" src="/images/social_7.svg"></span></li>
                              <li><span class='st_facebook_large' displayText='Facebook' st_url="http://demo.yoyumm.com/restaurant/menu/ambience/6" st_title="YoYumm - ambience" st_image ="/image/restaurant-logo/6" st_summary="Best in the market and a well-renowned food hub for all genres."><img alt="" src="/images/social_1.svg"></span></li>

                              <li><span class='st_twitter_large' displayText='Tweet' st_url="http://demo.yoyumm.com/restaurant/menu/ambience/6" st_title="YoYumm - ambience" st_image ="/image/restaurant-logo/6" st_summary="Best in the market and a well-renowned food hub for all genres."><img alt="" src="/images/social_2.svg"></span></li>


                              <li><span class='st_pinterest_large' displayText='Pinterest' st_url="http://demo.yoyumm.com/restaurant/menu/ambience/6" st_title="YoYumm - ambience" st_image ="/image/restaurant-logo/6" st_summary="Best in the market and a well-renowned food hub for all genres."><img alt="" src="/images/social_5.svg"></span></li>

                              <li><span class='st_email_large' displayText='Email' st_url="http://demo.yoyumm.com/restaurant/menu/ambience/6" st_title="YoYumm - ambience" st_image ="/image/restaurant-logo/6" st_summary="Best in the market and a well-renowned food hub for all genres."><img alt="" src="/images/social_6.svg"></span></li>
                          </ul>
                      </div>
                  </div> --}}
                  
              </div>
          </div>
      </div>
  </div>
</section> 
<script type="text/javascript">
  var restaurant_id = '6';  
function copyToClipboard(elementId) {
var aux = document.createElement("input");
aux.setAttribute("value", document.getElementById(elementId).innerHTML);
document.body.appendChild(aux);
aux.select();
document.execCommand("copy");
document.body.removeChild(aux);
}
</script> 		<section class="section section--tabs">
    <div class="container container--fixed">
      <div class="tabs tabs--flat tabs--scroll">
        <ul>
          <li class="is--active"><a href="#section--menu" class="scroll">Menu</a></li>
          <li><a href="#section--info" class="scroll">Info</a></li>
          <li><a href="#section--reviews" id="revi" class="scroll revi">Reviews</a></li>
        </ul>
      </div>
    </div>
  </section>
  {{-- <section class="section section--content section--content-even"  id="menu-items"> 
  </section>  --}}
</div> 

<section class="section section--content section--content-even" id="menu-items"> 
  <div class="container container--fixed" style="position:static;">
      <div class="row">
          <div class="col-lg-9 col-md-8 col-sm-12" style="position:static;">
              <div class="panel">
                  <aside class="panel__left">
                      <div class="panel__fixed" data-offset="100" style="">
                          <div class="panel__fixed-inner">
               
                              <h5 class="link--nav link--nav-first"><a href="#section--menu" class="scroll is--active">Menu</a></h5>
                              <div class="nav nav--vertical nav--scrollable"> 
                                                                      {{-- <ul style="display:block" class="js-menu-group" id="menu-group-1">
                                                                                      <li class="active" data-menu-group="1" data-menu-key="1">
                          <a href="#menu-items-1-rest_1" class="scroll is--active">
                            Soup												</a>
                        </li>
                                               
                                      </ul> --}}
                                                                      {{-- <ul style="display:none" class="js-menu-group" id="menu-group-2">
                                                                                      <li class="active" data-menu-group="2" data-menu-key="2">
                          <a href="#menu-items-2-rest_2" class="scroll">
                            Starters Veg.												</a>
                        </li>
                                                                                          <li data-menu-group="1" data-menu-key="2">
                          <a href="#menu-items-2-rest_1" class="scroll">
                            Soup												</a>
                        </li>
                                               
                                      </ul> --}}
                                                                      {{-- <ul style="display:none" class="js-menu-group" id="menu-group-3">
                                                                                      <li class="active" data-menu-group="3" data-menu-key="3">
                          <a href="#menu-items-3-rest_3" class="scroll">
                            Mexican Main Course												</a>
                        </li>
                                                                                          <li data-menu-group="1" data-menu-key="3">
                          <a href="#menu-items-3-rest_1" class="scroll">
                            Soup												</a>
                        </li>
                                               
                                      </ul> --}}
                                                                      {{-- <ul style="display:none" class="js-menu-group" id="menu-group-4">
                                                                                      <li class="active" data-menu-group="1" data-menu-key="4">
                          <a href="#menu-items-4-rest_1" class="scroll">
                            Soup												</a>
                        </li>
                                               
                                      </ul> --}}
                                                                      {{-- <ul style="display:none" class="js-menu-group" id="menu-group-5">
                                                                                      <li class="active" data-menu-group="5" data-menu-key="5">
                          <a href="#menu-items-5-rest_5" class="scroll">
                            Snacks												</a>
                        </li>
                                                                                          <li data-menu-group="4" data-menu-key="5">
                          <a href="#menu-items-5-rest_4" class="scroll">
                            Breads												</a>
                        </li>
                                                                                          <li data-menu-group="1" data-menu-key="5">
                          <a href="#menu-items-5-rest_1" class="scroll">
                            Soup												</a>
                        </li>
                                               
                                      </ul> --}}
                                   
                              </div>
                              <h5 class="link--nav"><a href="#section--info" class="scroll">Info</a></h5>
                              <h5 class="link--nav"><a href="#section--reviews" class="scroll">Reviews</a></h5>
                          </div>
                      </div>
                  </aside>
                  <aside class="panel__right">
           
               
            <div class="panel__fixed" data-offset="74" style="">
              <div class="panel__fixed-inner">
                 <div class="tabs--floated">
                    <ul>
                        <li class="is--active menu_sel" id="sel_menu_1"><a href="javascript:void(0)" onclick="showMenusItems(1, this);">All Menu</a></li>
                        <?php $restaurant = App\Restaurent::find($id);
                              $categories = explode('|',$restaurant->category);
                        ?>
                        {{-- {{dd($restaurant)}} --}}
                        @foreach($categories as $k => $v)
                    <li class=" menu_sel" id="sel_menu_{{($k+2)}}"><a href="javascript:void(0)" onclick="showMenusItems({{$k+2}}, this);">{{App\Category::find($v)->name}}</a></li>
                        @endforeach
                        {{-- <li class=" menu_sel" id="sel_menu_2"><a href="javascript:void(0)" onclick="showMenusItems(2, this);">Lunch</a></li>
                        <li class=" menu_sel" id="sel_menu_3"><a href="javascript:void(0)" onclick="showMenusItems(3, this);">Dinner</a></li>
                        <li class=" menu_sel" id="sel_menu_4"><a href="javascript:void(0)" onclick="showMenusItems(4, this);">Snacks</a></li>
                        <li class=" menu_sel" id="sel_menu_5"><a href="javascript:void(0)" onclick="showMenusItems(5, this);">All Time Menu</a></li> --}}
                    </ul>
                  </div>
                </div>
             </div>
                      <div class="wrap--bordered">
                          <div id="section--menu">  
                              <div class="box js-menu-detail menu-items-1 active" style="display:block" id="1">							 
                                     <!-- first time -->
                                  <?php

                                    $dishes = App\Dish::where(['restaurent_id'=>$id])->get();
                                    // echo "<pre>";
                                    // print_r($dishes);
                                    // exit;
                                  ?>
                                  @foreach($dishes as $d)
                                  <div id="menu-items-1-rest_1">
                                      <div class="box__body ">
                                          <div class="list-repeated">
                                            <div class="cell cell--first">
                                            <div class="menu_img">
                                            <img alt="Chestnut bisque" src="{{asset('/storage/uploads/'.$d->image->file_name)}}" title="Chestnut bisque">
                                            </div>
                                          <span class="item__title">{{$d->name}}</span> 
                                          <span class="tag tag--{{ $d->dish_for==1?'green':'red'}}"></span>
                                          <p class="txt--light txt--small">{{$d->description}}</p>
                                              </div>                         
                                          <div class="cell cell--last ">
                                            <div class="counter--group">
                                            <span class="item__price">Rs. {{$d->price}}</span>
                                              {{-- <a class="counter__link counter__link--add modal-btn" href="javascript:void(0)" for="modal-toggle" data-toggle="modal" data-target="#exampleModal" data-id={{$d->id}} data-name="{{$d->name}}" data-price={{$d->price}}>+</a> --}}
                                              <label class="modal-btn btn btn-primary btn-xs " for="modal-toggle" data-id={{$d->id}} data-name="{{$d->name}}" data-price={{$d->price}}>+</label> 
                                              
                                            </div>
                                          </div>
                                        </div>                                                               </div>
                                     </div>	
                                     @endforeach
                                     <!-- first time end -->
                                     <!-- second time -->

                                     
                                  <!--<div id="menu-items-1-rest_1">
                                    {{-- <div class="box__head"><h6>Soup</h6></div>	 --}}
                                      <div class="box__body ">
                                          <div class="list-repeated">
                                            <div class="cell cell--first">
                                            <div class="menu_img">
                                              <img alt="Chestnut bisque" src="/image/product/2/100/100" title="Chestnut bisque">
                                            </div>
                                            <span class="item__title">Chestnut Bisque</span>                  <span class="tag tag--green"></span>
                                               <p class="txt--light txt--small">Bisque</p>
                                              </div>                         
                                          <div class="cell cell--last ">
                                            <div class="counter--group">
                                              <span class="item__price">$4.00</span>
                                              <a class="counter__link counter__link--add" href="javascript:void(0)" onclick="showMenu(2,1,1,6,0);">+</a>
                                            </div>
                                          </div>
                                        </div>                                                               </div>
                                     </div>	-->


                                     <!-- second time end -->
                                     </div>
                                  {{-- </div> --}}
                                  <!-- second is here -->
                                  <?php $restaurant = App\Restaurent::find($id);
                                          $categories = explode('|',$restaurant->category);
                                    ?>
                                  @foreach($categories as $k => $v)
                                  <?php  
                                  // $dishes = App\Dish::where(['dishes.restaurent_id'=>$id])->leftJoin('dish_categories','dishes.id','=','dish_categories.dish_id')->where(['dish_categories.categories_id'=>$v])->get();
                                  $dishes = App\Dish::where(['restaurent_id'=>$id])->get();
                                   ?>
                                  <div class="box js-menu-detail menu-items-{{($k+2)}}" style="display:none" id="1">	
                                    @foreach($dishes as $d)
                                    @if($d->dishCategory->categories_id == $v)	
                                    <div id="menu-items-2-rest_2">
                                      {{-- <div class="box__head"><h6>Starters Veg.</h6></div>	 --}}
                                      <div class="box__body ">
                                          <div class="list-repeated">
                                              <div class="cell cell--first">
                                      <div class="menu_img">
                                        <img alt="Roasted Garlic crostini" src="{{asset('/storage/uploads/'.$d->image->file_name)}}" title="Roasted Garlic crostini">
                                      </div>
                                      <span class="item__title">{{$d->name}}</span>   
                                          <span class="tag tag--{{ $d->dish_for==1?'green':'red'}}"></span>
                                          <p class="txt--light txt--small">{{$d->description}}</p>
                                       </div>                             
                                          <div class="cell cell--last ">
                                            <div class="counter--group">
                                              <span class="item__price">Rs. {{$d->price}}</span>
                                              {{-- <a class="counter__link counter__link--add" href="javascript:void(0)" onclick="showMenu(15,2,2,6,0);">+</a> --}}
                                              <label class="modal-btn btn btn-primary btn-xs " for="modal-toggle" data-id={{$d->id}} data-name="{{$d->name}}" data-price={{$d->price}}>+</label> 
                                            </div>
                                          </div>
                                        </div> 
                                      </div>
                                    </div>
                                    @endif
                                    @endforeach
                                  </div>
                                  @endforeach
                                {{-- {{-- </div> --}}
                              </div>  
  
                                          
                          </div> 
                          <div id="section--info">
                              <div class="box">
                                  {{-- <div class="box__head"><h6>About</h6></div> --}}
                                   
                                  <div class="box__body">
                                      <div class="map-view">
                                          {{-- <div class="map-content">
                                              <h6>Ambience</h6>
                                              <p>Waymarket, Treyner road, 1247</p>
                                              <a itemprop="url" class="direction-link" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=38.320732127,-85.8213570984&amp;hl=en"> Get Directions</a>
                                          </div> --}}
                                          {{-- <div id="mapCanvas" style="width: 100%; height: 400px; position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -45, -55);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -45, -55);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: -256px;"></div></div></div><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -14px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -45, -55);"><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4285!3i6300!4i256!2m3!1e0!2sm!3i455164762!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=13523" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4286!3i6301!4i256!2m3!1e0!2sm!3i455164762!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=13578" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4284!3i6301!4i256!2m3!1e0!2sm!3i455164738!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=101280" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4284!3i6300!4i256!2m3!1e0!2sm!3i455164402!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=122405" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4285!3i6301!4i256!2m3!1e0!2sm!3i455164762!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=31864" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4287!3i6300!4i256!2m3!1e0!2sm!3i455164762!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=108022" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4286!3i6300!4i256!2m3!1e0!2sm!3i455164762!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=126308" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4287!3i6301!4i256!2m3!1e0!2sm!3i455164762!3m9!2sen-IN!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8&amp;token=126363" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; opacity: 0; left: -14px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" usemap="#gmimap0" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map name="gmimap0" id="gmimap0"><area log="miw" coords="13.5,0,4,3.75,0,13.5,13.5,43,27,13.5,23,3.75" shape="poly" title="Waymarket, Treyner road" style="cursor: pointer; touch-action: none;"></map></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe aria-hidden="true" frameborder="0" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;" src="about:blank"></iframe><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=38.320732,-85.821357&amp;z=14&amp;t=m&amp;hl=en-IN&amp;gl=US&amp;mapclient=apiv3" title="Open this area in Google Maps (opens a new window)" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 196px; top: 110px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2019 Google</div><button draggable="false" title="Close" aria-label="Close" type="button" class="gm-ui-hover-effect" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;"></button></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 172px; bottom: 0px; width: 130px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2019 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2019 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 96px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-IN_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@38.3207321,-85.8213571,14z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="40" controlheight="153" style="margin: 10px; user-select: none; position: absolute; bottom: 167px; right: 40px;"><div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 72px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button></div></div><div class="gm-svpc" dir="ltr" title="Drag Pegman onto the map to open Street View" controlwidth="40" controlheight="40" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none; position: absolute; left: 0px; top: 0px;"><div style="position: absolute; left: 50%; top: 50%;"></div><div style="position: absolute; left: 50%; top: 50%;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2223%22%20height%3D%2238%22%20viewBox%3D%220%200%2023%2038%22%3E%0A%3Cpath%20d%3D%22M16.6%2C38.1h-5.5l-0.2-2.9-0.2%2C2.9h-5.5L5%2C25.3l-0.8%2C2a1.53%2C1.53%2C0%2C0%2C1-1.9.9l-1.2-.4a1.58%2C1.58%2C0%2C0%2C1-1-1.9v-0.1c0.3-.9%2C3.1-11.2%2C3.1-11.2a2.66%2C2.66%2C0%2C0%2C1%2C2.3-2l0.6-.5a6.93%2C6.93%2C0%2C0%2C1%2C4.7-12%2C6.8%2C6.8%2C0%2C0%2C1%2C4.9%2C2%2C7%2C7%2C0%2C0%2C1%2C2%2C4.9%2C6.65%2C6.65%2C0%2C0%2C1-2.2%2C5l0.7%2C0.5a2.78%2C2.78%2C0%2C0%2C1%2C2.4%2C2s2.9%2C11.2%2C2.9%2C11.3a1.53%2C1.53%2C0%2C0%2C1-.9%2C1.9l-1.3.4a1.63%2C1.63%2C0%2C0%2C1-1.9-.9l-0.7-1.8-0.1%2C12.7h0Zm-3.6-2h1.7L14.9%2C20.3l1.9-.3%2C2.4%2C6.3%2C0.3-.1c-0.2-.8-0.8-3.2-2.8-10.9a0.63%2C0.63%2C0%2C0%2C0-.6-0.5h-0.6l-1.1-.9h-1.9l-0.3-2a4.83%2C4.83%2C0%2C0%2C0%2C3.5-4.7A4.78%2C4.78%200%200%2C0%2011%202.3H10.8a4.9%2C4.9%2C0%2C0%2C0-1.4%2C9.6l-0.3%2C2h-1.9l-1%2C.9h-0.6a0.74%2C0.74%2C0%2C0%2C0-.6.5c-2%2C7.5-2.7%2C10-3%2C10.9l0.3%2C0.1%2C2.5-6.3%2C1.9%2C0.3%2C0.2%2C15.8h1.6l0.6-8.4a1.52%2C1.52%2C0%2C0%2C1%2C1.5-1.4%2C1.5%2C1.5%2C0%2C0%2C1%2C1.5%2C1.4l0.9%2C8.4h0Zm-10.9-9.6h0Zm17.5-.1h0Z%22%20style%3D%22fill%3A%23333%3Bopacity%3A0.7%3Bisolation%3Aisolate%22%2F%3E%0A%3Cpath%20d%3D%22M5.9%2C13.6l1.1-.9h7.8l1.2%2C0.9%22%20style%3D%22fill%3A%23ce592c%22%2F%3E%0A%3Cellipse%20cx%3D%2210.9%22%20cy%3D%2213.1%22%20rx%3D%222.7%22%20ry%3D%220.3%22%20style%3D%22fill%3A%23ce592c%3Bopacity%3A0.5%3Bisolation%3Aisolate%22%2F%3E%0A%3Cpath%20d%3D%22M20.6%2C26.1l-2.9-11.3a1.71%2C1.71%2C0%2C0%2C0-1.6-1.2H5.7a1.69%2C1.69%2C0%2C0%2C0-1.5%2C1.3l-3.1%2C11.3a0.61%2C0.61%2C0%2C0%2C0%2C.3.7l1.1%2C0.4a0.61%2C0.61%2C0%2C0%2C0%2C.7-0.3l2.7-6.7%2C0.2%2C16.8h3.6l0.6-9.3a0.47%2C0.47%2C0%2C0%2C1%2C.44-0.5h0.06c0.4%2C0%2C.4.2%2C0.5%2C0.5l0.6%2C9.3h3.6L15.7%2C20.3l2.5%2C6.6a0.52%2C0.52%2C0%2C0%2C0%2C.66.31h0l1.2-.4a0.57%2C0.57%2C0%2C0%2C0%2C.5-0.7h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%2F%3E%0A%3Cpath%20d%3D%22M7%2C13.6l3.9%2C6.7%2C3.9-6.7%22%20style%3D%22fill%3A%23cf572e%3Bopacity%3A0.6%3Bisolation%3Aisolate%22%2F%3E%0A%3Ccircle%20cx%3D%2210.9%22%20cy%3D%227%22%20r%3D%225.9%22%20style%3D%22fill%3A%23fdbf2d%22%2F%3E%0A%3C%2Fsvg%3E%0A" aria-label="Street View Pegman Control" style="height: 30px; width: 30px; position: absolute; transform: translate(-50%, -50%); pointer-events: none;"><img src="data:image/svg+xml,%3Csvg%20width%3D%2224px%22%20height%3D%2238px%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20viewBox%3D%220%200%2024%2038%22%3E%0A%3Cpath%20d%3D%22M22%2C26.6l-2.9-11.3a2.78%2C2.78%2C0%2C0%2C0-2.4-2l-0.7-.5a6.82%2C6.82%2C0%2C0%2C0%2C2.2-5%2C6.9%2C6.9%2C0%2C0%2C0-13.8%2C0%2C7%2C7%2C0%2C0%2C0%2C2.2%2C5.1l-0.6.5a2.55%2C2.55%2C0%2C0%2C0-2.3%2C2s-3%2C11.1-3%2C11.2v0.1a1.58%2C1.58%2C0%2C0%2C0%2C1%2C1.9l1.2%2C0.4a1.63%2C1.63%2C0%2C0%2C0%2C1.9-.9l0.8-2%2C0.2%2C12.8h11.3l0.2-12.6%2C0.7%2C1.8a1.54%2C1.54%2C0%2C0%2C0%2C1.5%2C1%2C1.09%2C1.09%2C0%2C0%2C0%2C.5-0.1l1.3-.4a1.85%2C1.85%2C0%2C0%2C0%2C.7-2h0Zm-1.2.9-1.2.4a0.61%2C0.61%2C0%2C0%2C1-.7-0.3l-2.5-6.6-0.2%2C16.8h-9.4L6.6%2C21l-2.7%2C6.7a0.52%2C0.52%2C0%2C0%2C1-.66.31h0l-1.1-.4a0.52%2C0.52%2C0%2C0%2C1-.31-0.66v0l3.1-11.3a1.69%2C1.69%2C0%2C0%2C1%2C1.5-1.3h0.2l1-.9h2.3a5.9%2C5.9%2C0%2C1%2C1%2C3.2%2C0h2.3l1.1%2C0.9h0.2a1.71%2C1.71%2C0%2C0%2C1%2C1.6%2C1.2l2.9%2C11.3a0.84%2C0.84%2C0%2C0%2C1-.4.7h0Z%22%20style%3D%22fill%3A%23333%3Bfill-opacity%3A0.2%22%2F%3E%22%0A%3C%2Fsvg%3E%0A%0A" aria-label="Pegman is on top of the Map" style="display: none; height: 30px; width: 30px; position: absolute; transform: translate(-50%, -50%); pointer-events: none;"><img src="data:image/svg+xml,%3Csvg%20width%3D%2240px%22%20height%3D%2250px%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20viewBox%3D%220%200%2040%2050%22%3E%0A%3Cpath%20d%3D%22M34.00%2C-30.40l-2.9-11.3a2.78%2C2.78%2C0%2C0%2C0-2.4-2l-0.7-.5a6.82%2C6.82%2C0%2C0%2C0%2C2.2-5%2C6.9%2C6.9%2C0%2C0%2C0-13.8%2C0%2C7%2C7%2C0%2C0%2C0%2C2.2%2C5.1l-0.6.5a2.55%2C2.55%2C0%2C0%2C0-2.3%2C2s-3%2C11.1-3%2C11.2v0.1a1.58%2C1.58%2C0%2C0%2C0%2C1%2C1.9l1.2%2C0.4a1.63%2C1.63%2C0%2C0%2C0%2C1.9-.9l0.8-2%2C0.2%2C12.8h11.3l0.2-12.6%2C0.7%2C1.8a1.54%2C1.54%2C0%2C0%2C0%2C1.5%2C1%2C1.09%2C1.09%2C0%2C0%2C0%2C.5-0.1l1.3-.4a1.85%2C1.85%2C0%2C0%2C0%2C.7-2h0Zm-1.2.9-1.2.4a0.61%2C0.61%2C0%2C0%2C1-.7-0.3l-2.5-6.6-0.2%2C16.8h-9.4L18.60%2C-36.00l-2.7%2C6.7a0.52%2C0.52%2C0%2C0%2C1-.66.31h0l-1.1-.4a0.52%2C0.52%2C0%2C0%2C1-.31-0.66v0l3.1-11.3a1.69%2C1.69%2C0%2C0%2C1%2C1.5-1.3h0.2l1-.9h2.3a5.9%2C5.9%2C0%2C1%2C1%2C3.2%2C0h2.3l1.1%2C0.9h0.2a1.71%2C1.71%2C0%2C0%2C1%2C1.6%2C1.2l2.9%2C11.3a0.84%2C0.84%2C0%2C0%2C1-.4.7h0Zm1.2%2C59.1-2.9-11.3a2.78%2C2.78%2C0%2C0%2C0-2.4-2l-0.7-.5a6.82%2C6.82%2C0%2C0%2C0%2C2.2-5%2C6.9%2C6.9%2C0%2C0%2C0-13.8%2C0%2C7%2C7%2C0%2C0%2C0%2C2.2%2C5.1l-0.6.5a2.55%2C2.55%2C0%2C0%2C0-2.3%2C2s-3%2C11.1-3%2C11.2v0.1a1.58%2C1.58%2C0%2C0%2C0%2C1%2C1.9l1.2%2C0.4a1.63%2C1.63%2C0%2C0%2C0%2C1.9-.9l0.8-2%2C0.2%2C12.8h11.3l0.2-12.6%2C0.7%2C1.8a1.54%2C1.54%2C0%2C0%2C0%2C1.5%2C1%2C1.09%2C1.09%2C0%2C0%2C0%2C.5-0.1l1.3-.4a1.85%2C1.85%2C0%2C0%2C0%2C.7-2h0Zm-1.2.9-1.2.4a0.61%2C0.61%2C0%2C0%2C1-.7-0.3l-2.5-6.6-0.2%2C16.8h-9.4L18.60%2C24.00l-2.7%2C6.7a0.52%2C0.52%2C0%2C0%2C1-.66.31h0l-1.1-.4a0.52%2C0.52%2C0%2C0%2C1-.31-0.66v0l3.1-11.3a1.69%2C1.69%2C0%2C0%2C1%2C1.5-1.3h0.2l1-.9h2.3a5.9%2C5.9%2C0%2C1%2C1%2C3.2%2C0h2.3l1.1%2C0.9h0.2a1.71%2C1.71%2C0%2C0%2C1%2C1.6%2C1.2l2.9%2C11.3a0.84%2C0.84%2C0%2C0%2C1-.4.7h0Z%22%20style%3D%22fill%3A%23333%3Bfill-opacity%3A0.2%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M15.40%2C38.80h-4a1.64%2C1.64%2C0%2C0%2C1-1.4-1.1l-3.1-8a0.9%2C0.9%2C0%2C0%2C1-.5.1l-1.4.1a1.62%2C1.62%2C0%2C0%2C1-1.6-1.4l-1.1-13.1%2C1.6-1.3a6.87%2C6.87%2C0%2C0%2C1-3-4.6A7.14%2C7.14%200%200%2C1%202%204a7.6%2C7.6%2C0%2C0%2C1%2C4.7-3.1%2C7.14%2C7.14%2C0%2C0%2C1%2C5.5%2C1.1%2C7.28%2C7.28%2C0%2C0%2C1%2C2.3%2C9.6l2.1-.1%2C0.1%2C1c0%2C0.2.1%2C0.5%2C0.1%2C0.8a2.41%2C2.41%2C0%2C0%2C1%2C1%2C1s1.9%2C3.2%2C2.8%2C4.9c0.7%2C1.2%2C2.1%2C4.2%2C2.8%2C5.9a2.1%2C2.1%2C0%2C0%2C1-.8%2C2.6l-0.6.4a1.63%2C1.63%2C0%2C0%2C1-1.5.2l-0.6-.3a8.93%2C8.93%2C0%2C0%2C0%2C.5%2C1.3%2C7.91%2C7.91%2C0%2C0%2C0%2C1.8%2C2.6l0.6%2C0.3v4.6l-4.5-.1a7.32%2C7.32%2C0%2C0%2C1-2.5-1.5l-0.4%2C3.6h0Zm-10-19.2%2C3.5%2C9.8%2C2.9%2C7.5h1.6V35l-1.9-9.4%2C3.1%2C5.4a8.24%2C8.24%2C0%2C0%2C0%2C3.8%2C3.8h2.1v-1.4a14%2C14%2C0%2C0%2C1-2.2-3.1%2C44.55%2C44.55%2C0%2C0%2C1-2.2-8l-1.3-6.3%2C3.2%2C5.6c0.6%2C1.1%2C2.1%2C3.6%2C2.8%2C4.9l0.6-.4c-0.8-1.6-2.1-4.6-2.8-5.8-0.9-1.7-2.8-4.9-2.8-4.9a0.54%2C0.54%2C0%2C0%2C0-.4-0.3l-0.7-.1-0.1-.7a4.33%2C4.33%2C0%2C0%2C0-.1-0.5l-5.3.3%2C2.2-1.9a4.3%2C4.3%2C0%2C0%2C0%2C.9-1%2C5.17%2C5.17%2C0%2C0%2C0%2C.8-4%2C5.67%2C5.67%2C0%2C0%2C0-2.2-3.4%2C5.09%2C5.09%2C0%2C0%2C0-4-.8%2C5.67%2C5.67%2C0%2C0%2C0-3.4%2C2.2%2C5.17%2C5.17%2C0%2C0%2C0-.8%2C4%2C5.67%2C5.67%2C0%2C0%2C0%2C2.2%2C3.4%2C3.13%2C3.13%2C0%2C0%2C0%2C1%2C.5l1.6%2C0.6-3.2%2C2.6%2C1%2C11.5h0.4l-0.3-8.2h0Z%22%20style%3D%22fill%3A%23333%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M3.35%2C15.90l1.1%2C12.5a0.39%2C0.39%2C0%2C0%2C0%2C.36.42l0.14%2C0%2C1.4-.1a0.66%2C0.66%2C0%2C0%2C0%2C.5-0.4l-0.2-3.8-3.3-8.6h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M5.20%2C28.80l1.1-.1a0.66%2C0.66%2C0%2C0%2C0%2C.5-0.4l-0.2-3.8-1.2-3.1Z%22%20style%3D%22fill%3A%23ce592b%3Bfill-opacity%3A0.25%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M21.40%2C35.70l-3.8-1.2-2.7-7.8L12.00%2C15.5l3.4-2.9c0.2%2C2.4%2C2.2%2C14.1%2C3.7%2C17.1%2C0%2C0%2C1.3%2C2.6%2C2.3%2C3.1v2.9m-8.4-8.1-2-.3%2C2.5%2C10.1%2C0.9%2C0.4v-2.9%22%20style%3D%22fill%3A%23e5892b%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M17.80%2C25.40c-0.4-1.5-.7-3.1-1.1-4.8-0.1-.4-0.1-0.7-0.2-1.1l-1.1-2-1.7-1.6s0.9%2C5%2C2.4%2C7.1a19.12%2C19.12%2C0%2C0%2C0%2C1.7%2C2.4h0Z%22%20style%3D%22fill%3A%23cf572e%3Bopacity%3A0.6%3Bisolation%3Aisolate%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M14.40%2C37.80h-3a0.43%2C0.43%2C0%2C0%2C1-.4-0.4l-3-7.8-1.7-4.8-3-9%2C8.9-.4s2.9%2C11.3%2C4.3%2C14.4c1.9%2C4.1%2C3.1%2C4.7%2C5%2C5.8h-3.2s-4.1-1.2-5.9-7.7a0.59%2C0.59%2C0%2C0%2C0-.6-0.4%2C0.62%2C0.62%2C0%2C0%2C0-.3.7s0.5%2C2.4.9%2C3.6a34.87%2C34.87%2C0%2C0%2C0%2C2%2C6h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M15.40%2C12.70l-3.3%2C2.9-8.9.4%2C3.3-2.7%22%20style%3D%22fill%3A%23ce592b%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M9.10%2C21.10l1.4-6.2-5.9.5%22%20style%3D%22fill%3A%23cf572e%3Bopacity%3A0.6%3Bisolation%3Aisolate%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M12.00%2C13.5a4.75%2C4.75%2C0%2C0%2C1-2.6%2C1.1c-1.5.3-2.9%2C0.2-2.9%2C0s1.1-.6%2C2.7-1%22%20style%3D%22fill%3A%23bb3d19%22%3E%3C%2Fpath%3E%0A%3Ccircle%20cx%3D%227.92%22%20cy%3D%228.19%22%20r%3D%226.3%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fcircle%3E%0A%3Cpath%20d%3D%22M4.70%2C13.60a6.21%2C6.21%2C0%2C0%2C0%2C8.4-1.9v-0.1a8.89%2C8.89%2C0%2C0%2C1-8.4%2C2h0Z%22%20style%3D%22fill%3A%23ce592b%3Bfill-opacity%3A0.25%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M21.20%2C27.20l0.6-.4a1.09%2C1.09%2C0%2C0%2C0%2C.4-1.3c-0.7-1.5-2.1-4.6-2.8-5.8-0.9-1.7-2.8-4.9-2.8-4.9a1.6%2C1.6%2C0%2C0%2C0-2.17-.65l-0.23.15a1.68%2C1.68%2C0%2C0%2C0-.4%2C2.1s2.3%2C3.9%2C3.1%2C5.3c0.6%2C1%2C2.1%2C3.7%2C2.9%2C5.1a0.94%2C0.94%2C0%2C0%2C0%2C1.24.49l0.16-.09h0Z%22%20style%3D%22fill%3A%23fdbf2d%22%3E%3C%2Fpath%3E%0A%3Cpath%20d%3D%22M19.40%2C19.80c-0.9-1.7-2.8-4.9-2.8-4.9a1.6%2C1.6%2C0%2C0%2C0-2.17-.65l-0.23.15-0.3.3c1.1%2C1.5%2C2.9%2C3.8%2C3.9%2C5.4%2C1.1%2C1.8%2C2.9%2C5%2C3.8%2C6.7l0.1-.1a1.09%2C1.09%2C0%2C0%2C0%2C.4-1.3%2C57.67%2C57.67%2C0%2C0%2C0-2.7-5.6h0Z%22%20style%3D%22fill%3A%23ce592b%3Bfill-opacity%3A0.25%22%3E%3C%2Fpath%3E%0A%3C%2Fsvg%3E%0A" aria-label="Street View Pegman Control" style="display: none; height: 40px; width: 40px; position: absolute; transform: translate(-60%, -45%); pointer-events: none;"></div></div><div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;"><div style="width: 40px; height: 40px;"><button draggable="false" title="Rotate map 90 degrees" aria-label="Rotate map 90 degrees" type="button" class="gm-control-active" style="background: none rgb(255, 255, 255); display: none; border: 0px; margin: 0px 0px 32px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;"></button><button draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"></button></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left; position: relative;"><div role="button" tabindex="0" title="Show street map" aria-label="Show street map" aria-pressed="true" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; height: 40px; display: table-cell; vertical-align: middle; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 0px 17px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 36px; font-weight: 500;">Map</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 40px; text-align: left; display: none;"><div draggable="false" title="Show street map with terrain" style="color: black; font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 5px 8px 5px 5px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="vertical-align: middle;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 1em; width: 1em; transform: translateY(0.15em); display: none;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 1em; width: 1em; transform: translateY(0.15em);"></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left; position: relative;"><div role="button" tabindex="0" title="Show satellite imagery" aria-label="Show satellite imagery" aria-pressed="false" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; height: 40px; display: table-cell; vertical-align: middle; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 0px 17px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 65px; border-left: 0px;">Satellite</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 40px; text-align: left; display: none;"><div draggable="false" title="Show imagery with street names" style="color: black; font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 5px 8px 5px 5px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="vertical-align: middle;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 1em; width: 1em; transform: translateY(0.15em);"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 1em; width: 1em; transform: translateY(0.15em); display: none;"></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></div> --}}
                                      </div>
                                  </div>
                              </div>
  
                              <div class="box">
                                  <div class="box__head noborder--top"><h6>About The Restaurant</h6></div>
                                  <div class="box__body space">
  
                                      <p>Best in the market and a well-renowned food hub for all genres.</p> 
                                      <div class="cols-group">
                                          <div class="row">
                                              <div class="col-lg-6 col-md-6">
                                                  <h6>Restaurant Address</h6>
  
                                                  <p>{{$rest_info->user->userAddress->address->address}}</p>
                                              </div>
                                                  <div class="col-lg-6 col-md-6">
                                                      <h6>Phone Number</h6>
                                                      <p>54658736545</p>
                                                  </div>
                                                                                                  <div class="col-lg-6 col-md-6">
                                                  <h6>Payment Method</h6>
                                                  <ul class="links--inline links--inline-icons">
                                                        
                                                          <li><i class="fa fa-money" aria-hidden="true"></i> Cash On Delivery</li>
                                                          <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i> 
                                                            Online Payment</li>
                                                                                                      </ul>
                                              </div>
                                              <div class="col-lg-6 col-md-6">
                                                  <h6>Delivery Fee </h6>
                                                  <p>According To Region</p>
                                              </div>
                                              <div class="col-lg-12 col-md-12">
                                                  <h6>Cuisines </h6>
                                                  <p>
                                                      <a href="#">
                                                                                                                      </a><a href="/restaurants/lists?cuisines=indian">Indian</a>,                                                                 <a href="/restaurants/lists?cuisines=italian">Italian</a>,                                                                 <a href="/restaurants/lists?cuisines=mexican">Mexican</a>,                                                                 <a href="/restaurants/lists?cuisines=chinese">Chinese</a>     
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
  
                                  </div>
                              </div> 
                          </div> 
                          <div id="section--reviews">
                              <div class="box" id="revie">
                                  <div class="box__head"><h6>Reviews</h6></div>
                                  <div class="box__body space">
                                      <div class="wrap-counter">
                                          <span class="txt--larger">
                                              <?php 
                                              $star_a = \App\Star::where(['rest_id'=>$id])->sum('star_couont'); 
                                              $count_a = \App\Star::where(['rest_id'=>$id])->count();
                                          ?>
                                          <?php 
                                              $rating_a = 0;
                                              if($star_a && $count_a)
                                              {
                                                $rating_a = round($star_a/$count_a,1);
                                              }
                                           ?> 
                                            <?php echo $rating_a  ?> </span>
                                          <h6>Overall Ratings</h6>
                                          <div class="rating">
                                              {{-- <a href="javascript:void(0);" class="rating__link"><img class="rating__star" src="/images/rating_star.svg"> 
                                                  <span class="span">
                            5 Ratings <!--And 5 Reviews			-->									</span> --}}
                        {{-- </a> --}}
                                          </div>
                                      </div>
{{-- rating soham --}}
          <input type="hidden" class="id_hidden" value="{{$id}}">
          <?php 
              $star = \App\Star::where(['rest_id'=>$id])->sum('star_couont'); 
              $count = \App\Star::where(['rest_id'=>$id])->count();
          ?>
          <?php 
            $rating = 0;
            if($star && $count)
            $rating = $star/$count;

          ?>

            @foreach(range(1,5) as $i)
                                    <span class="fa-stack star_{{$i}}" data-star="{{$i}}" style="width:1em">
                    <i class="far fa-star fa-stack-1x"></i>

                    @if($rating >0)
                        @if($rating >0.5)
                            <i class="fas fa-star fa-stack-1x"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                    @endif
                    @php $rating--; @endphp
                </span>
            @endforeach

            {{-- bootstrap star rating --}}
            {{-- <label for="input-1" class="control-label">Give a rating for Skill:</label>
            <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="2"> --}}
            {{-- end star --}}
  
                                      {{-- <div class="list-contianer">
                                                                      <div class="reviews-list">
                                                      <div class="row">
                                                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                              <div class="avtar"><img src="/image/user/136/55/55" alt=""></div>
                                                              <h6>raisa sachdeva</h6>
                                                              <p><strong>nice</strong></p>
                                                              <p></p>
                                                          </div>
                                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                                              <div class="rating">
                                                                  <img src="/images/rating_star.svg" class="rating__star"> 
                                                                  <span class="span">4</span>
                                                              </div>
                                                              <span class="txt--small txt--light">
                                  2017-10-07 14:58:24															</span>
                                                          </div>
                                                      </div>
                                                          <div class="reviews-list review-list--reply">
                                  <div class="row">
                                  
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                      <div class="avtar"><img src="/image/restaurant-logo/6/55/55" alt=""></div>
                                      <h6>Ambience</h6>																		
                                      <p>helo</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                      <span class="txt--small txt--light">2017-10-07 14:58:59 </span>
                                    </div>
                                  </div>
                                </div>														
                                                                              </div> 
                                                                      <div class="reviews-list">
                                                      <div class="row">
                                                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                              <div class="avtar"><img src="/image/user/132/55/55" alt=""></div>
                                                              <h6>dfdsf dfds</h6>
                                                              <p><strong>test dummy 1</strong></p>
                                                              <p></p>
                                                          </div>
                                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                                              <div class="rating">
                                                                  <img src="/images/rating_star.svg" class="rating__star"> 
                                                                  <span class="span">2</span>
                                                              </div>
                                                              <span class="txt--small txt--light">
                                  2017-10-04 16:12:21															</span>
                                                          </div>
                                                      </div>
                                                          <div class="reviews-list review-list--reply">
                                  <div class="row">
                                  
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                      <div class="avtar"><img src="/image/restaurant-logo/6/55/55" alt=""></div>
                                      <h6>Ambience</h6>																		
                                      <p>test 2</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                      <span class="txt--small txt--light">2017-10-04 16:12:53 </span>
                                    </div>
                                  </div>
                                </div>														
                                                                              </div> 
                                                                      <div class="reviews-list">
                                                      <div class="row">
                                                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                              <div class="avtar"><img src="/image/user/26/55/55" alt=""></div>
                                                              <h6>sam mark</h6>
                                                              <p><strong>Great Meal</strong></p>
                                                              <p>We had a great meal and wonderful service. The restaurant was very customer focus. We plan to come back several times this summer!!</p>
                                                          </div>
                                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                                              <div class="rating">
                                                                  <img src="/images/rating_star.svg" class="rating__star"> 
                                                                  <span class="span">4.5</span>
                                                              </div>
                                                              <span class="txt--small txt--light">
                                  2017-07-07 12:59:13															</span>
                                                          </div>
                                                      </div>
                                                                            </div> 
                                                                      <div class="reviews-list">
                                                      <div class="row">
                                                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                              <div class="avtar"><img src="/image/user/16/55/55" alt=""></div>
                                                              <h6>Jason Minaj</h6>
                                                              <p><strong>Excellent</strong></p>
                                                              <p>Awesome foo and on time delivery</p>
                                                          </div>
                                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                                              <div class="rating">
                                                                  <img src="/images/rating_star.svg" class="rating__star"> 
                                                                  <span class="span">5</span>
                                                              </div>
                                                              <span class="txt--small txt--light">
                                  2017-06-04 19:59:42															</span>
                                                          </div>
                                                      </div>
                                                                            </div> 
                                                                      <div class="reviews-list">
                                                      <div class="row">
                                                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                              <div class="avtar"><img src="/image/user/2/55/55" alt=""></div>
                                                              <h6>Alex Murray</h6>
                                                              <p><strong>The Best food hub in town</strong></p>
                                                              <p>Awesome food. Will reorder again. :)</p>
                                                          </div>
                                                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                                              <div class="rating">
                                                                  <img src="/images/rating_star.svg" class="rating__star"> 
                                                                  <span class="span">5</span>
                                                              </div>
                                                              <span class="txt--small txt--light">
                                  2017-06-01 19:24:48															</span>
                                                          </div>
                                                      </div>
                                                          <div class="reviews-list review-list--reply">
                                  <div class="row">
                                  
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                      <div class="avtar"><img src="/image/restaurant-logo/6/55/55" alt=""></div>
                                      <h6>Ambience</h6>																		
                                      <p>thanks.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 -align-right">
                                      <span class="txt--small txt--light">2017-06-09 16:49:18 </span>
                                    </div>
                                  </div>
                                </div>														
                                                                              </div> 
                       
                                      </div> --}}
                                  </div>
                              </div>
                          </div>
  
                      </div>
                  </aside>
              </div>
          </div>
          {{-- <div class="col-lg-3 col-md-4 col-sm-12 order-cart-section" id="order-section" style="position:static;">		<div class="panel__fixed panel__fixed--right" data-offset="50" style="">
              <div class="panel__fixed-inner">
                  <div class="wrap--bordered wrap--bordered-even">
                      <h6 class="space">Your Cart</h6>
                      <div class="block--empty -align-center">
                          <img alt="" src="/images/empty_cart.svg" class="block__img" width="80">
                          <p class="txt--small txt--light">Add items in your basket</p>
              <a href="/restaurants" class="btn btn--primary btn--small">View Restaurants</a>
                      </div>
                  </div>
              </div>
          </div>  --}}


          {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

<script>
$(document).ready(function() {

          // $('#section--reviews').on('click',function(){
          //   prompt('Enter the number of star you want to give this restaurent.');
          // });

  var cart_qty =  cart_qty?cart_qty:0;
  $('.js-cart-total').text(cart_qty);

    $(document).on('click','.modal-btn', function(){
          var id = $(this).data('id');
          
          var name = $(this).data('name');
          
          var price = $(this).data('price');


          $('.modal-item').text(name);
          $('.modal-price').text(price);

          $(document).on('blur','.modal-content input[type=\"number\"]',function(){
            $('.modal-price').text((price * $(this).val()));
          });

          $(document).off('click', '.modal-content .modal-content-btn').on('click','.modal-content .modal-content-btn',function(e){
                //e.preventDefault();
                var final_qut = $('.modal-content input[type=\"number\"]').val();
                cart_qty =  parseFloat(final_qut) + parseFloat(cart_qty);
                console.log(final_qut);
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                  });
                  $.ajax({
                          type:"POST",
                          url: "<?= url("/order/addcart") ?>",
                          data: {dish_id: id,qut:final_qut},
                          success: function (data) {
                            $('.modal-content input[type=\"number\"]').val('1');
                            $('.js-cart-total').text(cart_qty);
                          }
                      });

          });

          
                  // $.ajaxSetup({
                  //   headers: {
                  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  //   }
                  // });
                  // $.ajax({
                  //         type:"POST",
                  //         url: "<?= url("/dish/cust") ?>",
                  //         data: {dish_id: id},
                  //         success: function (data) {
                  //           console.log(data);
                  //           var data = JSON.parse(data);
                  //           //console.log(data);
                  //           var options = '<option value="">Select Location Here...</option>';
                  //           $.each(data, function (key, val) {
                  //                 options += "<option value ="+key+" >"+val+" </option>";
                  //             });
                  //             $('.cityarea').html(options);
                  //         }
                  //     });

      });

      var star = null;
      $('span.fa-stack').on('click',function(){
          star = $(this).data('star');
          var id = $('.id_hidden').val(); 
          var c = confirm('Are you want give '+star+' to restaurent.');
          if(c == true)
          {
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                  });
                  $.ajax({
                          type:"POST",
                          url: "<?= url("/star") ?>",
                          data: {star: star,id:id},
                          success: function (data) {
                            
                          }
                      });
          }
      });



  });
</script>

      <script>
      $(window).scroll(function () {
          sticky_relocate($('#order-section'), $('.your-ordr'), 'stick-cart');
      });
      $(document).ready(function () {
          sticky_relocate($('#order-section'), $('.your-ordr'), 'stick-cart');
      
      $(".js-chk-valid-qty").on("keypress keyup blur",function (event) {
              //this.value = this.value.replace(/[^0-9\.]/g,'');
       $(this).val($(this).val().replace(/[^0-9\.]/g,''));
              if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                  event.preventDefault();
              }
          });
  
   $(".js-chk-valid-qty").on("keypress keyup blur",function (event) {    
             $(this).val($(this).val().replace(/[^\d].+/, ""));
              if ((event.which < 48 || event.which > 57)) {
                  event.preventDefault();
              }
          });
          
          });
  </script></div>
      </div>
  </div>
  <script>
  function showMenu(menu_item_product_id,menu_group_id,cart_id,restaurant_id,pre_order_val){
    fcom.ajax(fcom.makeUrl('cart', 'options'),{menu_item:menu_item_product_id,menu_group_id:menu_group_id,cart_id:cart_id,restaurant_id:restaurant_id,pre_order_val:pre_order_val}, function(json) {
        json = $.parseJSON(json);	
        showCustomPopup(json.msg, '');
    },{async:false});
    return false;
  }
      $(document).ready(function () {
      var hash = window.location.hash.substring(1);
      if(hash !=''){
        if(hash =='section--reviews'){			
            goToReview();
        }			
      }
  
          setDefaultCart('1');
  
      });
    function goToReview(){
        $('html, body').animate({
                scrollTop: $("#revie").offset().top
          }, 1000);
    }
  
      function setDefaultCart(menu_key) {
          getCart({cart_id: menu_key});
      }
      minusValue = function (id, data) {
      dropdown_val = parseInt($('#' + id).val());			
      if (dropdown_val > 0) {
        $('#' + id).val(dropdown_val - 1);
        jsonNotifyMessage(1);			
        removeToCart(data);
      }else{
        return false;
      }
      }
    
      addValue = function (id, data) {
          jsonRemoveMessage();
          jsonNotifyMessage(1);
          var ajax_response =0;
      var restaurant_id = data.restaurant_id;
      //jsonNotifyMessage(1);
      
      fcom.ajax(fcom.makeUrl('cart', 'checkMinimumTokenAmount'),{restaurant_id:restaurant_id}, function(json) {
          json = $.parseJSON(json);	
          if(json.status == 1){			
            ajax_response = 1;
          }else{
            jsonErrorMessage(json.msg);
            ajax_response = 0;		
            return false;					
          }
      },{async:false});		
      
      dropdown_val = parseInt($('#' + id).val());
      if(ajax_response==1)
      {
        $('#' + id).val(dropdown_val + 1);
        addToCart(data);				
      }else{
        if (dropdown_val > 0) {
          $('#' + id).val(dropdown_val - 1);
        }
        return false;
      }
      }
  
      addToCartMenuItem = function (data) {
  
          var qty = parseInt($('#' + data.input_key).val());
          if (qty < 1) {
              qty = 1;
          }
          data.qty = qty;
          addToCart(data);
      }
  
      function minmax(value)
      {
          var min = 0;
          if (value == '' )
              return value;
          value = parseInt(value);
          if (parseInt(value) < min || isNaN(value))
              return min;
          else
              return value;
      }
  
      function showMenusItems(menu_key, el) {
          $('.menu_sel').removeClass('is--active');
          $("#sel_menu_" + menu_key).addClass('is--active');
           $('.js-menu-group').hide();
          $('.js-menu-detail').hide();
          $('.js-order-timings-sec').hide();
          $('#menu-group-' + menu_key).show();
          $('.menu-items-' + menu_key).show();
          $('#js-order-timings-sec-' + menu_key).show();
          var selected = $("#sel_menu_" + menu_key).text();
         
          getCart({cart_id: menu_key});
      
      var trgt = $('#menu-group-'+menu_key+' li.active .scroll').attr('href');
      var target_offset = $(trgt).offset();
      var window_top = $(window).scrollTop();
      if( window_top < 500){
        var target_top = target_offset.top - 156;			
      }else{
        var target_top = target_offset.top - 110;
      }		
          $('html, body').animate({scrollTop: target_top}, 1000);
      
      
          
      }
    
      $(".btn--search-js").click(function () {
          $(".section--form-js").toggle();
          $('html').toggleClass('search--mobile-js');
      });
  
      $(".dropdowns__link-js").click(function () {
          $(".dropdown__target--white-js").fadeToggle();
          
      });
    var first_time_loading = true;
      $(".scroll").click(function (event) {
          event.preventDefault();
  
      var full_url = this.href;
      var parts = full_url.split("#");
      var trgt = parts[1];
      var target_offset = $("#" + trgt).offset();
  
      var window_top = $(window).scrollTop();
      if( window_top < 500){
        var target_top = target_offset.top - 156;			
      }else{
        var target_top = target_offset.top - 110;
      }
      $('html, body').animate({scrollTop: target_top}, 1000);
  
      });
  
  
  
  
  
      $('.link--nav a').click(function () {
          $('.link--nav a').removeClass('is--active');
          $(this).addClass('is--active');
      });
  
      $('.nav--vertical li a').click(function () {
          $('.nav--vertical li a').removeClass('is--active');
          $(this).addClass('is--active');
      });
      
      function loadScript(src, callback) {
  
          var script = document.createElement("script");
          script.type = "text/javascript";
          if (callback)
              script.onload = callback;
          document.getElementsByTagName("head")[0].appendChild(script);
          script.src = src;
      }
  
  
      loadScript('https://maps.googleapis.com/maps/api/js?v=3&callback=initialize&key=AIzaSyDgOnS5owgppwayEIDHROvjJYgkkG-_YS8',function () {});
      var geocoder;
        var latitude = 38.320732127;
      var longitude = -85.8213570984;
      var address = "Waymarket, Treyner road";
  
      var latLng;
  
      function geocodePosition(pos) {
          geocoder.geocode({
              latLng: pos
          }, function (responses) {
              if (responses && responses.length > 0) {
                  updateMarkerAddress(responses[0].formatted_address);
              } else {
                  updateMarkerAddress(cannot_determine_address);
              }
          });
      }
  
      function initialize() {
          geocoder = new google.maps.Geocoder();
          if (latitude == 0 || longitude == 0) {
              geocoder.geocode({'address': address}, function (results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                      latitude = results[0].geometry.location.lat();
                      longitude = results[0].geometry.location.lng();
                      initialize();
                  }
              });
              return;
          }
  
          latLng = new google.maps.LatLng(latitude, longitude);
      var latLng = { lat: latitude , lng: longitude };
  
          var homemap = new google.maps.Map(document.getElementById('mapCanvas'), {
              zoom: 14,
              center: latLng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          });
      
      content= '';	
      var marker = new google.maps.Marker({	position: latLng,	map: homemap, title:address		});
      var infowindow = new google.maps.InfoWindow({
          content: address		
        });		
      google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
        return function() {
          infowindow.open(homemap,marker);
        };
      })(marker,content,infowindow));
      }
  </script></section>

<script>
var menu_page = true;
$(".btn--search-js").click(function(){
  $(".section--form-js").toggle();
  $('html').toggleClass('search--mobile-js');
});   
$(".dropdowns__link-js").click(function(){	
  $(".dropdown__target--white-js").fadeToggle();
}); 
</script>  

    <style>
      /* *, *:before, *:after {
  box-sizing: border-box;
} */

/* body {
  height: 100vh;
  background: #ccc;
  overflow: hidden;
} */

.modal-container {
  margin: 60px auto;
  padding-top: 0px;
  position: relative;
  width: 160px;
}
.modal-container .modal-btn {
  display: block;
  margin: 0 auto;
  color: #fff;
  width: 160px;
  height: 50px;
  line-height: 50px;
  background: #446CB3;
  font-size: 22px;
  border: 0;
  border-radius: 3px;
  cursor: pointer;
  text-align: center;
  box-shadow: 0 5px 5px -5px #333;
  transition: background 0.3s ease-in;
}
.modal-container .modal-btn:hover {
  background: #365690;
}
.modal-container .modal-content,
.modal-container .modal-backdrop {
  height: 0;
  width: 0;
  opacity: 0;
  visibility: hidden;
  overflow: hidden;
  cursor: pointer;
  transition: opacity 0.2s ease-in;
}
.modal-container .modal-close {
  color: #aaa;
  position: absolute;
  right: 5px;
  top: 5px;
  padding-top: 3px;
  background: #fff;
  font-size: 16px;
  width: 25px;
  height: 25px;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
}
.modal-container .modal-close:hover {
  color: #333;
}
.modal-container .modal-content-btn {
  position: absolute;
  text-align: center;
  cursor: pointer;
  bottom: 20px;
  right: 30px;
  background: #446CB3;
  color: #fff;
  width: 50px;
  border-radius: 2px;
  font-size: 14px;
  height: 32px;
  padding-top: 9px;
  font-weight: normal;
}
.modal-container .modal-content-btn:hover {
  color: #fff;
  background: #365690;
}
.modal-container #modal-toggle {
  display: none;
}
.modal-container #modal-toggle.active ~ .modal-backdrop, .modal-container #modal-toggle:checked ~ .modal-backdrop {
  background-color: rgba(0, 0, 0, 0.6);
  width: 100vw;
  height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 9;
  visibility: visible;
  opacity: 1;
  transition: opacity 0.2s ease-in;
}
.modal-container #modal-toggle.active ~ .modal-content, .modal-container #modal-toggle:checked ~ .modal-content {
  opacity: 1;
  background-color: #fff;
  /* max-width: 400px;
  width: 400px;
  height: 280px; */
  max-width: 550px;
    width: 550px;
    height: 325px;
  padding: 10px 30px;
  position: fixed;
  left: calc(50% - 200px);
  top: 12%;
  border-radius: 4px;
  z-index: 999;
  pointer-events: auto;
  cursor: auto;
  visibility: visible;
  box-shadow: 0 3px 7px rgba(0, 0, 0, 0.6);
}
/* @media (max-width: 1200px) {
  .modal-container #modal-toggle.active ~ .modal-content, .modal-container #modal-toggle:checked ~ .modal-content {
    left: 0;
  }
} */

    </style>
    <div class="modal-container">
      <input id="modal-toggle" type="checkbox">
      {{-- <label class="modal-btn" for="modal-toggle">Click me</label>  --}}
      <label class="modal-backdrop" for="modal-toggle"></label>
      <div class="modal-content">
        <label class="modal-close" for="modal-toggle">&#x2715;</label>
        <small><h6 style="margin: 15px 124px; font-size: 20px; font-style: italic; text-decoration: underline;">Customize Your Product</h6></small><hr/>
        <h5 class="modal-item"></h5> 
        <input type="number" value="1"/>
        <br>
        <br>
        {{-- <h6 style="position: relative;top: 105px;right: -272px;">Price : Rs <span class="modal-price"></span></h6> 
        <label style=" height: 35px;width: 65px;padding: 8px;border-radius: 5px; background-color:#54a54f;" class="modal-content-btn" for="modal-toggle">Save</label>    --}}
        <div>
        <h6 style="position: relative;top: 105px;right: -256px;">Price : Rs <span class="modal-price"></span></h6> 
        <label style=" height: 35px;width: 97px;padding: 8px;border-radius: 5px; background-color:#54a54f;" class="modal-content-btn" for="modal-toggle">Add to Cart</label>   
        </div>
      </div>          
    </div>  
    
  </div>

  
  <script>
      // $(function(){

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('.link__group .icon-new').on('click',function(){

          // console.log($(this).data('id'));
                $.ajax({
                        type:"POST",
                        url: "<?= url("/favourite") ?>",
                        data: {id: $(this).data('id')},
                        success: function (data) {
                          // console.log(data);
                            if(data)
                            {

                                $('.icon-new').css('color','red');
                            }
                        }
                });

          });
      // });
  </script>

  <script type="text/javascript">
    
    $(function(){
    
      $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
      
      $('.city').on('change',function(){
          var selected = $(".city :selected").val();
          console.log(selected);
                $.ajax({
                        type:"POST",
                        url: "<?= url("/rest/areas") ?>",
                        data: {selected: selected},
                        success: function (data) {
                          console.log(data);
                          var data = JSON.parse(data);
                          //console.log(data);
                           var options = '<option value="">Select Location Here...</option>';
                           $.each(data, function (key, val) {
                                options += "<option value ="+key+" >"+val+" </option>";
                            });
                            $('.cityarea').html(options);
                        }
                    });
            });
       });
    
        </script>

        <script>
            $(document).ready(function(){
              $('[name=\"area_id\"]').on('change',function(){
                var selected_area = $('[name=\"area_id\"] :selected').val();
                var selected_city = $('[name=\"city_id\"] :selected').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                          type:"POST",
                          url: "<?= url("/searchajax") ?>",
                          data: {selected_area:selected_area,selected_city:selected_city},
                          success: function (data) {
                              // return data;
                          }
                      });

              });
            });
        </script>
        <script type="text/javascript">
        
        $(function(){
          // console.log('hii');
          $('#section--reviews').on('click',function(){
            prompt('Enter the number of star you want to give this restaurent.');
          });

          // $(document).on('click','span.fa-stack',function(){
          //         console.log($(this));
          //     });

          //   $('.space [class^=\"star_\"]').on('click',function(){
          //         console.log($(this));
          //     });

          //     $('span.fa-stack').on('click',function(){
          //         console.log($(this));
          //     });
        });
        </script>
@endsection