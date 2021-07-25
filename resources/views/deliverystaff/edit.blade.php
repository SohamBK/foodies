@extends('layouts.dashboard')
@section('page_title','Update Delivery Staff')
@section('content')

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
        <form method="POST" action="/deliverystaff/{{$deliveryStaff->id}}">
            @csrf
            @method('patch')
              {{-- <div class="form-group">
                <label for="username">restaurent Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('restaurent_name')?'is-invalid':''}}" required value="{{old('restaurent_name')?old('restaurent_name'):$deliveryStaff->restaurent_name}}">
              </div> --}}
              <div class="form-group">
                <label for="username">First Name</label>
                <input type="text" name="first_name" class="form-control {{$errors->has('first_name')?'is-invalid':''}}" required value="{{old('first_name')?old('first_name'):$deliveryStaff->first_name}}">
              </div>
              <div class="form-group">
                <label for="username">Last Name</label>
                <input type="text" name="last_name" class="form-control {{$errors->has('last_name')?'is-invalid':''}}" required value="{{old('last_name')?old('last_name'):$deliveryStaff->last_name}}">
              </div>
              <div class="form-group">
                <label for="username">Email</label>
                <input type="text" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" required value="{{old('email')?old('email'):$deliveryStaff->email}}">
              </div>
              <div class="form-group">
                <label for="username">Mobile</label>
                <input type="text" name="mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" required value="{{old('mobile')?old('mobile'):$deliveryStaff->mobile}}">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                <option  value="{{App\Deliverystaff::STATUS_ACTIVE}}" {{($deliveryStaff->status == App\Deliverystaff::STATUS_ACTIVE)?'selected':''}}>Active</option>
                  <option value="{{App\DeliveryStaff::STATUS_INACTIVE}}" {{($deliveryStaff->status == App\Deliverystaff::STATUS_INACTIVE)?'selected':''}}>Inactive</option>
                </select>
              </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
</div>
@endsection