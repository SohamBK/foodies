<?php //echo dd($user) ?>
{{-- {{dd($user->image)}} --}}
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
            <form method="post" action="/user/{{$user->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this User?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/user/{{$user->id}}/edit">
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
        <tr>
          <td>UserName</td>
          <td>
            <div class="">
              {{$user->username}}
            </div>
          </td>
        </tr>
        <tr>
          <td>First Name</td>
          <td>
            <div class="">
              {{$user->first_name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>
            <div class="">
              {{$user->last_name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
            <div class="">
              {{$user->email}}
            </div>
          </td>
        </tr>
        <tr>
          <td>User Image</td>
          <td>
            @if($user->image)
            <div style="width:100%;height:190px">
              <img style="height:190px" src="{{asset('/storage/uploads/'.$user->image->file_name)}}"/>
            </div>
            @endif
          </td>
        </tr>
        <tr>
          <td>Mobile</td>
          <td>
            <div class="">
              {{$user->mobile}}
            </div>
          </td>
        </tr>
        <tr>
          <td>status</td>
          <td>
            <div class="">
              {{App\User::$status[$user->status]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created By</td>
          <td>
            <div class="">
              {{$user->createdBy?$user->createdBy->username:''}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updted By</td>
          <td>
            <div class="">
              {{$user->updatedBy?$user->updatedBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{$user->created_at}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updated At</td>
          <td>
            <div class="">
              {{$user->updated_at}}
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