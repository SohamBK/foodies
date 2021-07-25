 {{-- @extends('dashboard')
 @section('navbar') --}}
 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    @can('isAdmin')
    <li class="nav-item has-treeview {{(request()->is('user/*') || request()->is('user'))?'menu-open':''}}">
      <a href="#" class="nav-link {{(request()->is('user/*') || request()->is('user'))?'active':''}}">
        <i class="nav-icon fa fa-user"></i>
        <p>
          User Setting
          <i class="right fa fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{url('/user/create')}}" class="nav-link {{request()->is('user/create')?'active':''}}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Add User</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{url('/user')}}" class="nav-link {{request()->is('user')?'active':''}}">
            <i class="fa fa-list nav-icon"></i>
            <p>Manage User</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview {{(request()->is('city/*') || request()->is('city'))?'menu-open':''}}">
      <a href="#" class="nav-link {{(request()->is('city/*') || request()->is('city'))?'active':''}}">
        <i class="nav-icon fa fa-map-marker "></i>
        <p>
          City
          <i class="right fa fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{url('/city/create')}}" class="nav-link {{request()->is('city/create')?'active':''}}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Add City</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{url('/city')}}" class="nav-link {{request()->is('city')?'active':''}}">
            <i class="fa fa-list nav-icon"></i>
            <p>Manage City</p>
          </a>
        </li>
      </ul>
    </li>

    {{-- <li class="nav-item has-treeview {{(request()->is('offer/*') || request()->is('offer'))?'menu-open':''}}">
      <a href="#" class="nav-link {{(request()->is('offer/*') || request()->is('offer'))?'active':''}}">
        <i class="nav-icon fa fa-percent "></i>
        <p>
          Discount
          <i class="right fa fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{url('/offer/create')}}" class="nav-link {{request()->is('offer/create')?'active':''}}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Add Offer</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{url('/offer')}}" class="nav-link {{request()->is('offer')?'active':''}}">
            <i class="fa fa-list nav-icon"></i>
            <p>Manage Offer</p>
          </a>
        </li>
      </ul>
    </li> --}}

    {{-- <li class="nav-item has-treeview {{(request()->is('email/*') || request()->is('email'))?'menu-open':''}}">
      <a href="#" class="nav-link {{(request()->is('email/*') || request()->is('email'))?'active':''}}">
        <i class="nav-icon fa fa-envelope"></i>
        <p>
          Email
          <i class="right fa fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{url('/email/create')}}" class="nav-link {{request()->is('email/create')?'active':''}}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Add Email</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{url('/email')}}" class="nav-link {{request()->is('email')?'active':''}}">
            <i class="fa fa-list nav-icon"></i>
            <p>Manage Email</p>
          </a>
        </li>
      </ul>
    </li> --}}

      <li class="nav-item has-treeview {{(request()->is('category/*') || request()->is('category'))?'menu-open':''}}">
        <a href="#" class="nav-link {{(request()->is('category/*') || request()->is('category'))?'active':''}}">
            <i class="fa fa-cutlery nav-icon" ></i>
          <p>
              Category
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('/category/create')}}" class="nav-link {{request()->is('category/create')?'active':''}}">
              <i class="fa fa-plus nav-icon"></i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('/category')}}" class="nav-link {{request()->is('category')?'active':''}}">
              <i class="fa fa-list nav-icon"></i>
              <p>Manage Category</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview {{(request()->is('restaurent/*') || request()->is('restaurent'))?'menu-open':''}}">
        <a href="#" class="nav-link {{(request()->is('restaurent/*') || request()->is('restaurent'))?'active':''}}">
            <i class="fa fa-cutlery nav-icon" ></i>
          <p>
            Restaurent
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          {{-- <li class="nav-item">
          <a href="{{url('/Restaurent/create')}}" class="nav-link {{request()->is('Restaurent/create')?'active':''}}">
              <i class="fa fa-plus nav-icon"></i>
              <p>Add Restaurent</p>
            </a>
          </li> --}}
          <li class="nav-item">
          <a href="{{url('/restaurent')}}" class="nav-link {{request()->is('restaurent')?'active':''}}">
              <i class="fa fa-list nav-icon"></i>
              <p>Manage Restaurent</p>
            </a>
          </li>
        </ul>
      </li>

      @endcan

      @cannot('isAdmin')

      @cannot('isSubscribe')
      <li class="nav-item has-treeview {{(request()->is('restaurent/owner/*') || request()->is('restaurent/owner'))?'menu-open':''}}">
          <a href="#" class="nav-link {{(request()->is('restaurent/owner/*') || request()->is('restaurent/owner'))?'active':''}}">
              <i class="fa fa-cutlery nav-icon" ></i>
            <p>
                Restaurent
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <?php 
                $id = App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id;
                ?>
                {{-- {{dd($id)}} --}}
            {{-- @if(App\Restaurent::where(['user_id'=>Auth::user()->id])->get()->count()!== 0) --}}
           
            <a href="{{url('restaurent/owner/'.$id.'')}}" class="nav-link {{request()->is('restaurent/owner/5')?'active':''}}">
                <i class="fa fa-plus nav-icon"></i>
                <p>Restaurent Profile</p>
              </a>
              {{-- @endif --}}
            </li>
          </ul>
        </li>

      <li class="nav-item has-treeview {{(request()->is('dish/*') || request()->is('dish'))?'menu-open':''}}">
        <a href="#" class="nav-link {{(request()->is('dish/*') || request()->is('dish'))?'active':''}}">
            <i class="fa fa-cutlery nav-icon" ></i>
          <p>
              Dishes
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('/dish/create')}}" class="nav-link {{request()->is('dish/create')?'active':''}}">
              <i class="fa fa-plus nav-icon"></i>
              <p>Add Dish</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('/dish')}}" class="nav-link {{request()->is('dish')?'active':''}}">
              <i class="fa fa-list nav-icon"></i>
              <p>Manage Dishes</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      {{-- subscription --}}

      <li class="nav-item has-treeview {{(request()->is('subscribe/*') || request()->is('subscribe'))?'menu-open':''}}">
        <a href="#" class="nav-link {{(request()->is('subscribe/*') || request()->is('subscribe'))?'active':''}}">
          <i class="nav-icon fa fa-percent "></i>
          <p>
            Subscribe
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('/subscribe/create')}}" class="nav-link {{request()->is('subscribe/create')?'active':''}}">
              <i class="fa fa-plus nav-icon"></i>
              <p>Subscribe Now</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('/subscribe')}}" class="nav-link {{request()->is('subscribe')?'active':''}}">
              <i class="fa fa-list nav-icon"></i>
              <p>Manage Subscription</p>
            </a>
          </li>
        </ul>
      </li>

      @cannot('isSubscribe')
      <li class="nav-item has-treeview {{(request()->is('order/received/*') || request()->is('order/received'))?'menu-open':''}}">
          <a href="#" class="nav-link {{(request()->is('order/received/*') || request()->is('order/received'))?'active':''}}">
            <i class="nav-icon fa fa-percent "></i>
            <p>
              Orders
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{url('/order/received')}}" class="nav-link {{request()->is('/order/received')?'active':''}}">
                <i class="fa fa-list nav-icon"></i>
                <p>Dish Orders</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview {{(request()->is('restaurent/merchantid/*') || request()->is('restaurent/merchantid'))?'menu-open':''}}">
          <a href="#" class="nav-link {{(request()->is('restaurent/merchantid/*') || request()->is('restaurent/merchantid'))?'active':''}}">
              <i class="fa fa-cutlery nav-icon" ></i>
            <p>
                Payment Details
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <?php 
                $id = App\Restaurent::where(['user_id'=>Auth::user()->id])->get()[0]->id;
                ?>
                {{-- {{dd($id)}} --}}
            {{-- @if(App\Restaurent::where(['user_id'=>Auth::user()->id])->get()->count()!== 0) --}}
           
            <a href="{{url('restaurent/merchantid/'.$id.'')}}" class="nav-link {{request()->is('restaurent/merchantid/5')?'active':''}}">
                <i class="fa fa-plus nav-icon"></i>
                <p>Add Payment Details</p>
              </a>
              {{-- @endif --}}
            </li>
          </ul>
        </li>

        

      <li class="nav-item has-treeview {{(request()->is('deliverystaff/*') || request()->is('deliverystaff'))?'menu-open':''}}">
        <a href="#" class="nav-link {{(request()->is('deliverystaff/*') || request()->is('deliverystaff'))?'active':''}}">
          <i class="nav-icon fa fa-map-marker "></i>
          <p>
            Delivery Staff
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('/deliverystaff/create')}}" class="nav-link {{request()->is('deliverystaff/create')?'active':''}}">
              <i class="fa fa-plus nav-icon"></i>
              <p>Add Delivery Staff</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('/deliverystaff')}}" class="nav-link {{request()->is('deliverystaff')?'active':''}}">
              <i class="fa fa-list nav-icon"></i>
              <p>Manage Delivery Staff</p>
            </a>
          </li>
        </ul>
      </li>

        @endcan
      @endcan


    {{-- <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-th"></i>
        <p>
          Simple Link
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li> --}}
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
{{-- @stop --}}
<script type="text/javascript">
  $(function(){
    // $('.has-treeview').on('click',function(){
    //   console.log($(this));
    //   $(this).addClass('menu-open');
    // });
  });
</script>