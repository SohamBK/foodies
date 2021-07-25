<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Register Resturent</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link rel="stylesheet" href="{{ url('css/app.css') }}"/>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  {{-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">

  <!-- Main Stylesheet File -->
  <!-- Styles -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  {{-- <link href="css/style.css" rel="stylesheet"> --}}

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <!-- <img src="img/logo.png" alt="" class="img-fluid"> -->
        <a href="#intro" class="scrollto"><h2>Foodies</h2></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">Register</a></li>
          <li><a href="#services">Key Benifits</a></li>
          {{-- <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> --}}
          {{-- <li><a href="#contact">Contact Us</a></li> --}}
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix" style="background: url({{asset('img/restaurant/intro-bg.png')}}) center bottom no-repeat">
    <div class="container">

      <div class="intro-img"><div class="overlay">
      <img src="{{asset('img/restaurant/rachel-park-366508-unsplash.jpg')}}" alt="" class="img-fluid">
      </div>
      </div>

      <div class="intro-info">
        <h2>We provide<br><span>solutions</span><br>for your business!</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Register</a>
          <a href="/login" class="btn-services scrollto">Login</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">
    @include('restaturent_layout.create')
    
    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>KEY BENIFITS</h3>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Do more business</a></h4>
              <p class="description">Foodies makes a real impact on your business. When your food is featured in the app, new customers can discover it and loyal customers can enjoy it more often.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Partner with professionals</a></h4>
              <p class="description">When you partner with Uber Eats, we're in the weeds with you. We'll get you set up, promote your menu, and work with you to improve pickup and delivery times.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">SAVE TIME</a></h4>
              <p class="description">Save time by placing your orders to every customers with one click</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Easy Set Up</a></h4>
              <p class="description">Provide us with your information and we build your order guide for you.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">MOBILE READY</a></h4>
              <p class="description">Carefully crafted responsive layout of Foodies script enables you to provide your customers a seamless experience across all desktop & mobile devices with just one website.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-clock-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Sales Report</a></h4>
              <p class="description">Get details of you restuents sale on one click and get coustemer reviews and ratings</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-users"></i>
              <div class="card-body">
                <h5 class="card-title">1 million + customers </h5>
                <p class="card-text">We have more than 1 million + customers on Foodies and are still growing faster</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-suitcase"></i>
              <div class="card-body">
                <h5 class="card-title">Do more business</h5>
                <p class="card-text">Foodies makes a real impact on your business. When your food is featured in the app, new customers can discover it and loyal customers can enjoy it more often.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-handshake-o"></i>
              <div class="card-body">
                <h5 class="card-title">Partner with professionals</h5>
                <p class="card-text">We'll get you set up, promote your menu, and work with you to improve pickup and delivery times. </p>
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1 Million +</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">12000</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">24/7</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">100 +</span>
            <p>Hard Workers</p>
          </div>
  
        </div>

      </div>
    </section>
    
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<!-----------------
      PRICEING SNIPPET START
    -------------------->
<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Basic</h5>
            <h6 class="card-price text-center">&#x20B9;3500<span class="period">/3 month</span></h6>
            <hr>
            <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Manage Restaurant Online</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Sales Reports</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Wider range of Customers Accsess</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Add Restaurent Dishes Online</li>
                <li class=""><span class="fa-li"><i class="fa fa-check"></i></span>Online payment by customer</li>
                <li class=""><span class="fa-li"><i class="fa fa-check"></i></span>Get Customer review</li>
                {{-- <li class=""><span class="fa-li"><i class="fa fa-check"></i></span>Free Subdomain</li>
                <li class=""><span class="fa-li"><i class="fa fa-check"></i></span>Monthly, Yearly Status Reports</li> --}}
              </ul>
              <form action="/subscribe" method="POST">
                @csrf
                <input type="hidden" name="plan" value="plan_EblJW9287hNM5l"/>
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                    data-key="pk_test_J40caC8xJxm9wRwZ4LFLUjiW"
                    {{-- data-amount="200" --}}
                    data-name="Foodies"
                    data-description="Secure Monthly Payment"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-label="Subscribe Now"
                    data-currency="inr"
                    {{-- data-email="{{ Auth()->check()?auth()->users()->email:null}}" --}}
                    data-panel-label="Pay monthly Rs.3500"
                    data-locale="auto">
                  </script>
                </form>
            </div>
          </div>
        </div>
        <!-- Plus Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <h5 class="card-titletext-muted text-uppercase text-center">Pro</h5>
              <h6 class="card-price text-center">&#x20B9;6000<span class="period">/ 8 months</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>Manage Restaurant online</strong></li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Sales Reports</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Wideer range of Customers Accsess</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Add Restaurent Dishes
                </li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Get customer review</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Online Payment by customer</li>
                {{-- <li><span class="fa-li"><i class="fa fa-check"></i></span>Free Subdomain</li>
                <li class=""><span class="fa-li"><i class="fa fa-check"></i></span>Monthly Status Reports</li> --}}
              </ul>
            {{-- <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a> --}}
          </div>
        </div>
      </div>
      {{-- <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
            <h6 class="card-price text-center">&#x20B9;6000<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>5 Restaurent</strong></li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Sales Reports</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Wideer range of Customers Accsess</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Add Restaurent Dishes</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Monthly Status Reports</li>
            </ul>
            {{-- <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a> 
          </div>
        </div>
      </div> --}}
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
            <h6 class="card-price text-center">&#x20B9;10,000<span class="period">/12 month</span></h6>
            <hr>
            <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>Manage Restaurant online</strong></li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Sales Reports</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Wideer range of Customers Accsess</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Add Restaurent Dishes
                </li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Get customer review</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Online Payment by customer</li>
            </ul>
            {{-- <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-----------------
  PRICEING SNIPPET END
-------------------->
    <!--==========================
      Clients Section
    ============================-->
    {{-- <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
              <div class="testimonial-item">
                <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
              </div>
    
              <div class="testimonial-item">
                <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
              </div>

            </div>

          </div>
        </div>


      </div>
    </section> #testimonials --> --}}

    <!--==========================
      Team Section
    ============================-->
    {{-- <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div> --}}
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    {{-- <section id="clients" class="section-bg">

      <div class="container">

        <div class="section-header">
          <h3>Our CLients</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque dere santome nida.</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-1.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-2.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-3.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-4.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-5.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-6.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-7.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="img/clients/client-8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section> --}}

    <!--==========================
      Contact Section
    ============================-->
    {{-- <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>Lokmanyaka Nagar, Thane-400606</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>sohambalekar123@gmail.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+ 8454081359</p>
              </div>
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main> --}}

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Foodies</h3>
            <p>Foodies gives is the easy way to get the food you love delivered.</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              {{-- <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li> --}}
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Lokmanyak Nagar <br>
              Thane-400606<br>
              Maharashtra, India <br>
              <strong>Phone:</strong> + 8454081359<br>
              <strong>Email:</strong> sohambalekar123@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            {{-- <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form> --}}
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Foodies</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
       
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer> #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src={{asset('lib/owlcarousel/owl.carousel.min.js')}}></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src={{asset('js/restaurant_main.js')}}></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"> </script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script>
      $(document).ready(function(){
          $("#test").select2({
                    });
          
          $("#checkbox").click(function(){
            if($("#checkbox").is(':checked') ){
                $("#test > option").prop("selected","selected");
                $("#test").trigger("change");
            }else{
                $("#test > option").prop("selected","");
                $("#test").trigger("change");
            }
        });
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
                          //console.log(options);
                        //  for(i=0;i < data.length; i++){
                        // //  // console.log(data[i]);
                        // /   options += data[i]+', ';
                        //  };
                        // $("[name='to']").text(emails)
  
                        // data.forEach(function(element) {  
                        //       console.log(element);  
                        //       $("[name='to']").appendTo(element)
                        //   });
  
                       // $("[name='to']").val(data);
                      //  $("[name='to']").each(function(){
  
                      //  });                                                               
                      }
                  });
          });
     });
  
      </script>
      
    <script type="text/javascript">
      console.log('hii');
          $('#go').add(function(){go(50)});
  
          //setTimeout(function(){go(500)},7000);
          //setTimeout(function(){go(5000)},20000);
  
          function go(nr) {
            $('.bb').fadeToggle(200);
            $('.message').toggleClass('comein');
            $('.check').toggleClass('scaledown');
            $('#go').fadeToggle(nr);
          }
      </script>

</body>
</html>
