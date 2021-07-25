@extends('layouts.dashboard')
@section('page_title','Add Category')
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
          <form method="POST" action="/category"  enctype = 'multipart/form-data'>
            @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
              </div>
              <div class="form-group">
                  <label for="image_id">Images</label>
                    <input type="file" name="image_id"/>
              </div>
              <div class="form-group">
                  <label for="description">Short Description</label>
                  <textarea type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" required value="{{old('description')}}">{{old('description')}}</textarea>
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
