@extends('layouts.dashboard')
@section('page_title','View')
@section('content')
@if(Session::has('message'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
  <div class="card">
    <div class="card-header">
      <div class="row">

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
                  <div style="margin-left:100px">
                    {{-- <header class="section-header">
                        <h3>Register</h3>
                        <p>The fast way to
                          get food to your customers</p>
                    </header> --}}
          
                    @if($errors->any())
                      <div class="alert alert-danger" role="alert">
                          <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                          </ul>
                      </div>
                    @endif
                  <form method="POST" action="/restaurent" enctype = 'multipart/form-data'>
                      @csrf
                      <div class="h4 text-center">Update Restaurent Details</div>
                      <div class="form-group">
                          <label for="name">Restaurent Name</label>
                          <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')?old('name'):$restaurent->name}}">
                      </div>
                      <br>
                   <div class="form-row">
                        {{--  <div class="col-md-3">  
                            <div class="form-group">
                                <label for="city">Number of Outlet</label>
                                <select class="form-control" name="number_of_outlet" required value="{{old('number_of_outlet')?old('number_of_outlet'):$restaurent->number_of_outlet}}">
                                  <option  value="">Select Number of Outlet Here...</option>
                                  <option  value="2" {{($restaurent->number_of_outlet=='2')?'selected':''}}>2</option>
                                  <option value="5" {{($restaurent->number_of_outlet=='5+')?'selected':''}}>5 +</option>
                                  <option value="10" {{($restaurent->number_of_outlet=='10+')?'selected':''}}>10 +</option>
                                  <option value="15" {{($restaurent->number_of_outlet=='15+')?'selected':''}}>15 +</option>
                                </select>
                            </div>
                          </div> --}}
                      <div class="col-md-4">  
                        <div class="form-group">
                            <label for="zip_code">Zip Code</label>
                            <input type="number" name="zip_code" class="form-control {{$errors->has('zip')?'is-invalid':''}}" required value="{{old('zip_code')?old('zip_code'):$address->zip_code}}">
                        </div>
                      </div>
                      <div class="col-md-4">  
                        <div class="form-group">
                            <label for="city_id">Select City</label>
                            <select class="form-control city" name="city_id" required value="{{old('city_id')?old('city_id'):$restaurent->city_id}}">
                              <option  value="">Select City Here...</option>
                              @foreach($cities as $city)
                                <option value="{{$city->id}}" {{($address->city_id == $city->id)?'selected':''}}>{{$city->name}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">  
                        <div class="form-group">
                            <label for="area_id">Select Area</label>
                            <select class="form-control cityarea" name="area_id" value="{{old('area_id')?old('area_id'):$address->area_id}}">
                              <option  value="">Select Location Here...</option>
                              <?php
                                  $area = App\CityArea::find($address->area_id);
                              ?>
                              <option value="{{$area->id}}" selected>{{$area->name}}</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea type="text" name="address" class="form-control {{$errors->has('address')?'is-invalid':''}}" required value="{{old('address')?old('address'):$address->address}}">{{old('address')?old('address'):$address->address}}</textarea>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6">  
                        <div class="form-group">
                            <label for="city">Select Category</label>
                            <select id="test" class='form-control' name="category[]" required  multiple>
                              @foreach($categories as $category)
                                <option value="{{$category->id}}" {{in_array($category->id,explode('|',$restaurent->category))?'selected':''}}>{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_address">Website address</label>
                            <input type="url" name="website_address" class="form-control {{$errors->has('website_address')?'is-invalid':''}}" required value="{{old('website_address')?old('website_address'):$restaurent->website_address}}">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">  
                    {{-- <div class="form-group">
                        <label for="kitchen_id"> Restaurent Image</label>
                          <input type="file" required name="kitchen_id"/>
                    </div> --}}
                    <div class="form-group">
                        <label for="media_id">Images</label>
                        @if($restaurent->image)
                        <div style="width:100%;height:150px">
                            <i class="fa fa-times icon-times"></i>
                            <img style="height:150px" src="{{asset('/storage/uploads/'.$restaurent->image->file_name)}}"/>
                        </div>
                        <br/>
                        @endif
                      <input type="file" {{$restaurent->image?'':'required'}} name="kitchen_id"/>
                  </div>
                  </div>
                  {{-- <div class="col-md-6">  
                    <div class="form-group">
                        <label for="facade_id"> Facade Image</label>
                          <input type="file" required name="facade_id"/>
                    </div>
                  </div> --}}
                </div>
                <br>
                {{-- <div class="form-row">
                    <div class="col-md-6">  
                <div class="form-group">
                    <label for="dp_id"> Dining Image</label>
                      <input type="file" required name="dp_id"/>
                </div>
              </div>
              <div class="col-md-6">  
                <div class="form-group">
                    <label for="locality_id"> Locality Image</label>
                      <input type="file" required name="locality_id"/>
                </div>
              </div>
            </div> --}}
                    <div class="form-row">
                      <div class="col-md-4">  
            
                      <div class="form-group">
                          <label for="shop_register_number">Shop Registration Number</label>
                          <input type="text" name="shop_register_number" class="form-control {{$errors->has('shop_register_number')?'is-invalid':''}}" required value="{{old('shop_register_number')?old('shop_register_number'):$restaurent->shop_register_number}}">
                      </div>              
                      </div>
                      <div class="col-md-4">  
                        
                      <div class="form-group">
                          <label for="gstn">GSTN Number</label>
                          <input type="number" name="gstn" class="form-control {{$errors->has('gstn')?'is-invalid':''}}" required value="{{old('gstn')?old('gstn'):$restaurent->gstn}}">
                      </div>
                      </div>
                      <div class="col-md-4">  
                      <div class="form-group">
                          <label for="fssai">FSSAI Number</label>
                          <input type="number" name="fssai" class="form-control {{$errors->has('fssai')?'is-invalid':''}}" required value="{{old('fssai')?old('fssai'):$restaurent->fssai}}">
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
                                <option value="{{$day}}" {{($restaurent->weekly_off == $day)?'selected':''}}>{{$day}}</option>
                              <?php } ?>
                          </select>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Payment Method</label>
                              <select class="form-control" name="payment_method" required>
                                <option value="">Select Payment method</option>
                                <option  value="{{App\Restaurent::STATUS_CASH_ON_DELIVERY}}" {{($restaurent->payment_method == App\Restaurent::STATUS_CASH_ON_DELIVERY)?'selected':''}}>Cash On Delivery</option>
                                <option  value="{{App\Restaurent::STATUS_ONLINE_PAYMENT}}" {{($restaurent->payment_method == App\Restaurent::STATUS_ONLINE_PAYMENT)?'selected':''}}>Online Payment</option> 
                                <option  value="{{App\Restaurent::STATUS_BOTH}}" {{($restaurent->payment_method == App\Restaurent::STATUS_BOTH)?'selected':''}}>Both Payment method</option>
                              </select>
                            </div>
                      </div>
                    </div>
                        
                    
                    <div class="form-row">
                    <div class="col-md-6">
                    <?php $time = explode(' - ',$restaurent->timing); ?>
                      <label>Restaurent opens at Time</label>
                    <input type="time" name="start_time" value="{{$time[0]?$time[0]:''}}">
                    </div>
                    <div class="col-md-6">
                        <label>Restaurent closes at Time</label>
                        <input type="time" name="end_time" value="{{$time[1]?$time[1]:''}}">
                    </div>
                  </div>
          
                    <hr>
          
                      <div class="h4">Register Account Details</div>
                  <input type="hidden" name="uid" value="{{$user->id}}">
                  <input type="hidden" name="rid" value="{{$restaurent->id}}">
                  <input type="hidden" name="aid" value="{{$address->id}}">
                      <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" required value="{{old('username')?old('username'):$user->username}}">
                        </div>
                        <div class="form-row">
                        <div class="col-md-6">  
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" required value="{{old('email')?old('email'):$user->email}}">
                        </div>
                      </div>
                      <div class="col-md-6">  
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="number" name="mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" required value="{{old('mobile')?old('mobile'):$user->mobile}}">
                        </div>
                      </div>
                  </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                        <input type="text" value="" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" value="{{old('password')}}">
                        </div>
                          
                        <button class="btn btn-primary" type="submit">Register</button>
                  </form>
                </div>
              </section>

      </div>
    </div>   
</div>
</div>
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
                      }
                  });
          });
     });
  
      </script>

@endsection