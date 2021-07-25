{{-- {{dd('hii')}} --}}

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
            <form method="post" action="/category/{{$category->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this Category?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/category/{{$category->id}}/edit" enctype = 'multipart/form-data'>
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
          <td>Category Name</td>
          <td>
            <div class="">
              {{$category->name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Category Image</td>
          <td>
              @if($category->image)
            <div style="width:100%;height:190px">
              <img style="height:190px" src="{{asset('/storage/uploads/'.$category->image->file_name)}}"/>
            </div>
            @endif
          </td>
        </tr>
          <td>Desription</td>
          <td>
            <div class="">
              {{$category->description}}
            </div>
          </td>
        </tr>
        <tr>
          <td>status</td>
          <td>
            <div class="">
              {{App\Category::$status[$category->status]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created By</td>
          <td>
            <div class="">
              {{$category->createdBy?$category->createdBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updted By</td>
          <td>
            <div class="">
              {{$category->updatedBy?$category->updatedBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{$category->created_at}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updated At</td>
          <td>
            <div class="">
              {{$category->updated_at}}
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