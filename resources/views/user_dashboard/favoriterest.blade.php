@extends('layouts.frontendnav')
@section('content')    
<br>
<br>
<br>
<br>
<div class="section section--profile">  
		<div class="container container--fixed">
			<div class="row row--collapseable">                   
			   <div class="col-lg-6 col-md-12 col-sm-12">
	<div class="box box--tabled">
		<div class="box__left">
      <?php
        $url = url('/storage/uploads/');
        $slash =  '/';
        $file = (Auth::user()->image?Auth::user()->image->file_name:'download.png');
        $furl = $url.''.$slash.''.$file;
      ?>
    <img width="70" height="70" class="img-circle"  src="{{$furl}}" alt="Profile Photo">  
		</div>
		<div class="box__right">
    <span class="item__title">{{Auth::user()->username}}</span><img class="status" src="/images/tick_green.svg" alt="" title="Active"> <br>
						<span class="-gap"></span>
			<span class="-color-primary">{{Auth::user()->mobile}}</span><br>
			<a href="mailto:jason@dummyid.com"><span class="-color-secondary">{{Auth::user()->email}}</span></a><br>
			<a href="/updatemember" class="btn btn--small btn--white">Edit Details</a>
		</div>
	</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-4">
	<div class="box box--white">
		<div class="stats stats--first">
			<img src="/images/box_icon_1.svg" style="left:-40px" alt="" class="stats__icon">
			<p> Orders</p>
			<h2>{{\App\Order::where(['user_id'=>Auth::user()->id])->count()}}</h2>
			<a href="#" class="stats__link"></a>
		</div>
	</div>
</div>

<div class="col-lg-2 col-md-4 col-sm-4">
	<div class="box box--white">
		<div class="stats stats--second">
			<img src="/images/box_icon_2.svg" alt="" style="left:-20px" class="stats__icon">
			<p>Favourites</p>
			<h2>{{\App\Favourite::where(['user_id'=>Auth::user()->id])->count()}}</h2>
			<a href="#" class=""></a>
		</div>
	</div>
</div>  
			</div>
		</div>
  </div>

  <div class="section section--content">
      <div class="container container--fixed">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-12">
            <span class="overlay overlay--box"></span>
            <div class="box box--bordered box--responsive box--bordered-first">
    <div class="box__head">
      <h6>Quick Links </h6>
    </div>
    <div class="box__body">
       <div class="nav nav--vertical">
          <ul>
            <li class="is--active"><a href="/member">Dashboard</a></li>
            <li class=""><a href="/updatemember">Account</a></li>
            {{-- <li class=""><a href="/member/addresses">My Addresses</a></li> --}}
            {{-- <li class=""><a href="/member/orders">Orders</a></li> --}}
            {{-- <li class=""><a href="/member/favourites">Favourite Orders</a></li>--}}
            <li class=""><a href="/favoriterest">Favourite Restaurants</a></li>
            {{--<li class=""><a href="/member/reviews">Reviews</a></li>
            <li class=""><a href="/member/wallet">Wallet</a></li>
            <li class=""><a href="/member/rewards">Reward</a></li> --}}
            <!--li class=""><a href="/member/notifications">Notifications <span  class="notification-count">55</span></a></li-->
          </ul>
        </div>
      
    </div>
  </div>			 
</div>
<div class="col-lg-9">
      <h4>Favourites Restaurants </h4>
    {{-- <div class="fav-rest"> --}}
      
        <ol type="1">
            <?php $fav = \App\Favourite::where(['user_id'=>Auth::user()->id])->get(); 
                  foreach($fav as $k=>$f){
            ?>
                  <li><h6><a href="{{url('/dishes/'.$f->rest_id)}}">{{($k+1).')  '}}{{ $f->rest->name }}</a></h6></li>
                  <?php } ?>
            
        </ol>
  
      {{-- </div> --}}


</div>
</div>
</div>
</div>

@endsection