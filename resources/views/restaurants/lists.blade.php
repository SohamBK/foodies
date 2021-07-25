@extends('layouts.frontendnav')
@section('content')    

<div id="body" class="body"> 
    <section class="section section--form section--form-mobile section--form-js">
	<a href="javascript:void(0)" class="link__close btn--search-js hide--desktop"></a>
	<div class="from-row">
		<h5 class="-align-center hide--desktop">Select Location</h5>
		<div class="form form--search form--search-inline location-search"> 
			<form class="form form--search" id="searchLocation" name="locationForm" method="post" action="http://demo.yoyumm.com/restaurants/search-location" onsubmit="searchPopLocation(searchLocationFormValidator, this);return false;" > 
				{{-- <ul> --}}
                        <?php //  $cities = App\City::where(['status'=>App\City::STATUS_ACTIVE])->get();
                        ?>
                        {{-- <div class="col-md-4"> --}}
                        {{-- <li class="first"> --}} 
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
                        {{-- </li>
                    </div> --}}
                      {{-- <li class="first"><input id="ajax_city" placeholder="Select City" class="citySearch" title="Select City" data-fatreq="{&quot;required&quot;:true}" type="text" name="ucity" value=""  /></li> --}}
                    {{-- <div class="col-md-4">
                      <li >
                        <select class="form-control cityarea" name="area_id" required>
                            <option  value="">Select Location Here...</option>
                          </select>
                      </li> --}}
                      {{-- <li class="last">
                        <input title="" data-fatreq="{&quot;required&quot;:false}" type="submit" name="submit_btn" value="Find Now"  />						<input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="param" value="{&quot;url&quot;:&quot;restaurant\/menu\/ambience\/6&quot;}"  />						<input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="redirect" value=""  /> 
                      </li>   --}}
                    {{-- </div> --}}
                    {{-- <div class="col-md-4">
                      <li >
                        <button class="btn btn-primary">search</button>
                      </li>
                    </div> --}}
                    </ul>
                {{-- </div> --}}
				<script type="text/javascript">//<![CDATA[
			searchLocationFormValidator_formatting={"errordisplay":3,"summaryElementId":""};searchLocationFormValidator=$("#searchLocation").validation(searchLocationFormValidator_formatting);
            //]]></script> 
		  </form>
		</div>
    </div>
</section>
 
    <section class="section--filters section--filters-mobile section--filters-js" id="filters" >
        <a href="javascript:void(0)" class="link__close btn--filter-js hide--desktop"></a>
        <div class="section section--sort" >
            <div class="container container--fixed -clearfix">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8" >
                        {{-- <span class="sort__title">Filter By</span> --}}
                        <div class="drop-down">
                            {{-- <a href="javascript:void(0)" class="drop-down__link drop-down__link-js">Restaurants soham</a> --}}
                            <div class="drop-down__target drop-down__target-js" style="display:none;">
                                <div class="container container--fixed -clearfix">
                                    <div class="drop-down__body"> 
                                        <ul class="links--square links--square-onefifth"  > 
                                             
                                                {{-- <li> 
                                                    <label class="checkbox">
                                                        <input id="res_preorder"   type="checkbox" class="filter" name="filter" value="preorder">
                                                        <i class="input-helper"></i> Pre Order Available 
                                                    </label>
                                                </li> --}}
                                             
                                                {{-- <li> 
                                                    <label class="checkbox">
                                                        <input id="res_deals"   type="checkbox" class="filter" name="filter" value="deals">
                                                        <i class="input-helper"></i> Deals 
                                                    </label>
                                                </li>
                                             
                                                <li> 
                                                    <label class="checkbox">
                                                        <input id="res_online-payment"   type="checkbox" class="filter" name="filter" value="online-payment">
                                                        <i class="input-helper"></i> Online Payment Available 
                                                    </label>
                                                </li> --}}
                                             
                                                {{-- <li> 
                                                    <label class="checkbox">
                                                        <input id="res_delivery"   type="checkbox" class="filter" name="filter" value="delivery">
                                                        <i class="input-helper"></i> Delivery 
                                                    </label>
                                                </li>
                                             
                                                <li> 
                                                    <label class="checkbox">
                                                        <input id="res_pickup"   type="checkbox" class="filter" name="filter" value="pickup">
                                                        <i class="input-helper"></i> Pick Up 
                                                    </label>
                                                </li>
                                             
                                                <li> 
                                                    <label class="checkbox">
                                                        <input id="res_cod"   type="checkbox" class="filter" name="filter" value="cod">
                                                        <i class="input-helper"></i> Cash On Delivery 
                                                    </label>
                                                </li> --}}
                                             
                                                {{-- <li> 
                                                    <label class="checkbox">
                                                        <input id="res_veg"   type="checkbox" class="filter" name="filter" value="veg">
                                                        <i class="input-helper"></i> Vegeterian 
                                                    </label>
                                                </li>
                                             
                                                <li> 
                                                    <label class="checkbox">
                                                        <input id="res_non-veg"   type="checkbox" class="filter" name="filter" value="non-veg">
                                                        <i class="input-helper"></i> Non Vegeterian 
                                                    </label>
                                                </li> --}}
                                              
                                        </ul>

                                    </div>
                                    <span class="-gap"></span>
                                    {{-- <div class="drop-down__footer">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <a href="javascript:void(0);" onclick="filteration();" class="btn btn--primary btn--small apply_filters_filter">Apply Filters</a>
                                                <a href="javascript:void(0);" class="btn btn--black btn--small  drop-down__link-js remove_overlay">Cancel</a>
                                            </div> --}}
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-6 -align-right"><a href="lists.html" class="link--underline" id="cancel_filters_filter">Remove Filters</a></div> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="drop-down">
                            <a href="javascript:void(0)" class="drop-down__link drop-down__link-js">Cuisines</a>
                            <div class="drop-down__target drop-down__target-js" style="display:none;">
                                <div class="container container--fixed -clearfix">
                                    <div class="drop-down__body">
                                        <ul class="links--square links--square-onefifth">
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_7"   type="checkbox" class="cuisines" value="cajun"  >
                                                        <i class="input-helper"></i> Cajun                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_5"   type="checkbox" class="cuisines" value="indian"  >
                                                        <i class="input-helper"></i> Indian                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_6"   type="checkbox" class="cuisines" value="french"  >
                                                        <i class="input-helper"></i> French                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_4"   type="checkbox" class="cuisines" value="italian"  >
                                                        <i class="input-helper"></i> Italian                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_3"   type="checkbox" class="cuisines" value="japanese"  >
                                                        <i class="input-helper"></i> Japanese                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_1"   type="checkbox" class="cuisines" value="mexican"  >
                                                        <i class="input-helper"></i> Mexican                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_2"   type="checkbox" class="cuisines" value="spanish"  >
                                                        <i class="input-helper"></i> Spanish                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="checkbox">
                                                        <input id="cus_8"   type="checkbox" class="cuisines" value="chinese"  >
                                                        <i class="input-helper"></i> Chinese                                                    </label>
                                                </li>
                                              
                                        </ul>

                                    </div> --}}
                                    <span class="-gap"></span>
                                    <div class="drop-down__footer">
                                        <div class="row">
                                            {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                                <a href="javascript:void(0)" onclick="filteration();" class="btn btn--primary btn--small apply_filters_filter" >Apply Filters</a>
                                                <a href="javascript:void(0)" class="btn btn--black btn--small drop-down__link-js remove_overlay" >Cancel</a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 -align-right"><a href="lists.html" class="link--underline">Remove Filters</a></div> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="drop-down">
                            <a href="javascript:void(0)" class="drop-down__link drop-down__link-js">Minimum Order Price</a>
                            <div class="drop-down__target drop-down__target-js" style="display:none;">
                                <div class="container container--fixed -clearfix">
                                    <div class="drop-down__body">
                                        <ul class="links--square links--square-onefifth">
                                             
                                                <li>
                                                    <label class="radio">
                                                        <input id="prc_1-100"  type="radio" class="price" value="1-100" name="prc">
                                                        <i class="input-helper"></i> 1IR - 100IR                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="radio">
                                                        <input id="prc_101-200"  type="radio" class="price" value="101-200" name="prc">
                                                        <i class="input-helper"></i> 101IR - 200IR                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="radio">
                                                        <input id="prc_201-300"  type="radio" class="price" value="201-300" name="prc">
                                                        <i class="input-helper"></i> 201IR - 300IR                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="radio">
                                                        <input id="prc_301-400"  type="radio" class="price" value="301-400" name="prc">
                                                        <i class="input-helper"></i> 301IR - 400IR                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="radio">
                                                        <input id="prc_401-500"  type="radio" class="price" value="401-500" name="prc">
                                                        <i class="input-helper"></i> 401IR - 500IR                                                    </label>
                                                </li>
                                             
                                                <li>
                                                    <label class="radio">
                                                        <input id="prc_501-More"  type="radio" class="price" value="501-More" name="prc">
                                                        <i class="input-helper"></i> 501IR - More                                                    </label>
                                                </li>
                                              
                                        </ul>
                                    </div>
                                    <span class="-gap"></span>
                                    <div class="drop-down__footer">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <a href="javascript:void(0)"  onclick="filteration();" class="btn btn--primary btn--small apply_filters_filter"  >Apply Filters</a>
                                                <a href="javascript:void(0)" class="btn btn--black btn--small drop-down__link-js remove_overlay">Cancel</a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 -align-right"><a href="lists.html" class="link--underline">Remove Filters</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> --}}
                    {{-- <div class="col-lg-4 col-md-4 col-sm-4 -align-right">
                        <span class="sort__title">Sort By</span>
                        <div class="drop-down drop-down--small">
                                                        <a href="javascript:void(0)" class="drop-down__link drop-down__link-js">Select</a>
                            <div class="drop-down__target drop-down__target-js" style="display:none;">
                                <div class="drop-down__body">
                                    <ul class="links--square">
                                                                                    <li Popular>
                                                <a href="lists6795.html?sort-by=ratings">Ratings</a></li>
                                                                                    <li Popular>
                                                <a href="lists6c4e.html?sort-by=popular">Popular</a></li>
                                                                                    <li Popular>
                                                <a href="lists8354.html?sort-by=order-value">Minimum Order Value</a></li>
                                                                                    <li Popular>
                                                <a href="lists352c.html?sort-by=delivery-fee">Delivery Fee</a></li>
                                           
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            </section> 
{{-- =========show Dishes============ --}}
            
<section class="section section--listing">
        <div class="container container--fixed">
            <div class="section__head -align-center">
                <h5 id="listing-heading">{{$restarents_count}} Restaurants Found Delivering In {{$area}}, {{$city_new}}</h5>
                <a href="javascript:void(0)" class="btn btn--secondary btn--filter-js hide--desktop">Filter</a>
            </div>
            <div class="section__body">
                <div class="row row--listings" id="listing">
                       
        @foreach($restaurents as $r)
        {{-- {{dd(App\Restaurent::where(['user_id'=>$r->user->id])->get()[0]->id)}}    --}}
        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
            <div class="item item--hovered">
                <div class="item__head">
                    <figure class="item__pic sign">
                        <a href="/dishes/{{App\Restaurent::where(['user_id'=>$r->user->id])->get()[0]->id}}">
                            <?php
                                $url = url('/storage/uploads/');
                                $slash =  '/';
                                $file = ($r->image?$r->image->file_name:'download.png');
                                $furl = $url.''.$slash.''.$file;
                            ?>
							<img src="{{$furl}}" alt="{{$r->name}}" title="{{$r->name}}">
                        </a>
					</figure>
                </div>
                <div class="item__content">
                    <div class="item__body">
                        <span class="item__title">
							<a href="/dishes/{{App\Restaurent::where(['user_id'=>$r->user->id])->get()[0]->id}}">
								{{$r->name}}							</a>
						</span>
                                    <span class="tag tag--green"></span>
                                    
                                    <?php
                                    date_default_timezone_set('Asia/Kolkata'); 
                                    $time = explode(' - ',$r->timing);
                                    ?>
                                
                                    <?php if(date('l')==$r->weekly_off){ ?>
                                    <span class="rest-open-close" style="color:red;">Close</span>
                                    <?php }else{ ?>
                                        <?php if($time[0] < date('H:i') && $time[1] > date('H:i')){ ?>
                                            <span class="rest-open-close">Open</span>
                                        <?php }else{ ?>
                                            <span class="rest-open-close" style="color:red;">Close</span>
                                        <?php } ?>
                                    <?php } ?>
                        <ul class="links--inline links--inline-small">
                                <?php 
                                $categories = explode('|',$r->category);
                          ?>
                          {{-- {{dd($restaurant)}} --}}
                          @foreach($categories as $k => $v)
                          <li><a href="#">
                                {{App\Category::find($v)->name}}</a> 
                    </li>
                          @endforeach
                                                                    
                                                                                {{-- <li><a href="/restaurants/lists?cuisines=french">
                                                French</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=italian">
                                                Italian</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=japanese">
                                                Japanese</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=spanish">
                                                Spanish</a> 
                                        </li> --}}
                                                                </ul>
                                                            <span class="location" title="{{$r->user->userAddress->address->address}}"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$r->user->userAddress->address->address}}</span>
                    </div>
                    <div class="item__tags">
                        <ul class="links--inline links--inline-icons">
                                                            <li><i class="fa fa-money" aria-hidden="true"></i>
                                                                Cash On Delivery</li>
                                                            <li><i class="fa fa-credit-card" aria-hidden="true"></i>Online Payment</li>
                                                         
                        </ul>
                    </div>
                    <div class="item__footer">
                        <ul>
                            <li>
                                {{-- <div class="rating">
                                    <a class="rating__link" href="/dishes/{{App\Restaurent::where(['user_id'=>$r->user->id])->get()[0]->id}}" tabindex="0">  
										<div class="Fr-star size-3" data-rating="0"><div class="Fr-star-value" style="width: 0%"></div><div class="Fr-star-bg"></div></div>   
                                       
                                        <span class="span">(0 Reviews)</span></a>
                                </div> --}}
                            </li>
                             
                                <li class="second">
                                    {{-- <span class="txt--small">Delivery <span class="-color-primary">1:00 Hr                                        </span> --}}
                                </span></li>   
                                                        <li class="last">
                                <a href="/dishes/{{App\Restaurent::where(['user_id'=>$r->user->id])->get()[0]->id}}" class="btn btn--xsmall btn--primary">Order Now</a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
                {{-- <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
            <div class="item item--hovered">
                <div class="item__head">
                    <figure class="item__pic sign">
						<a href="/restaurant/menu/the-aroma-angel/3">
							<img src="/image/restaurant-logo/3/400/400" alt="The Aroma Angel" title="The Aroma Angel">
                        </a>
					</figure>
                </div>
                <div class="item__content">
                    <div class="item__body">
                        <span class="item__title">
							<a href="/restaurant/menu/the-aroma-angel/3">
								The Aroma Angel							</a>
						</span>
                                                        <span class="tag tag--green"></span><span class="tag tag--red"></span> 
                                						<span class="rest-open-close"> Open</span>
                        <ul class="links--inline links--inline-small">
                                                                    <li><a href="/restaurants/lists?cuisines=italian">
                                                Italian</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=spanish">
                                                Spanish</a> 
                                        </li>
                                                                </ul>
                                                <span class="location" title="73, Highway City, Fresno, California"><i class="fa fa-map-marker" aria-hidden="true"></i> 73, Highway City, Fresno, California</span>
                    </div>
                    <div class="item__tags">
                        <ul class="links--inline links--inline-icons">
						
                              
                                <li><i class="fa fa-money" aria-hidden="true"></i>
                                    Cash On Delivery</li>
                                <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                    Online Payment</li>
                                                         
                        </ul>
                    </div>
                    <div class="item__footer">
                        <ul>
                            <li>
                                <div class="rating">
                                    <a class="rating__link" href="/restaurant/menu/the-aroma-angel/3#section--reviews" tabindex="0">  
										<div class="Fr-star size-3" data-rating="0"><div class="Fr-star-value" style="width: 0%"></div><div class="Fr-star-bg"></div></div>   
                                       
                                        <span class="span">(0 Reviews)</span></a>
                                </div>
                            </li>
                             
                                <li class="second">
                                    <span class="txt--small">Delivery <span class="-color-primary">2:00 Hr                                        </span>
                                </span></li>   
                                                        <li class="last">
                                <a href="/restaurant/menu/the-aroma-angel/3" class="btn btn--xsmall btn--primary">Order Now</a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div> 
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
            <div class="item item--hovered">
                <div class="item__head">
                    <figure class="item__pic sign">
						<a href="/restaurant/menu/eat-street/9">
							<img src="/image/restaurant-logo/9/400/400" alt="Eat Street" title="Eat Street">
                        </a>
					</figure>
                </div>
                <div class="item__content">
                    <div class="item__body">
                        <span class="item__title">
							<a href="/restaurant/menu/eat-street/9">
								Eat Street							</a>
						</span>
                                                        <span class="tag tag--green"></span>
                                						<span class="rest-open-close"> Open</span>
                        <ul class="links--inline links--inline-small">
                                                                    <li><a href="/restaurants/lists?cuisines=chinese">
                                                Chinese</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=french">
                                                French</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=italian">
                                                Italian</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=japanese">
                                                Japanese</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=mexican">
                                                Mexican</a> 
                                        </li>
                                                                </ul>
                                                <span class="location" title="Wonton Street, Charleston, South Carolina"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                     Wonton Street, Charleston, South Carolina</span>
                    </div>
                    <div class="item__tags">
                        <ul class="links--inline links--inline-icons">
						
                              
                                <li><i class="fa fa-money" aria-hidden="true"></i>
                                    Cash On Delivery</li>
                                <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                    Online Payment</li>
                                                         
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                    Pre Order</li>
                             
                        </ul>
                    </div>
                    <div class="item__footer">
                        <ul>
                            <li>
                                <div class="rating">
                                    <a class="rating__link" href="/restaurant/menu/eat-street/9#section--reviews" tabindex="0">  
										<div class="Fr-star size-3" data-rating="0"><div class="Fr-star-value" style="width: 0%"></div><div class="Fr-star-bg"></div></div>   
                                       
                                        <span class="span">(0 Reviews)</span></a>
                                </div>
                            </li>
                             
                                <li class="second">
                                    <span class="txt--small">Delivery <span class="-color-primary">0:30 Hr                                        </span>
                                </span></li>   
                                                        <li class="last">
                                <a href="/restaurant/menu/eat-street/9" class="btn btn--xsmall btn--primary">Order Now</a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div> 
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
            <div class="item item--hovered">
                <div class="item__head">
                    <figure class="item__pic sign">
						<a href="/restaurant/menu/square-fox/10">
							<img src="/image/restaurant-logo/10/400/400" alt="Square Fox" title="Square Fox">
                        </a>
					</figure>
                </div>
                <div class="item__content">
                    <div class="item__body">
                        <span class="item__title">
							<a href="/restaurant/menu/square-fox/10">
								Square Fox							</a>
						</span>
                                                        <span class="tag tag--red"></span>
                                						<span class="rest-open-close"> Open</span>
                        <ul class="links--inline links--inline-small">
                                                                    <li><a href="/restaurants/lists?cuisines=chinese">
                                                Chinese</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=french">
                                                French</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=italian">
                                                Italian</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=spanish">
                                                Spanish</a> 
                                        </li>
                                                                </ul>
                                                <span class="location" title="45, Second Lane, Fresno, California"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    45, Second Lane, Fresno, California</span>
                    </div>
                    <div class="item__tags">
                        <ul class="links--inline links--inline-icons">
						
                              
                                <li><i class="fa fa-money" aria-hidden="true"></i>
                                    Cash On Delivery</li>
                                <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                    Online Payment</li>
                                                         
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                    Pre Order</li>
                             
                        </ul>
                    </div>
                    <div class="item__footer">
                        <ul>
                            <li>
                                <div class="rating">
                                    <a class="rating__link" href="/restaurant/menu/square-fox/10#section--reviews" tabindex="0">  
										<div class="Fr-star size-3" data-rating="0"><div class="Fr-star-value" style="width: 0%"></div><div class="Fr-star-bg"></div></div>   
                                       
                                        <span class="span">(0 Reviews)</span></a>
                                </div>
                            </li>
                             
                                <li class="second">
                                    <span class="txt--small">Delivery <span class="-color-primary">1:00 Hr                                        </span>
                                </span></li>   
                                                        <li class="last">
                                <a href="/restaurant/menu/square-fox/10" class="btn btn--xsmall btn--primary">Order Now</a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div> 
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
            <div class="item item--hovered">
                <div class="item__head">
                    <figure class="item__pic sign">
						<a href="/restaurant/menu/atlantic/42">
							<img src="/image/restaurant-logo/42/400/400" alt="Atlantic" title="Atlantic">
                        </a>
					</figure>
                </div>
                <div class="item__content">
                    <div class="item__body">
                        <span class="item__title">
							<a href="/restaurant/menu/atlantic/42">
								Atlantic							</a>
						</span>
                                                        <span class="tag tag--green"></span><span class="tag tag--red"></span> 
                                						<span class="rest-open-close"> Open</span>
                        <ul class="links--inline links--inline-small">
                                                                    <li><a href="/restaurants/lists?cuisines=cajun">
                                                Cajun</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=chinese">
                                                Chinese</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=indian">
                                                Indian</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=japanese">
                                                Japanese</a> 
                                        </li>
                                                                                <li><a href="/restaurants/lists?cuisines=mexican">
                                                Mexican</a> 
                                        </li>
                                                                </ul>
                                                <span class="location" title="1120 borne St, Danbury, Connecticut"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    1120 borne St, Danbury, Connecticut</span>
                    </div>
                    <div class="item__tags">
                        <ul class="links--inline links--inline-icons">
						
                              
                                <li><i class="fa fa-money" aria-hidden="true"></i>
                                    Cash On Delivery</li>
                                <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                    Online Payment</li>
                                                         
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>

                                    Pre Order</li>
                             
                        </ul>
                    </div>
                    <div class="item__footer">
                        <ul>
                            <li>
                                <div class="rating">
                                    <a class="rating__link" href="/restaurant/menu/atlantic/42#section--reviews" tabindex="0">  
										<div class="Fr-star size-3" data-rating="0"><div class="Fr-star-value" style="width: 0%"></div><div class="Fr-star-bg"></div></div>   
                                       
                                        <span class="span">(0 Reviews)</span></a>
                                </div>
                            </li>
                                                        <li class="last">
                                <a href="/restaurant/menu/atlantic/42" class="btn btn--xsmall btn--primary">Order Now</a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>  --}}
        </div>
                <span class="-gap"></span><span class="-gap"></span><span class="-gap"></span>
                <div class="load-more -align-center" style="display:none;">
                    <a href="javascript:void(0);" onclick="loadMore()" id="loadMoreButton" class="btn btn--bordered">Load More</a> 
                </div>
            </div>
        </div>
    </section>


{{-- ===========Show dishes ends============ --}}
    <section class="section section--listing">
        <div class="container container--fixed">
            <div class="section__head -align-center">
                <h5 id="listing-heading"></h5>
                <a href="javascript:void(0)" class="btn btn--secondary btn--filter-js hide--desktop">Filter</a>
            </div>
            <div class="section__body">
                <div class="row row--listings" id="listing">
                </div>
                <span class="-gap"></span><span class="-gap"></span><span class="-gap"></span>
                <div class="load-more -align-center" style="display:none;">
                    <a  href="javascript:void(0);"  onclick="loadMore()" id="loadMoreButton" class="btn btn--bordered">Load More</a> 
                </div>
            </div>
        </div>
    </section>
</div>    

<script  type="text/javascript">
    $('.drop-down__link-js').click(function () {
        $('html').addClass('is-filter-active');
        if ($(this).hasClass('is--active')) {
            $(this).removeClass('is--active');
            $(this).siblings('.drop-down__target-js').slideUp();
            $('html').removeClass('is-filter-active');
            return false;
        }
        $('.drop-down__link-js').removeClass('is--active');
        $(this).addClass("is--active");

        $('.drop-down__target-js').slideUp();
        $(this).siblings('.drop-down__target-js').slideDown();
    });
    $('.remove_overlay').click(function () {
        if ($('html').hasClass('is-filter-active')) {
            $('html').removeClass('is-filter-active');
        }
    });
    $('html').click(function () {
        if ($('html').hasClass('is-filter-active')) {
            $('.drop-down__link-js').removeClass("is--active");
            $('html').removeClass('is-filter-active');
            $('.drop-down__target-js').slideUp();
        }
    });

    $('.section--sort').click(function (e) {
        e.stopPropagation();
    });

    $(window).scroll(function () {
        if ($(window).width() > 1200)
            if ($(this).scrollTop() > 105 && !$('.section--filters').hasClass('filters-fixed')) {
                $('html').addClass('filters-fixed');
                $('html').slideDown();
            } else if ($(this).scrollTop() <= 400) {
                $('html').removeClass('filters-fixed');
                $('html').slideDown();
            }
    });

    $(".btn--filter-js").click(function () {
        $(".section--filters-js").toggle();
        $('html').toggleClass('filters--mobile-js');
    });

    var param = {"url":"restaurants\/lists"};

    (function ($) {
        var filterUrl = '';
        removefilter = function (ths)
        {
            var fltrid = $(ths).data('filterid');
            $('#' + fltrid).removeAttr('checked');
            if (filteration() == true)
            {
                $(ths).parent().remove();
                window.location.href = filterUrl;
            }
            return;
        }

        filteration = function () {
            var url1 = '', url2 = '', url3 = '';
            var category_list1 = [];
            var category_list2 = [];
            var category_list3 = [];
            var filter_list = [];
            var seperator1 = '';
            var seperator2 = '';
            var seperator3 = '';
            var filter_value, append;
            selected = false;

            $('#filters :input:checked').each(function () {
                selected = true;
                var category_value = $(this).val();
                var filter_value = $(this).attr("class");
                filter_list.push(filter_value);

                if (filter_value == 'filter') {
                    seperator1 = '&';
                    category_list1.push(category_value);
                    url1 = filter_value + '=' + category_list1;
                }
                if (filter_value == 'cuisines') {
                    seperator2 = '&';
                    category_list2.push(category_value);
                    url2 = filter_value + '=' + category_list2;
                }
                if (filter_value == 'price') {
                    seperator3 = '&';
                    category_list3.push(category_value);
                    url3 = filter_value + '=' + category_list3;
                }

                var append = fcom.makeUrl('restaurants', 'lists') + '?' + url1 + seperator1 + url2 + seperator2 + url3;
                var stringLength = append.length;
                var lastChar = append.charAt(stringLength - 1);
                if (lastChar != '&') {
                    var final_url = append;
                } else {
                    var final_url = append.substring(0, append.length - 1);
                }
                filterUrl = final_url;
            });

            $('.apply_filters_filter').click(function () {
                window.location.href = filterUrl;
            });
            if (selected == false) {
                filterUrl = fcom.makeUrl('restaurants', 'lists')
            }
            return true;
        }

    })(jQuery);

    $(document).ready(function ()
    {
        filteration();
    });
    
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

@endsection
