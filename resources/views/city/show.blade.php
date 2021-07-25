<?php //echo dd($user) ?>
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
            <form method="post" action="/city/{{$city->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this City?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/city/{{$city->id}}/edit">
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
          <td>City Name</td>
          <td>
            <div class="">
              {{$city->name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>status</td>
          <td>
            <div class="">
              {{App\City::$status[$city->status]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created By</td>
          <td>
            <div class="">
              {{$city->createdBy?$city->createdBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updted By</td>
          <td>
            <div class="">
              {{$city->updatedBy?$city->updatedBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{$city->created_at}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updated At</td>
          <td>
            <div class="">
              {{$city->updated_at}}
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