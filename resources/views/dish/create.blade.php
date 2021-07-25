{{-- {{dd('hiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','Add Dish')
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
          <form method="POST" action="/dish"  enctype = 'multipart/form-data'>
            @csrf
              <div class="form-group">
                <label for="name">Dish Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
              </div>
              <div class="form-group">
                  <label for="image_id">Image</label>
                    <input type="file" required name="image_id"/>
              </div>
              <div class="form-group">
                  <label for="description">Short Description</label>
                  <textarea type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" required value="{{old('description')}}">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                  <label for="name">Price</label>
                  <input type="number" name="price" class="form-control {{$errors->has('price')?'is-invalid':''}}" required value="{{old('price')}}">
                </div>
                    <div class="form-group">
                        <label for="category_id">Select Category</label>
                        <select id="testc" class='form-control' name="category_id[]" required  multiple>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                      <label>Dish Type</label>
                      <select class="form-control" name="dish_for" required>
                        <option  value="1">Vegetarian</option>
                        <option value="2">Nonvegetarian</option>
                      </select>
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
<script>
  $(document).ready(function(){
      $("#testc").select2({
                });
      
      $("#checkbox").click(function(){
        if($("#checkbox").is(':checked') ){
            $("#test > option").prop("selected","selected");
            $("#test").trigger("change");
        }else{
            $("#test > option").prop("selected","");
            $("#test").trigger("change");
        }
    });
    });
</script>
@endsection
