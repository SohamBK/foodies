{{-- {{dd('subscribe')}} --}}

@extends('layouts.dashboard')
@section('page_title','Subscribe Now')
@section('content')
@if($allow)
<style>
.card{
  pointer-events: none;
}
</style>
@endif
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
              <h6 class="card-price text-center">&#x20B9;3500<span class="period">/ 3 months</span></h6>
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
                <input type="hidden" name="plan" value="plan_Elh4OrjY9fVfDq"/>
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                    data-key="pk_test_J40caC8xJxm9wRwZ4LFLUjiW"
                    {{-- data-amount="200" --}}
                    data-name="Foodies"
                    data-description="Secure Payment"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-label="Subscribe Now"
                    data-currency="inr"
                    {{-- data-email="{{ Auth()->check()?auth()->users()->email:null}}" --}}
                    data-panel-label="Pay Rs.3500"
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
              <h6 class="card-price text-center">&#x20B9;6000<span class="period">/ 6 months</span></h6>
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
              <form action="/subscribe" method="POST">
                @csrf
                <input type="hidden" name="plan" value="plan_Elh5g7HS2lqFfi"/>
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                    data-key="pk_test_J40caC8xJxm9wRwZ4LFLUjiW"
                    {{-- data-amount="200" --}}
                    data-name="Foodies"
                    data-description="Secure Payment"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-label="Subscribe Now"
                    data-currency="inr"
                    {{-- data-email="{{ Auth()->check()?auth()->users()->email:null}}" --}}
                    data-panel-label="Pay Rs.6000"
                    data-locale="auto">
                  </script>
                </form>
            </div>
          </div>
        </div>
        <!-- Pro Tier -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
              <h6 class="card-price text-center">&#x20B9;10,000<span class="period">/ 12 months</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>Manage Restaurant online</strong></li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Sales Reports</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Wideer range of Customers Accsess</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Add Restaurent Dishes
                </li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Online payment by customers</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Get customer review</li>
                {{-- <li><span class="fa-li"><i class="fa fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Monthly Status Reports</li> --}}
              </ul>
              <form action="/subscribe" method="POST">
                @csrf
                <input type="hidden" name="plan" value="plan_Elh5I6ByD8ldgL"/>
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                    data-key="pk_test_J40caC8xJxm9wRwZ4LFLUjiW"
                    {{-- data-amount="200" --}}
                    data-name="Foodies"
                    data-description="Secure Payment"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-label="Subscribe Now"
                    data-currency="inr"
                    {{-- data-email="{{ Auth()->check()?auth()->users()->email:null}}" --}}
                    data-panel-label="Pay Rs.10,000"
                    data-locale="auto">
                  </script>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-----------------
    PRICEING SNIPPET END
  -------------------->
          {{-- <form method="POST" action="/offer">
            @csrf
              
        </form> --}}

      </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
  var button = $('.stripe-button-el');
    button.removeClass('stripe-button-el');
    button.addClass('btn btn-block btn-primary text-uppercase');});
</script>
@endsection
