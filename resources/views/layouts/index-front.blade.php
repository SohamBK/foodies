{{-- {{dd('hiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','Dash Board')
@section('content')
      <?php  if(Auth::user()->role == 'admin'){  ?>
      <section class="content">
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3><?php echo \App\Restaurent::count() ?></h3>
          
                          <p>Total Restaurent</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="/restaurent" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3><?= \App\User::where(['role'=>'coustomer'])->count() ?><sup style="font-size: 20px"></sup></h3>
          
                          <p>Total Customer</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <?php
                          $plan_Elh4OrjY9fVfDq=3500;
                          $plan_Elh5g7HS2lqFfi=6000;
                          $plan_Elh5I6ByD8ldgL=10000;

                          $a = \App\Subscription::where(['stripe_plan'=>'plan_Elh4OrjY9fVfDq'])->count();
                          $b = \App\Subscription::where(['stripe_plan'=>'plan_Elh5g7HS2lqFfi'])->count();
                          $c = \App\Subscription::where(['stripe_plan'=>'plan_Elh5I6ByD8ldgL'])->count();
                            $total = ($plan_Elh4OrjY9fVfDq * $a) + ($plan_Elh5g7HS2lqFfi * $b) + ($plan_Elh5I6ByD8ldgL * $c);
                          ?>
                          <h3><?= $total ?></h3>
          
                          <p>Sunscription Income</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3><?= \App\Order::count()  ?></h3>
          
                          <p>Total Orders</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
      <?php } ?>


      <?php  if(Auth::user()->role == 'restaurent'){  ?>
        <section class="content">
                  <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3><?php echo \App\Dish::where(['restaurent_id'=>Auth::user()->restnew->id])->count() ?></h3>
            
                            <p>Total Dish</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="/dish" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3><?= \App\Order::where(['rest_id'=>Auth::user()->restnew->id])->count() ?><sup style="font-size: 20px"></sup></h3>
            
                            <p>Total Restaurent Orders</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="/order/received" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <?php
                            $total = \App\Order::where(['rest_id'=>Auth::user()->restnew->id])->sum('price') 
                            ?>
                            <h3><?= $total ?></h3>
            
                            <p>Restaurent Income</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="/order/received" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3><?= \App\DeliveryStaff::where(['rest_id'=>Auth::user()->restnew->id])->count()  ?></h3>
            
                            <p>Delivery Staff</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="/deliverystaff" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
        <?php } ?>

@endsection