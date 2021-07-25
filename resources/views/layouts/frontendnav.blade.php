<!doctype html>
  <html>
      
  <!-- Mirrored from demo.yoyumm.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Feb 2019 08:33:00 GMT -->
  <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
  <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
          <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" /> 
            <link rel="shortcut icon" href="image/site-favicon/conf_fav_icon.png">
      <title>Check The Live Demo Of An Online Food Ordering &amp; Delivery Platform - YoYumm | YoYumm</title>
  <meta name="keywords" content="food ordering platform demo, food delivery software demo, online food marketplace demo" />
  <meta name="description" content="Check the demo of YoYumm food ordering and delivery platform to understand, how the platform works, features list, &amp; other technical know-how.  Contact FATbit at +918591919191 for any of your queries." />
          <script type="text/javascript">
        var loadingMessage ='Loading...';
        var processingMessage ='Processing...';
              var cart_is_empty = 'Your Cart Is Empty';
              var confirm_yes = 'Yes';
              var confirm_no = 'No';
              var image_removed = 'Image Removed';
              var cannot_determine_address = 'Cannot Determine Address';
              var webRootUrl = 'index.html';
              var invalidItemCountMsg = 'Invalid Item Count';
          </script>
          <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

          <link rel="stylesheet" href="{{ url('css/index64e4.css') }}"/>
         
  <script type="text/javascript">
          var siteConstants = {"webroot":"\/","webroot_traditional":"\/public\/index.php?url=","rewritingEnabled":"1"};
          </script>
                 <script src={{asset('js/indexd056.php')}}></script>
  
                <script src={{asset('js/index7d0e.php')}}></script>
  
          <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet" /> 
          <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin-ext" rel="stylesheet" /> 

          {{-- Bootstrap cdn --}}
        
    </head>
      <body>
          <header id="header" class="header">
              <div class="container container--fixed">
                        <a href="javascript:void(0)" class="toggle--nav"><span></span></a>
                        <figure class="logo">
            <a href="/">
              <h3>Foodies<h3>
            </a>
          </figure>
                  <div class="header__actions">
                      <span class="txt--light txt--nos -float-left hide--mobile">+91-8454081359</span>
                      <span class="overlay overlay--nav"></span>
            <nav class="nav nav--primary"> 
    <ul>
        {{-- <li><a href="/restaurants"  data-hover="Restaurants" target="/restaurants">Restaurants</a></li> --}}
        <li><a href="/about"  data-hover="About us" target="">About us</a></li>
    </ul>
        @if(Auth::user())
        <li><a href="/member"  data-hover="Dashboard" target="">dashboard</a></li>
    	@endif
        <ul>
      <li>
          <a href="rest/create" title="Add Restaurant">Add Restaurant</a>
      </li>
     </ul>	
    </nav>
    
    <nav class="nav nav--secondary">	
      <ul> 
        <?php if(Auth::user()){ ?>
            <li class="nav__link--primary"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    Logout
                  </a>    
                  <form id="frm-logout" action="{{ route('logout') }}" method="POST"           style="display: none;">
                    {{ csrf_field() }}
                  </form></li>
        <?php }else{ ?>
            <li class="nav__link--primary"><a href="/login" title="Login"><img alt="User" src="images/icon_user.svg" title="User" /> Login</a> | <a class="hide--mobile" title="Register Here" href="/register">Register</a></li>
        <?php } ?>
 
               <li class="nav__link--cart"><a href="/cart" class="js-cart-count"><img alt="Cart" src="http://demo.yoyumm.com/images/icon_cart.svg" title="Cart" /> <span class=" cart_total count js-cart-total"></span></a></li>
             </ul>
    </nav>
                  </div>
              </div>
          </header>


          <div> 
            <main class="py-4">
              @yield('content')
            </main>
          </div>


          <footer id="footer" class="footer">
            <section class="section section--footer">
            <div class="container container--fixed">
                <div class="section--footer-upper">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6 class="toggle toggle--trigger toggle--trigger-js">Information</h6>
                            <div class="toggle__target toggle__target-js">
                                <ul class="links--vertical">
                                    <div class="gridcontent"><ul class="footerlinks"><li><a href="/about" target="">About us</a></li>
                                        {{-- <li><a href="cms/view/team/27.html" target="">Our Team</a></li> --}}
                                            <li><a href="/contactus" target="">Contact Us</a></li></ul></div></aside> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <h6 class="toggle toggle--trigger toggle--trigger-js">My Acccount</h6>
                            <div class="toggle__target toggle__target-js">
                                <ul class="links--vertical">
                                    <li><a href="/member">My Orders</a>
                                    </li>
                      
                            
                                    <li><a href="/member">My Account</a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <h6 class="toggle toggle--trigger toggle--trigger-js">Popular Cities</h6>
                            <div class="toggle__target toggle__target-js">
                                <ul class="links--vertical links--vertical-half">
                                                                        <li><a href="restaurants/city/california.html" >California</a>
                                        </li>
                                                                            <li><a href="restaurants/city/florida.html" >Florida</a>
                                        </li>
                                                                            <li><a href="restaurants/city/new%20jersey.html" >New Jersey</a>
                                        </li>
                                                                            <li><a href="restaurants/city/kentucky.html" >Kentucky</a>
                                        </li>
                                                                            <li><a href="restaurants/city/ohio.html" >Ohio</a>
                                        </li>
                                                                            <li><a href="restaurants/city/new%20york.html" >New York</a>
                                        </li>
                                                                            <li><a href="restaurants/city/connecticut.html" >Connecticut</a>
                                        </li>
                                                                            <li><a href="restaurants/city/chandigarh.html" >chandigarh</a>
                                        </li>
                                         
                                </ul>
                            </div>
                        </div> --}}
                                  
                <div class="col-lg-6 col-md-6 hide--desktop">
                  <h6 class="toggle toggle--trigger toggle--trigger-js"><span class="current-lang">English</span></h6>
                  <div class="toggle__target toggle__target-js">
                      <ul class="links--vertical">
                          <li class="active">
                            <a href="index.html" >English</a>
                          </li>
                      </ul>
                  </div>
                </div>
                              </div>
                </div>
                <div class="section--footer-lower">
                    <div class="row">
                      
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 -align-right -float-right hide--mobile">
                  <div class="dropdown">
                    <a href="javascript:void(0)" class="btn btn--large btn--black btn--dropdown dropdown__link-js">
                      <span class="current-lang">English</span>
                    </a>
                    <div class="dropdown__target dropdown__target-js" style="display:none;">
                      <ul class="links--vertical">
                         
                         
                                            {{-- <li >
                          
                          <a href="index.html" >Arabic</a>
                        </li>
                       
                                            <li >
                          
                          <a href="index.html" >Spanish</a>
                        </li> --}}
                       
                      </ul>
                    </div>
                  </div>
                </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="links--socials">
                                                            <li class="fb">
                                    <a href="#" target="_blank">
                                        <svg viewBox="0 0 7 17" height="17" width="7" xmlns="http://www.w3.org/2000/svg">
                                        <path transform="translate(-1179 -5715)" d="M1185.74,5723.5h-2.12v8.49h-3.13v-8.49H1179v-3h1.49v-1.95c0-1.38.59-3.56,3.16-3.56l2.32,0.01v2.91h-1.68a0.687,0.687,0,0,0-.67.82v1.77h2.39Z" fill="#fff"/>
                                        </svg>
                                    </a>
                                </li>
                                                                                        <li class="tw">
                                    <a href="#" target="_blank" >
                                        <svg viewBox="0 0 17 14" height="14" width="17" xmlns="http://www.w3.org/2000/svg">
                                        <path transform="translate(-1317 -5724)" d="M1332.26,5727.47c0.01,0.16.01,0.31,0.01,0.46a9.933,9.933,0,0,1-9.93,10.06,9.83,9.83,0,0,1-5.35-1.59,5.919,5.919,0,0,0,.84.05,6.942,6.942,0,0,0,4.33-1.51,3.492,3.492,0,0,1-3.26-2.46,2.842,2.842,0,0,0,.66.07,3.585,3.585,0,0,0,.92-0.13,3.517,3.517,0,0,1-2.8-3.47v-0.04a3.254,3.254,0,0,0,1.58.44,3.52,3.52,0,0,1-1.55-2.94,3.582,3.582,0,0,1,.47-1.78,9.869,9.869,0,0,0,7.19,3.7,3.591,3.591,0,0,1-.09-0.81,3.488,3.488,0,0,1,6.04-2.42,6.831,6.831,0,0,0,2.21-.86,3.533,3.533,0,0,1-1.53,1.96,6.467,6.467,0,0,0,2-.56A6.892,6.892,0,0,1,1332.26,5727.47Z" fill="#fff"/>
                                        </svg>
                                    </a>
                                </li>
                                                                                        <li class="gl">
                                    <a href="#" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 491.858 491.858" style="enable-background:new 0 0 491.858 491.858;" xml:space="preserve" width="512px" height="512px">
    <g>
        <g>
            <path d="M377.472,224.957H201.319v58.718H308.79c-16.032,51.048-63.714,88.077-120.055,88.077     c-69.492,0-125.823-56.335-125.823-125.824c0-69.492,56.333-125.823,125.823-125.823c34.994,0,66.645,14.289,89.452,37.346     l42.622-46.328c-34.04-33.355-80.65-53.929-132.074-53.929C84.5,57.193,0,141.693,0,245.928s84.5,188.737,188.736,188.737     c91.307,0,171.248-64.844,188.737-150.989v-58.718L377.472,224.957L377.472,224.957z" fill="#FFFFFF"/>
            <polygon points="491.858,224.857 455.827,224.857 455.827,188.826 424.941,188.826 424.941,224.857 388.91,224.857      388.91,255.74 424.941,255.74 424.941,291.772 455.827,291.772 455.827,255.74 491.858,255.74    " fill="#FFFFFF"/>
        </g>
    </g>
    </svg>
                                    </a>
                                </li>
                                                                                        <li class="yt">
                                    <a href="#" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 30 38">
      <path  d="M26.157,3.895A14.673,14.673,0,0,0,15.919,0C9.847,0,6.113,2.478,4.049,4.557a13.437,13.437,0,0,0-4,9.333c0,4.231,1.777,7.478,4.753,8.686a1.58,1.58,0,0,0,.6.123,1.329,1.329,0,0,0,1.3-1.065c0.1-.376.333-1.305,0.434-1.708A1.6,1.6,0,0,0,6.7,18.192a5.509,5.509,0,0,1-1.262-3.774,9.521,9.521,0,0,1,9.892-9.563c5.1,0,8.265,2.885,8.265,7.53a15.591,15.591,0,0,1-1.786,7.643c-0.8,1.388-2.207,3.043-4.367,3.043a2.9,2.9,0,0,1-2.3-1.048,2.628,2.628,0,0,1-.464-2.291c0.227-.958.537-1.957,0.837-2.923a18.021,18.021,0,0,0,1.064-4.76c0-2.274-1.4-3.8-3.493-3.8-2.655,0-4.735,2.685-4.735,6.113A9.058,9.058,0,0,0,9,17.782c-0.334,1.411-2.322,9.8-2.7,11.383-0.218.924-1.531,8.218,0.643,8.8,2.443,0.654,4.626-6.451,4.848-7.253,0.18-.653.81-3.122,1.2-4.639a7.4,7.4,0,0,0,4.925,1.9,11,11,0,0,0,8.819-4.394,17.586,17.586,0,0,0,3.316-10.785A12.411,12.411,0,0,0,26.157,3.895Z" fill="#FFFFFF"/>
    </svg>
                                    </a>
                                </li>
                                               
                            </ul>
                        </div>
                    </div>
                    <div class="row row--last">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span class="txt--light txt--nos hide--desktop">+91-8454081359</span>
                            <p>Copyright © 2018-2019 Foodies.com</p>
                        </div>
                        <div class="col-lg-6 col-md-6 "><img class="-float-right" src="images/cards.png" alt=""></div>
                    </div>    
                </div> 
            </div>
        </section>	
    </footer>
    <style> .fixed-demo-btn{line-height:1.8;position:fixed;right:-100px;top:300px;z-index:10;background:#4ca146;border-radius:2px 2px 0 0;-ms-transform:rotate(-90deg);-webkit-transform:rotate(-90deg);transform:rotate(-90deg);display:block;height:50px;width:228px;color:#ffffff !important;font-size:20px;font-weight:500;text-align:center}
    #btn-demo{color:#ffffff !important;font-size:20px;}
    </style>
   
    <script>
    $(document).ready(function(){
        $(".js-disc-inline").modaal(); 
    });
    </script>
                                
    <script>

    
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','../www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-111564646-1', 'auto'); ga('send', 'pageview'); </script><div class="popup--custom"  >
        <div class="popup__overlay">
            <div class="popup__content" id="custom-popup-content">
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript">
        availableCities = ["California","chandigarh","Connecticut","Florida","Kentucky","Maine","New Jersey","New York","Ohio","South Carolina","Texas","Washington"];
        $(document).ready(function () {
            updateCartCount([]);
        });
    </script>  --}}
    </body>
    </html>