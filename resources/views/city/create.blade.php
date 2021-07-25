@extends('layouts.dashboard')
@section('page_title','Add City')
@section('content')
<style>
    li.select2-selection__choice {
        background-color: #3490dc !important;
        font-size: 17px;
        color: white;
    }
    .select2-selection__choice__remove {
        color: black !important;
        font-size:20px;
    }
</style>
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
          <form method="POST" action="/city">
            @csrf
              <div class="form-group">
                <label for="username">City Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
              </div>
              <div class="form-group">
                  <label for="city">City Areas Name</label>
                  <select class="form-control" id="city_areas" name="city_areas[]" data-tags="true" data-placeholder="TAGS" multiple="multiple">
                  </select>
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
<script>
    $(document).ready(function(){
        $("#city_areas").select2({ 
          tags: true,
        });
    });
</script>
@endsection