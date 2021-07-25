{{-- {{dd('hiii')}} --}}
@extends('layouts.dashboard')
@section('page_title','Add Offer')
@section('content')
<style>
.coupon-limit{
  display: none;
}
</style>
<div class="card">
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
      <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </ul>
  </div>
  @endif
    <div class="card-body">
        <div class="card-body table-responsive p-0">
          <form method="POST" action="/offer">
            @csrf
              <div class="form-group">
                <label for="username">Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
              </div>
              <div class="form-group">
                <label for="username">Short Description</label>
                <textarea type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" required value="{{old('description')}}">{{old('description')}}</textarea>
              </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Discount Type</label>
                        <select class="form-control offer-type" name="discount_type" required>
                          <option  value="10">Offer</option>
                          <option value="0">Coupon</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type" required>
                          <option  value="1">Percentage</option>
                          <option value="2">Fixed Amount</option>
                        </select>
                      </div>
                  </div>
                </div>
              <div class="form-group">
                <label for="value">Offer Value</label>
                <input type="number" name="value" class="form-control {{$errors->has('value')?'is-invalid':''}}" required value="{{old('value')}}">
              </div>
              <div class="form-group coupon-limit">
                <label for="coupon_limit">Coupon limit</label>
                <input type="number" name="coupon_limit" class="form-control {{$errors->has('coupon_limit')?'is-invalid':''}}" required value="{{old('coupon_limit')}}">
              </div>
              {{-- {{dd(date('Y-m-d'))}} --}}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="valid_from">Valid from</label>
                    <input type="date" min="{{date('Y-m-d')}}" name="valid_from" class="form-control {{$errors->has('valid_from')?'is-invalid':''}}" required value="{{old('valid_from')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="valid_upto">Valid upto</label>
                        <input type="date" min="{{date('Y-m-d')}}" name="valid_upto" class="form-control {{$errors->has('valid_upto')?'is-invalid':''}}" required value="{{old('valid_upto')}}">
                      </div>
                    </div>
                  </div>
                </div>
              <div class="form-group">
                <label for="minimum_order">Minimum order</label>
                <input type="number" name="minimum_order" class="form-control {{$errors->has('minimum_order')?'is-invalid':''}}" required value="{{old('minimum_order')}}">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                  <option  value="10">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        <br>
      </div>
    </div>
</div>

<script type="text/javascript">

$(function(){
    var selected = $('.offer-type :selected').val();
    Change();
    console.log(selected);
    $('.offer-type').on('change',function(){
      selected = $('.offer-type :selected').val();
      Change();
      console.log(selected);
    }); 


    function Change(){
    if(selected == 0)
    {
      console.log('00');
      $('.coupon-limit').css('display','initial');
      //$('.coupon-limit').css('display','none');

     // $('.coupon-limit').removeAttr('required');
      $('[name="coupon_limit"]').attr('required',true);
    }
    else
    {
      console.log('11');
      $('.coupon-limit').css('display','none');
     // $('.coupon-limit').css('display','initial');

      $('[name="coupon_limit"]').removeAttr('required');
     // $('.coupon-limit').prop('required',true);
    }
    }
  });


  //   var selected = $('.selection :selected').val();
  //       if(selected == 'status')
  //       {
  //         $('.search-input').css('display','none');
  //         $('.status-input').css('display','initial');
  
  //         $('.search-text ').removeAttr('required');
  //         $('.search-status').prop('required',true);
  //       }
  //       else
  //       {
  //         $('.search-input').css('display','initial');
  //         $('.status-input').css('display','none');
  
  //         $('.search-status').removeAttr('required');
  //         $('.search-text ').attr('required',true);
  //       }


  // });
  </script>
@endsection
