{{-- {{dd('hiii')}} --}}
@extends('layouts.frontendnav')
@section('content')
       <div id="body" class="body"> 
      <section class="banner"> 
          <div class="slider">
              <ul class="slides--single-js">
                <li>
            <div class="slide" style="background-image:url(image/banners/10/2000/700);">
                              <div class="slide__content">
                                  <h1>Delivering Deliciousness </h1>
                                  <p>Good Food Good Mood </p>
                                                  <a title="Register Now" href="/register" class="btn btn--secondary btn--large">Register Now</a>
                                              </div>
                          </div>
          </li>
                          <li>
            <div class="slide" style="background-image:url(image/banners/1/2000/700);">
                              <div class="slide__content">
                                  <h1>Delivering Deliciousness </h1>
                                  <p>Ordering Food From Your Favorite Restaurants is just a <span style="font-weight: bold; font-size: 21px; color: rgb(15, 13, 13);">Click </span>Away </p>
                                                  <a title="Register Now" href="/register" class="btn btn--secondary btn--large">Register Now</a>
                                              </div>
                          </div>
          </li>
                          <li>
            <div class="slide" style="background-image:url(image/banners/7/2000/700);">
                              <div class="slide__content">
                                  <h1>Delivering Deliciousness </h1>
                                  <p>Good Food For Good Life.&nbsp; </p>
                                                  <a title="Register Now" href="/register" class="btn btn--secondary btn--large">Register Now</a>
                                              </div>
                          </div>
          </li>
                              </ul>
          </div>
          <div class="slide__form-cover">
              <h4>Restaurants Near By</h4>
              <div class="location-search"> 
                  {{-- <form class="form form--search" id="searchLocation" name="locationForm" method="post" action="http://demo.yoyumm.com/restaurants/search-location" onsubmit="searchPopLocation(searchLocationFormValidator, this);return false;" >  --}}
                  {{-- <ul>  --}}

                    <form action="/search" method="post">
                      @csrf 
                      <div class="col-md-12" style="">  
                          <div class="form-group">
                              <select class="form-control city" name="city_id" required>
                                <option  value="">Select City Here...</option>
                                @foreach($cities as $city)
                                  <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-md-12">  
                          <div class="form-group">
                              <select class="form-control cityarea" name="area_id" required>
                                <option  value="">Select Location Here...</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">  
                        <div class="form-group text-center" style="text-align: center;
                        margin-top: 27px;">
                          <input class="btn btn-primary" type="submit" value="Find Restaturents"/></button>
                        </div>
                    </div>
                    </form>

                      {{-- <li class="first">
                          <input id="ajax_city" placeholder="Select City" class="citySearch city" title="Select City" data-fatreq="{&quot;required&quot;:true}" type="text" name="ucity" value=""  />                    </li>
                      <li>
                          <input id="uregion" placeholder="Select Area" class="regionSearch" title="Select Area" data-fatreq="{&quot;required&quot;:true}" type="text" name="uregion" value=""  />                    </li>
                      <li class="last">
                          <input title="" data-fatreq="{&quot;required&quot;:false}" type="submit" name="submit_btn" value="Find Now"  />                        <input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="param" value="{&quot;url&quot;:&quot;&quot;}"  />                        <input title="" data-fatreq="{&quot;required&quot;:false}" type="hidden" name="redirect" value=""  /> 
                      </li>  
                  </ul> --}}
                      {{-- </form> --}}
                        <script type="text/javascript">//<![CDATA[
        searchLocationFormValidator_formatting={"errordisplay":3,"summaryElementId":""};searchLocationFormValidator=$("#searchLocation").validation(searchLocationFormValidator_formatting);
        //]]></script> 
              </div>
          </div>
      </section>
      <section class="section section--steps -align-center">
      <div class="section__head -align-center">
              <div class="container container--fixed">
                   <h2>How It Works</h2>
              </div>
          </div>
          <div class="section__body">
              <div class="container container--fixed">
                  <div class="row">
                                                                  <div class="col-lg-3 col-md-3 col-sm-6">
                              <div class="media media--info">
                                  <figure class="media__icon">
                    <img alt="1. Search" src="images/info_icon_1.svg" title="1. Search" />
                  </figure>
                                  <span class="media__title">1. Search</span>
                                  <div class="media__desc">
                                      <p>Find your restaurant using advanced location based search filter.</p>
                                  </div>
                              </div>
                          </div> 
                                              <div class="col-lg-3 col-md-3 col-sm-6">
                              <div class="media media--info">
                                  <figure class="media__icon">
                    <img alt="2. Choose" src="images/info_icon_2.svg" title="2. Choose" />
                  </figure>
                                  <span class="media__title">2. Choose</span>
                                  <div class="media__desc">
                                      <p>Select a best fit and appropriate restaurant which fulfills your binge and taste buds.</p>
                                  </div>
                              </div>
                          </div> 
                                              <div class="col-lg-3 col-md-3 col-sm-6">
                              <div class="media media--info">
                                  <figure class="media__icon">
                    <img alt="3. Pay" src="images/info_icon_3.svg" title="3. Pay" />
                  </figure>
                                  <span class="media__title">3. Pay</span>
                                  <div class="media__desc">
                                      <p>Make payment using instant and secured online process or cash on delivery.</p>
                                  </div>
                              </div>
                          </div> 
                                              <div class="col-lg-3 col-md-3 col-sm-6">
                              <div class="media media--info">
                                  <figure class="media__icon">
                    <img alt="4. Enjoy" src="images/info_icon_4.svg" title="4. Enjoy" />
                  </figure>
                                  <span class="media__title">4. Enjoy</span>
                                  <div class="media__desc">
                                      <p>Celebrate and have a good time enjoying your chosen delicacy.</p>
                                  </div>
                              </div>
                          </div> 
                                      </div>
              </div>
          </div>
      </section>
    <section class="" id="popular_restaurants">
    </section>
        {{-- <section class="section  -align-center">
        <div class="section__head">
          <div class="container container--fixed">
            <h2>Cuisines</h2>
            <p>Hungry? Have a look to the best food cuisine restaurants in your city. Order food online at Multi Cuisine Restaurants around you.</p> 
          </div>
        </div>
        <div class="section__body">
          <div class="container container--fixed">
            <ul class="slides__seven slides--seven-js">
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/cajun.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/7/300/387.svg" alt="Cajun" title="Cajun" />
                      </figure>
                      <span class="media__caption">
                        Cajun										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/indian.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/5/300/387.svg" alt="Indian" title="Indian" />
                      </figure>
                      <span class="media__caption">
                        Indian										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/french.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/6/300/387.svg" alt="French" title="French" />
                      </figure>
                      <span class="media__caption">
                        French										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/italian.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/4/300/387.svg" alt="Italian" title="Italian" />
                      </figure>
                      <span class="media__caption">
                        Italian										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/japanese.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/3/300/387.svg" alt="Japanese" title="Japanese" />
                      </figure>
                      <span class="media__caption">
                        Japanese										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/mexican.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/1/300/387.svg" alt="Mexican" title="Mexican" />
                      </figure>
                      <span class="media__caption">
                        Mexican										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/spanish.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/2/300/387.svg" alt="Spanish" title="Spanish" />
                      </figure>
                      <span class="media__caption">
                        Spanish										</span>
                    </a>  
                  </div>
                </li> 
               
                <li>
                  <div class="media media--link">
                    <a href="restaurants/cuisines/chinese.html">
                      <figure class="media__icon">
                        <img src="image/cuisines/8/300/387.svg" alt="Chinese" title="Chinese" />
                      </figure>
                      <span class="media__caption">
                        Chinese										</span>
                    </a>  
                  </div>
                </li> 
                        </ul>
          </div>
        </div>
      </section>
        <section class="" id="latest_orders">
    </section>	
  </div>   --}}

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
  
 