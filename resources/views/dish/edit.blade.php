@extends('layouts.dashboard')
@section('page_title','update Dish')
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
        <form method="POST" action="/dish/{{$dish->id}}" enctype = 'multipart/form-data'>
            @csrf
            @method('patch')
              <div class="form-group">
                <label for="name">Dish Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')?old('name'):$dish->name}}">
              </div>
              <div class="form-group">
                <label for="image_id">Dish Images</label>
                @if($dish->image_id)
                <div style="width:100%;height:150px">
                    <i class="fa fa-times icon-times"></i>
                    <img style="height:150px" src="{{asset('/storage/uploads/'.$dish->image->file_name)}}"/>
                </div>
                <br/>
                @endif
                <input type="file" name="image_id"/>
          </div>
          <div class="form-group">
            <label for="name">Description</label>
            <input type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" required value="{{old('description')?old('description'):$dish->description}}">
          </div>
          <div class="form-group">
              <label for="name">Price</label>
              <input type="number" name="price" class="form-control {{$errors->has('price')?'is-invalid':''}}" required value="{{old('price')?old('price'):$dish->price}}">
            </div>
            <?php
            $dish_categories = [];
            foreach($dish->dishCategorys as $dc){
                $dish_categories[] = $dc?$dc->categories_id:null;
            }
            ?>
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select id="testc" class='form-control' name="category_id[]" required  multiple>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}" {{in_array($category->id,$dish_categories)?'selected':''}}>{{$category->name}}</option>
                  @endforeach
                </select>
          </div>
            <div class="form-group">
                <label>Dish Type</label>
                <select class="form-control" name="dish_for" required>
                <option  value="{{App\Dish::STATUS_VEGETARIAN}}" {{($dish->dish_for == App\Dish::STATUS_VEGETARIAN)?'selected':''}}>Veg</option>
                  <option value="{{App\Dish::STATUS_NONVEGETARIAN}}" {{($dish->dish_for == App\Dish::STATUS_NONVEGETARIAN)?'selected':''}}>Non-veg</option>
                </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                <option  value="{{App\Dish::STATUS_ACTIVE}}" {{($dish->status == App\Dish::STATUS_ACTIVE)?'selected':''}}>Active</option>
                  <option value="{{App\Dish::STATUS_INACTIVE}}" {{($dish->status == App\Dish::STATUS_INACTIVE)?'selected':''}}>Inactive</option>
                </select>
              </div>
            <button class="btn btn-primary" type="submit">Submit</button>
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