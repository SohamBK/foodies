{{-- {{dd($dish_id)}} --}}

@extends('layouts.dashboard')
@section('page_title','Add Dish Customization')
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
    <form method="POST" action="/customization" >
      @csrf
        <div class="form-group">
          <label for="name">Customization Name</label>
          <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
        </div>
        <div class="form-group">
        <input type="hidden" id="dishid" name="dish_id" value="{{$dish_id}}">
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status" required>
            <option  value="10">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
      <button class="btn btn-primary" type="submit" >submit</button>
  </form>
</div>
</div>
</div>
@endsection