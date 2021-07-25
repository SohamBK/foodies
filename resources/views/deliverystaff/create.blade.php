{{-- {{dd('delivery_staffs')}} --}}

@extends('layouts.dashboard')
@section('page_title','Add Delivery Staff')
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
          <form method="POST" action="/deliverystaff">
            @csrf
              {{-- <div class="form-group">
                <label for="username">Restaurent Name</label>
                <input type="text" name="restaurent_name" class="form-control {{$errors->has('restaurent_name')?'is-invalid':''}}" required value="{{old('restaurent_name')}}">
              </div> --}}
              <div class="form-group">
                <label for="username">First Name</label>
                <input type="text" name="first_name" class="form-control {{$errors->has('first_name')?'is-invalid':''}}" required value="{{old('first_name')}}">
              </div>
              <div class="form-group">
                <label for="username">Last Name</label>
                <input type="text" name="last_name" class="form-control {{$errors->has('last_name')?'is-invalid':''}}" required value="{{old('last_name')}}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" required value="{{old('email')}}">
              </div>
              <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="number" name="mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" required value="{{old('mobile')}}">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" required value="{{old('password')}}">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                  <option  value="10">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
</div>
@endsection