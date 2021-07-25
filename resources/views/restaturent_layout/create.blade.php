
<!--==========================
      Register
    ============================-->
    <style>
    li.select2-selection__choice {
        background-color: #3490dc !important;
        font-size: 17px;
        color: white;
    }
    .select2-selection__choice__remove {
        color: black !important;
        font-size:20px;
    }
    </style>
    <section id="about">
      <div class="container">
          <header class="section-header">
              <h3>Register</h3>
              <p>The fast way to
                get food to your customers</p>
          </header>

          @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
          @endif
        <form method="POST" action="/rest">
            @csrf
            <div class="h4">Restaurent Details</div>
            <div class="form-group">
                <label for="name">Restaurent Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
            </div>
          <div class="form-row">
              {{-- <div class="col-md-3">  
                  <div class="form-group">
                      <label for="city">Number of Outlet</label>
                      <select class="form-control" name="area" >
                        <option  value="">Select Number of Outlet Here...</option>
                        <option  value="2">2</option>
                        <option value="5">5 +</option>
                        <option value="10">10 +</option>
                        <option value="15">15 +</option>
                      </select>
                  </div>
                </div> --}}
            <div class="col-md-4">  
              <div class="form-group">
                  <label for="zip_code">Zip Code</label>
                  <input type="number" name="zip_code" class="form-control {{$errors->has('zip')?'is-invalid':''}}" required value="{{old('zip')}}">
              </div>
            </div>
            <div class="col-md-4">  
              <div class="form-group">
                  <label for="city_id">Select City</label>
                  <select class="form-control city" name="city_id" required>
                    <option  value="">Select City Here...</option>
                    @foreach($cities as $city)
                      <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">  
              <div class="form-group">
                  <label for="area_id">Select Area</label>
                  <select class="form-control cityarea" name="area_id" required>
                    <option  value="">Select Location Here...</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" name="address" class="form-control {{$errors->has('address')?'is-invalid':''}}" required value="{{old('address')}}">{{old('address')}}</textarea>
          </div>
          <div class="form-row">
            <div class="col-md-6">  
              <div class="form-group">
                  <label for="city">Select Category</label>
                  <select id="test" class='form-control' name="category[]" required  multiple>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="website_address">Website address</label>
                  <input type="url" name="website_address" class="form-control {{$errors->has('website_address')?'is-invalid':''}}" >
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">  
  
            <div class="form-group">
                <label for="shop_register_number">Shop Registration Number</label>
                <input type="text" name="shop_register_number" class="form-control {{$errors->has('shop_register_number')?'is-invalid':''}}" required value="{{old('shop_register_number')}}">
            </div>              
            </div>
            <div class="col-md-4">  
              
            <div class="form-group">
                <label for="gstn">GSTN Number</label>
                <input type="number" name="gstn" class="form-control {{$errors->has('gstn')?'is-invalid':''}}" required value="{{old('gstn')}}">
            </div>
            </div>
            <div class="col-md-4">  
            <div class="form-group">
                <label for="fssai">FSSAI Number</label>
                <input type="number" name="fssai" class="form-control {{$errors->has('fssai')?'is-invalid':''}}" required value="{{old('fssai')}}">
            </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
                <label for="fssai">Weekly Off</label>
                <select id="test" class='form-control' name="weekly_off">
                  <?php $days = ['Sunday','Monday', 'Tuesday', 'wensday', 'Thursday', 'Friday', 'saturday'] ?>
                  <option value="">Select Weekly Off</option>
                    <?php foreach($days as $day){ ?>
                      <option value="{{$day}}">{{$day}}</option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Payment Method</label>
                    <select class="form-control" name="payment_method" required>
                      <option value="">Select payment method</option>
                      <option  value="{{App\Restaurent::STATUS_CASH_ON_DELIVERY}}" >Cash On Delivery</option>
                      <option  value="{{App\Restaurent::STATUS_ONLINE_PAYMENT}}" >Online Payment</option> 
                      <option  value="{{App\Restaurent::STATUS_BOTH}}" >Both Payment method</option>
                    </select>
                  </div>
            </div>
          </div>
              
          
          <div class="form-row">
          <div class="col-md-6">
          
            <label>Restaurent opens at Time</label>
          <input type="time" name="start_time" value=>
          </div>
          <div class="col-md-6">
              <label>Restaurent closes at Time</label>
              <input type="time" name="end_time" value=>
          </div>
        </div>


          <hr>

            <div class="h4">Register Account Details</div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" required value="{{old('username')}}">
              </div>
              <div class="form-row">
              <div class="col-md-6">  
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" required value="{{old('email')}}">
              </div>
            </div>
            <div class="col-md-6">  
              <div class="form-group">
                  <label for="mobile">Mobile Number</label>
                  <input type="number" name="mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" required value="{{old('mobile')}}">
              </div>
            </div>
        </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" required value="{{old('password')}}">
              </div>
                
              <button class="btn btn-primary" type="submit">Register</button>
        </form>
      </div>
    </section>
    @if($success)
    <style>
      @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400);
          /* body, html {
            height: 100%;
            font-size: 20px;
            font-family: Source Sans Pro;
          } */

          .b, .bb {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url("https://i.imgur.com/kje4L5j.jpg");
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
          }

          .bb {
            background: url("https://i.imgur.com/bDBs0et.jpg");
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            display: none;
          }

          #go {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translate(-50%, 0%);
            color: white;
            border: 0;
            background: #71c341;
            width: 100px;
            height: 30px;
            border-radius: 6px;
            font-size: 1rem;
            transition: background 0.2s ease;
            outline: none;
          }
          #go:hover {
            background: #8ecf68;
          }
          #go:active {
            background: #5a9f32;
          }

          .message {
            position: absolute;
            top: -200px;
            left: 50%;
            transform: translate(-50%, 0%);
            width: 350px;
            background: white;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            font-weight: 300;
            color: #2c2928;
            opacity: 0;
            transition: top 0.3s cubic-bezier(0.31, 0.25, 0.5, 1.5), opacity 0.2s ease-in-out;
          }
          .message .check {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%) scale(4);
            width: 120px;
            height: 110px;
            background: #71c341;
            color: white;
            font-size: 3.8rem;
            padding-top: 10px;
            border-radius: 50%;
            opacity: 0;
            transition: transform 0.2s 0.25s cubic-bezier(0.31, 0.25, 0.5, 1.5), opacity 0.1s 0.25s ease-in-out;
          }
          .message .scaledown {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
          }
          .message p {
            font-size: 1.1rem;
            margin: 25px 0px;
            padding: 0;
          }
          .message p:nth-child(2) {
            font-size: 2.3rem;
            margin: 40px 0px 0px 0px;
          }
          .message #ok {
            position: relative;
            color: white;
            border: 0;
            background: #71c341;
            width: 100%;
            height: 50px;
            border-radius: 6px;
            font-size: 1.2rem;
            transition: background 0.2s ease;
            outline: none;
          }
          .message #ok:hover {
            background: #8ecf68;
          }
          .message #ok:active {
            background: #5a9f32;
          }

          .comein {
            top: 150px;
            opacity: 1;
          }
      </style>
    <div class='b'></div>
    <div class='bb'></div>
    <button id='go'>
      GO
    </button>
    <div class='message'>
      <div class='check'>
        &#10004;
      </div>
      <p>
        Success
      </p>
      <p>
        You'r account is created successfully. So please login with registered email and password.
      </p>
      <button id='ok'>
        <a href="/login">Login</a>
      </button>
    </div>
    @endif
<!-- #about -->
