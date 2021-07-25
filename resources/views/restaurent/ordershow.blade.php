{{-- {{dd($order)}} --}}

@extends('layouts.dashboard')
@section('page_title','Order Details')
@section('content')
<h4>Order Status</h4>
<input type="hidden" class="hidden_id" value="{{$order->id}}">
<select class="form-control group order-status" name="order-status">
  <option value="">Select status ...</option>
  <option value="10" {{$order->status==10?'selected':''}}>Pending</option>
  <option value="3" {{$order->status==3?'selected':''}}>In Process</option>
  <option value="2" {{$order->status==2?'selected':''}}>On The Way</option>
  <option value="5" {{$order->status==5?'selected':''}}>Delivered</option>
  <option value="1" {{$order->status==1?'selected':''}}>Cancelled</option>
</select>
</br>
<select class="form-control group person" name="person">
    <option value="">Select delivery person...</option>
    <?php 
        $per = \App\Deliverystaff::where(['rest_id'=>Auth::user()->restnew->id])->get();
        foreach($per as $p){
    ?>
        <option value="{{$p->id}}" {{($p->id == $order->staff_id)?'selected':''}}>{{$p->first_name.' '.$p->last_name}}</option>
    <?php } ?>
  </select>
</br>
<button class=" btn btn-primary delivery-status" id="status" style="margin-bottom:15px;"> Change </button>
</br>
 <!-- search section end -->
 <h4>Dishes Details </h4>
 <table class="table table-hover">
    <tbody>
<tr>
    <th>ID</th>
    <th>Dish Name</th>
    <th>Dish Quantity</th>
  </tr>
  <?php $id = 1; ?>
  @foreach($order->orderproduct as $op)
    <tr class="table-tr">
      <td>{{$id}}</td>
      <td>{{$op->product->name}}</td>
      <td>{{$op->qty}}</td>
    </tr>
    <?php $id++; ?>
@endforeach
</tbody>
</table>
<br><br>
<h4>Order Details </h4>
 <table class="table table-hover">
    <tbody>
<tr>
    <th>Order ID</th>
    <th>Price</th>
    <th>Payment status</th>
    <th>Status</th>
  </tr>
    <tr class="table-tr">
      <td>{{$order->id}}</td>
      <td>{{$order->price}}</td>
      <td>{{$order->is_paid?'Paid':'Cash on Delivery'}}</td>
      <td><?php echo $order->status?\App\order::$status[$order->status]:'-'; ?></td>
    </tr>
</tbody>
</table>

<br><br>
@if($order->address_id)
<h4>Address Details </h4>
 <table class="table table-hover">
    <tbody>
<tr>
    <th>address</th>
    <th>City</th>
    <th>Area</th>
    <th>Zip Code</th>
  </tr>
  <?php $address = App\Address::find($order->address_id);
  ?>
    <tr class="table-tr">
      <td>{{$address->address}}</td>
      <td>{{$address->city->name}}</td>
      <td>{{$address->area->name}}</td>
      <td>{{$address->zip_code}}</td>
     
    </tr>
</tbody>
</table>
<button class="print btn btn-primary">Print</button>
@endif

<script type="text/javascript">
// console.log(typeof jQuery);

    $(function(){

      $('.print').on('click',function(){
        window.print();
      });
  
  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
  
  $('#status').on('click',function(){
      var order_status = $(".order-status :selected").val();
      var id = $('.hidden_id').val();
      var person = $(".person :selected").val();
      console.log(order_status);
            $.ajax({
                    type:"POST",
                    url: "<?= url("/changestatus") ?>",
                    data: {order_status: order_status,person:person,id:id},
                    success: function (data) {
                      // console.log(data);
                    }
                });
        });
   });
</script>
@endsection