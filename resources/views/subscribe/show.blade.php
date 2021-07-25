{{-- {{dd($subscription)}} --}}

@extends('layouts.dashboard')
@section('page_title','Your Current Plan Details')
@section('content')
@if($subscription->count() == 0)
<h4>Not Subscribed yet.</h4>
{{exit}}
@endif
@if(Session::has('message'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<?php
if($subscription->stripe_plan == "plan_EblK707fZ1N1uv")
{
      $p_name = "Premium";
}elseif($subscription->stripe_plan == "plan_EblJIcQ2PUYdt2"){
      $p_name = "Pro";
}elseif($subscription->stripe_plan == "plan_EblJW9287hNM5l"){
      $p_name = "Basic";
}
?>
  <div class="card">
    
    <div class="card-header">
      <div class="row">
        <div class="col-md-3">
            <form method="post" action="/subscribe/delete/{{$subscription->id}}/">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to Stop Recurring payment for current plan?')" class="btn btn-danger" value="Stop Recurring Payment"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/subscribe/{{$subscription->id}}">
                <input type="submit" class="btn btn-success" value="Invoice"/>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
      <table class="table table-condensed">
        <tbody><tr>
          <th>Name</th>
          <th>Detail</th>
        </tr>
        {{-- <tr>
          <td>Plan Name</td>
          <td>
            <div class="">
              {{$p_name}}
            </div>
          </td>
        </tr> --}}
        <tr>
          <td>Future Payment Method</td>
          <td>
            <div class="">
            @if($subscription->is_recurrsive == 5)
                {{"Recurring Payment."}}
            @endif
            @if($subscription->is_recurrsive == 1)
                {{"Recurring Payment is Stopped."}}
            @endif
            </div>
          </td>
        </tr>
        <tr>
          <td>Ends At</td>
          <td>
            <div class="">
              {{date('Y-M-d',strtotime($subscription->ends_at))}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{date('Y-M-d',strtotime($subscription->created_at))}}
            </div>
          </td>
        </tr>
      </tbody></table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
      </div>
    </div>
  </div>
@endsection