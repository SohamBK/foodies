{{-- {{dd('hiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','Add User')
@section('content')
<style>
.icon-times{
    font-size:20px;
    color:red;
    background-color:cornsilk;

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
        <form method="POST" action="/offer/{{$offer->id}}">
            @csrf
            @method('patch')
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')?old('name'):$offer->name}}">
              </div>
              <div class="form-group">
                  <label for="name">Short Description</label>
                  <input type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" required value="{{old('description')?old('description'):$offer->description}}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Discount Type</label>
                          <select class="form-control {{$errors->has('discount_type')?'is-invalid':''}}" required value="{{old('discount_type')?old('discount_type'):$offer->discount_type}} offer-type" name="discount_type" >
                            <option  value="10" {{($offer->discount_type==10)?'selected':''}}>Offer</option>
                            <option value="0" {{($offer->discount_type==0)?'selected':''}}>Coupon</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Type</label>
                          <select class="form-control" name="type" required>
                            <option  value="1" {{($offer->type==1)?'selected':''}}>Percentage</option>
                            <option value="2" {{($offer->type==2)?'selected':''}}>Fixed Amount</option>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="value">Offer Value</label>
                      <input type="number" name="value" class="form-control {{$errors->has('value')?'is-invalid':''}}" required value="{{old('value')?old('value'):$offer->value}}">
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
                          <input type="date" min="{{date('Y-m-d')}}" name="valid_from" class="form-control {{$errors->has('valid_from')?'is-invalid':''}}" required value="{{old('valid_from')?old('valid_from'):date('Y-m-d',strtotime($offer->valid_from))}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-group">
                              <label for="valid_upto">Valid upto</label>
                              <input type="date" min="{{date('Y-m-d')}}" name="valid_upto" class="form-control {{$errors->has('valid_upto')?'is-invalid':''}}" required value="{{old('valid_upto')?old('valid_upto'):date('Y-m-d',strtotime($offer->valid_upto))}}">
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="minimum_order">Minimum order</label>
                      <input type="number" name="minimum_order" class="form-control {{$errors->has('minimum_order')?'is-invalid':''}}" required value="{{old('minimum_order')?old('minimum_order'):$offer->minimum_order}}">
                    </div>
              <div class="form-group">
                <label for="value">Value</label>
                <input type="number" name="value" class="form-control {{$errors->has('value')?'is-invalid':''}}" required value="{{old('value')?old('value'):$offer->value}}">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                <option  value="{{App\Offer::STATUS_ACTIVE}}" {{($offer->status == App\Offer::STATUS_ACTIVE)?'selected':''}}>Active</option>
                  <option value="{{App\Offer::STATUS_INACTIVE}}" {{($offer->status == App\Offer::STATUS_INACTIVE)?'selected':''}}>InActive</option>
                </select>
              </div>
              <div class="form-group">
                <label>Start time</label>
                <input type="time" name="start_time" value=""/>
              </div>
              <div class="form-group">
                <label>End time</label>
                <input type="time" name="end_time" value=""/>
              </div>


            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
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
  
    </script>
@endsection