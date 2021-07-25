@extends('layouts.dashboard')
@section('page_title','Add User')
@section('content')
<style>
.icon-times{
    font-size:20px;
    color:red;
    background-color:cornsilk;

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
        <form method="POST" action="/user/{{$user->id}}" enctype = 'multipart/form-data'>
            @csrf
            @method('patch')
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" required value="{{old('username')?old('username'):$user->username}}">
              </div>
              <div class="form-group">
                  <label for="username">First Name</label>
                  <input type="text" name="first_name" class="form-control {{$errors->has('first_name')?'is-invalid':''}}" required value="{{old('first_name')?old('first_name'):$user->first_name}}">
              </div>
              <div class="form-group">
                  <label for="username">Last Name</label>
                  <input type="text" name="last_name" class="form-control {{$errors->has('last_name')?'is-invalid':''}}" required value="{{old('last_name')?old('last_name'):$user->last_name}}">
              </div>
              <div class="form-group">
                  <label for="username">Email</label>
                  <input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" required value="{{old('email')?old('email'):$user->email}}">
              </div>
              <div class="form-group">
                  <label for="username">Mobile Number</label>
                  <input type="number" name="mobile" class="form-control {{$errors->has('mobile')?'is-invalid':''}}" required value="{{old('mobile')?old('mobile'):$user->mobile}}">
              </div>
              <div class="form-group">
                    <label for="media_id">Images</label>
                    @if($user->image)
                    <div style="width:100%;height:150px">
                        <i class="fa fa-times icon-times"></i>
                        <img style="height:150px" src="{{asset('/storage/uploads/'.$user->image->file_name)}}"/>
                    </div>
                    <br/>
                    @endif
                    <input type="file" name="media_id"/>
              </div>
              <div class="form-group">
                  <label for="username">Password</label>
                  <input type="text" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" required value="{{old('password')?old('password'):$user->password}}">
              </div><div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required>
                  <option  value="{{App\User::STATUS_ACTIVE}}" {{($user->status == App\User::STATUS_ACTIVE)?'selected':''}}>Active</option>
                    <option value="{{App\User::STATUS_INACTIVE}}" {{($user->status == App\User::STATUS_INACTIVE)?'selected':''}}>Inactive</option>
                  </select>
                </div>
              <button class="btn btn-primary" type="submit">Submit</button>
          </form>
        </div>
      </div>
  </div>
@endsection