{{-- {{dd($$deliveryStaff)}} --}}
@extends('layouts.dashboard')
@section('page_title','View')
@section('content')
@if(Session::has('message'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-1">
            <form method="post" action="/deliverystaff/{{$deliveryStaff->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this Delivary Staff details?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/deliverystaff/{{$deliveryStaff->id}}/edit">
                <input type="submit" class="btn btn-success" value="Update"/>
            </form>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-condensed">
        <tbody><tr>
          <th>Name</th>
          <th>Detail</th>
        </tr>
        {{-- <tr>
          <td>Restaurent Name</td>
          <td>
            <div class="">
              {{$deliveryStaff->restaurent_name}}
            </div>
          </td>
        </tr> --}}
        <tr>
          <td>First Name</td>
          <td>
            <div class="">
              {{$deliveryStaff->first_name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>
            <div class="">
              {{$deliveryStaff->last_name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
            <div class="">
              {{$deliveryStaff->email}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Mobile No.</td>
          <td>
            <div class="">
              {{$deliveryStaff->mobile}}
            </div>
          </td>
        </tr>
        {{-- <tr>
          <td>status</td>
          <td>
            <div class="">
              {{App\Deliverystaff::$status[$deliveryStaff->status]}}
            </div>
          </td>
        </tr> --}}
        {{-- <tr>
          <td>Created By</td>
          <td>
            <div class="">
              {{$deliveryStaff->createdBy?$deliveryStaff->createdBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updted By</td>
          <td>
            <div class="">
              {{$deliveryStaff->updatedBy?$deliveryStaff->updatedBy->username:'-'}}
            </div>
          </td>
        </tr> --}}
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{$deliveryStaff->created_at}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updated At</td>
          <td>
            <div class="">
              {{$deliveryStaff->updated_at}}
            </div>
          </td>
        </tr>
      </tbody></table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection