@extends('layouts.dashboard')
@section('page_title','update Category')
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
        <form method="POST" action="/category/{{$category->id}}" enctype = 'multipart/form-data'>
            @csrf
            @method('patch')
              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')?old('name'):$category->name}}">
              </div>
              <div class="form-group">
                <label for="image_id">Images</label>
                @if($category->image_id)
                <div style="width:100%;height:150px">
                    <i class="fa fa-times icon-times"></i>
                    <img style="height:150px" src="{{asset('/storage/uploads/'.$category->image->file_name)}}"/>
                </div>
                <br/>
                @endif
                <input type="file" name="image_id"/>
          </div>
          <div class="form-group">
            <label for="name">Description</label>
            <input type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" required value="{{old('description')?old('description'):$category->description}}">
          </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                <option  value="{{App\Category::STATUS_ACTIVE}}" {{($category->status == App\Category::STATUS_ACTIVE)?'selected':''}}>Active</option>
                  <option value="{{App\Category::STATUS_INACTIVE}}" {{($category->status == App\Category::STATUS_INACTIVE)?'selected':''}}>Inactive</option>
                </select>
              </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
</div>
@endsection