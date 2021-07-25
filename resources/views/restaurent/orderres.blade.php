@extends('layouts.dashboard')
@section('page_title','orders List')
@section('content')
<style>
.table-tr{
  cursor: pointer;
}
.toggle{
  margin-top:20px;
  padding:10px;
  border:2px solid #007bff;
  border-radius:10px;
  display:none;
}
</style>
<div class="card">
    <div class="card-body">
        <div class="card-body table-responsive p-0">
                <!-- search section end -->
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Price</th>
                    <th>Payment status</th>
                    <th>Status</th>
                  </tr>
                  <?php $id = 1; ?>
                  @foreach($orders as $Order)
                    <tr class="table-tr" data-href="/order/show/{{$Order->id}}">
                    <td>{{$id}}</td>
                      <td>{{$Order->id}}</td>
                      <td>{{$Order->price}}</td>
                      
                      <td>{{$Order->is_paid?'Paid':'Cash on Delivery'}}</td>
                      <td><?php echo $Order->status?\App\order::$status[$Order->status]:'-'; ?></td>
                    </tr>
                    <?php $id++; ?>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(function(){
    $('.table-tr').on('click',function(){
      console.log($(this).data('href'));
      window.location = $(this).data('href');
    });
  });
  </script>
@endsection