@extends('layouts.frontendnav')
@section('content')    

<section class="section">
  <div class="container container--fixed  container--colums container--narrow"> 
      <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-7" id="review-hide">
              <div class="box">
                   <div class="box__head"><h6>Review Your Order</h6></div>
                   <div class="box__body space">
                         <div class="selection">
                          <label class="selection__label">
                            <span class="radio">
                                <input type="radio" value="2" name="order_type" onchange="showTiming(this.value)" checked=""><i class="input-helper"></i>
                            </span>
                            <h6>Cast On Delivery</h6>
                          </label>
                          <p><small class="txt--small txt--light">Your Order Will Be Delivered To Your Address Then You Have To Pay.</small></p>
                      </div>
                        <div class="selection">
                          <label class="selection__label">
                            <span class="radio">
                                <input type="radio" value="1" name="order_type" onchange="showTiming(this.value)"><i class="input-helper"></i>
                            </span>
                            <h6>Pay Now</h6>
                          </label>
                             <p><small class="txt--small txt--light">Your Order Will Be Delivered To Your Address.
                                 </small></p>
                      </div>

                      {{-- <div class="col-md-4">  
                          <div class="form-group">
                              <label for="zip_code">Zip Code</label>
                              <input type="number" name="zip_code" class="form-control {{$errors->has('zip')?'is-invalid':''}}" required >
                          </div>
                        </div>
                        <div class="col-md-4">  
                          <div class="form-group">
                              <label for="city_id">Select City</label>
                              <select class="form-control city" name="city_id" required >
                                <option  value="">Select City Here...</option>
                                @foreach($cities as $city)
                                  <option value="{{$city->id}}"></option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">  
                          <div class="form-group">
                              <label for="area_id">Select Area</label>
                              <select class="form-control cityarea" name="area_id" >
                                <option  value="">Select Location Here...</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea type="text" name="address" class="form-control"  required></textarea>
                      </div> --}}
                        {{-- <div id="delivery-timing">
           <h2 class="info-titl">Delivery Time</h2>
                                 
               <div class="fom-row">
                 <div class="radio">
                   <label>
                   <input type="radio" value="1" name="delivery_type" checked="">
                   <i class="input-helper"></i>
                   As Soon As Possible</label>
                 </div>
                 
                 <p>Estimated Delivery Time: 02:00 Hour </p>
               </div>
                                                                     </div> --}}
                                                                         <div id="pickup-timing" style="display:none;">
           <h2 class="info-titl">Pickup Time</h2>
                               <div class="fom-row">
               <div class="radio">
                 <label>
                 <input type="radio" value="1" name="pickup_type" checked="">
                 <i class="input-helper"></i>
                 As Soon As Possible</label>
               </div>
             </div>
                                                           </div>
                                           </div>

                                           
          <div class="col-lg-12 col-md-12 col-sm-7" id="review-hide">
              {{-- address --}}
              <h5>Add Address</h5>
                <div class="col-lg-12">  
                    <label for="address">Address</label>
                    <textarea type="text" name="address" class="form-control"></textarea>
                </div>
              <div class="col-md-4">  
                  <div class="form-group">
                      <label for="zip_code">Zip Code</label>
                      <input type="number" name="zip_code" class="form-control">
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
                <button style="margin-top:30px;" class="btn btn-primary btn-xs add-address">Add Address</button>
             
              {{-- address ends --}}
          </div>
               </div>
          </div>
           <div id="order-section">		<div class="col-lg-4 col-md-4 col-sm-5"> 
 <div class="js-menu-item-container"> 
<div class="box box--bordered box--bordered-first">
<div class="box__head">
<h6>Restaurant</h6>


</div>

{{-- address --}}
  

{{-- address ends --}}

<div class="box__body">

{{-- <div class="dropdown">
      
   <a href="javascript:void(0)" class="dropdown__link dropdowns__link-js" title="The Aroma Angel">
   The Aroma Angel 
     <span class="location">
       73, Highway City, Fresno, California						</span>
   </a>


<div class="dropdown__target--white dropdown__target--white-js" style="display: none;">
  <div class="scroll-box scroll-box-js" tabindex="0" style="width: 90px; padding-right: 10px; outline: none; overflow: hidden;">
             <ul class="links--vertical links--vertical-multlevel">
                   <li class="active">
         <a href="/restaurant/menu/the-aroma-angel/3" title="The Aroma Angel">The Aroma Angel (1)</a>
         <ul>
                               <li><a title="Breakfast (The Aroma Angel)" href="/order/review/1/3">Breakfast ($24)</a></li>
                           </ul>
       </li>				 </ul>
   
</div><div style="position: absolute; z-index: 1; margin: 0px; padding: 0px; display: none; left: 100px; top: 0px;"><div class="enscroll-track scroll__track" style="position: relative;"><a href="" class="scroll__handle" style="position: absolute; z-index: 1;"><div class="top"></div><div class="bottom"></div></a></div></div>
</div>
</div>
</div>
</div>
<script type="text/javascript"> 
$(".dropdowns__link-js").click(function () { $(".dropdown__target--white-js").fadeToggle();	    });  
if($(window).width()>1200){
$('.scroll-box-js').enscroll({
verticalTrackClass: 'scroll__track',
verticalHandleClass: 'scroll__handle'
});
}  
</script></div>
 <span class="-gap"></span>
 <div class="cupn clearfix">
   <label onclick="showPromoCode()">Enter Coupon Code</label>
   <div class="apply-code-input" style="display:none">
     <input type="text" name="promo_code" value="" id="promo_code">
     <input type="button" name="apply" onclick="applyPromoCode()" value="Apply" class="btn btn--primary ">
     <span style="display:none" id="code_msg"></span>
     <span class="remove_coupon" style="display:none">
       <input type="button" name="apply" onclick="removePromoCode()" value="Remove" class="btn btn--primary">
     </span>
   </div>
 </div> --}}
 <span class="-gap"></span>
 <div class="wrap--bordered wrap--bordered-even" id="order_review_cart">
           <h6 class="space">Your Cart</h6>
   <div class="row-container row-container--scroller row-container--scroller-js" tabindex="0" style="width: 335px; max-width:1000px; padding-right: 10px;">
     
      <?php $sub_total = 0; ?>
          @foreach($cart_product as $cp)
         <div class="row__repeated">
           <div class="row__repeated-group">
             <div class="cell__left">
             <span class="item__title">{{$cp->name}}</span>
             </div>
             <div class="cell__right">
               <?php $sub_total = $sub_total + ($cp->price * $cart[$cp->id]['quantity']) ?>
             <span class="item__price">Rs. {{($cp->price * $cart[$cp->id]['quantity'])}}</span>
             </div>
           </div>

            
           <div class="row__repeated-group set-vlue">
              <div class="cell__left">
              <div class="qty-action">
              <input type="text" class="qty__input js-chk-valid-qty" readonly value="{{$cart[$cp->id]['quantity']}}">
              </div>
            </div>
             {{-- <div class="cell__left">
               <div class="qty-action">
                <input type="text" class="qty__input js-chk-valid-qty" value="1" id="item_231_54_0">
                <a href="javascript:void(0)" class="qty__link" onclick="updateCart({page:'order_review',menu_item: '231', cart_item_key: '0',prod_size:'54', action: 'update', cart_id: '1'},'item_231_54_0');"></a>
               </div>
             </div>
             <div class="cell__right">
               <a href="javascript:void(0);" class="qty__remove" onclick="removeToCart({page:'order_review',menu_item: '231', cart_item_key: '0',cart_item_size:'54', action: 'minus', cart_id: '1'});">
               <img src="/images/icon_cross.svg" alt="">
               </a>
             </div> --}}
           </div>	
         </div>
         
         @endforeach()
                   </div><div style="position: absolute; z-index: 1; margin: 0px; padding: 0px; display: none; left: 335px; top: 58px;"><div class="enscroll-track scroll__track" style="position: relative; height: 250px;"><a href="" class="scroll__handle" style="position: absolute; z-index: 1; height: 250px;"><div class="top"></div><div class="bottom"></div></a></div></div>
   <div class="wrap-total">
     <table>
       <tbody><tr>
         <td>Sub Total</td>
       <td>Rs. {{$sub_total}}</td>
       </tr>
                     <tr>
         {{-- <td>Delivery Fee</td>
         <td>$10.00</td>
       </tr>
                     <tr>
         <td>Discount Price</td> 
         <td>$0</td>
       </tr>
                       <tr>
           <td>Service Charges</td>
           <td>$0.02</td>
         </tr>
                                       <tr>
           <td>Service Tax</td>
           <td>$0</td>
         </tr> --}}
         
                       <tr>
           <td>GST</td>
              <td>Rs. {{($sub_total * (0.05))}}</td>
         </tr>
                       <tr class="last">
         <td>Amount Payable</td>
         <td>Rs. {{(($sub_total * (0.05))+$sub_total)}}</td>
       </tr>
     </tbody></table>
     <div class="space ordr_now">

     <a id="oredr_now" href="{{Auth::user()?'/placeorder/1':'/login'}}" class="btn btn--primary btn--block btn--large" onclick="alert('Please submit address first.');return false;" value="Place Order Now">Place Order Now</a>
                   </div> 
   </div>
           </div>
</div>





<script type="text/javascript">
// $(document).ready(function () {

// $(".js-chk-valid-qty").on("keypress keyup blur",function (event) {
//      //this.value = this.value.replace(/[^0-9\.]/g,'');
// $(this).val($(this).val().replace(/[^0-9\.]/g,''));
//      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
//          event.preventDefault();
//      }
//  });

// $(".js-chk-valid-qty").on("keypress keyup blur",function (event) {    
//     $(this).val($(this).val().replace(/[^\d].+/, ""));
//      if ((event.which < 48 || event.which > 57)) {
//          event.preventDefault();
//      }
//  });
 
//  });
</script></div>
      </div>
  </div>
</section>

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

<script type="text/javascript">
    
  $(function(){
  
    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
    
    $('.add-address').on('click',function(){
              var address = $('textarea[name=\"address\"]').val();
              var zipcode = $('input[name=\"zip_code\"]').val();
              var cityid = $(".city :selected").val();
              var areaid =  $(".cityarea :selected").val();

              $.ajax({
                      type:"POST",
                      url: "<?= url("/orderproduct/saveaddress") ?>",
                      data: {address: address,zipcode: zipcode,cityid: cityid,areaid: areaid},
                      success: function (data) {
                          alert('Address added successfully.');
                          $('#oredr_now').attr("onclick","");
                      }
                  });
          });
     });
  
      </script>
      <script>
        $(function() {
          $('input[name=\"order_type\"]').on('change', function() {
              var selected = $('input[name=\"order_type\"]:checked').val();

              if(selected == 2)
              { 
                $('#oredr_now').attr('href','/placeorder/1')
              }else{
                $('#oredr_now').attr('href','/placeorder/2')
              }


              console.log(selected);
          });
        });
      </script>

@endsection