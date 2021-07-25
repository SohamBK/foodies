{{-- {{dd('hiii')}} --}}

{{-- {{dd('hiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','View')
@section('content')
@if(Session::has('message'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
  <div class="card">
    <div class="card-header">
      {{-- <div class="row">
        <div class="col-md-1">
            <form method="post" action="/email/{{$email->id}}">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/email/{{$email->id}}/edit">
                <input type="submit" class="btn btn-success" value="Update"/>
            </form>
        </div>
      </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-condensed">
        <tbody><tr>
          <th>Name</th>
          <th>Detail</th>
        </tr>
        <tr>
          <td>To</td>
          <td>
            <div class="">
              {{$email->to}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Cc</td>
          <td>
            <div class="">
              {{$email->cc}}
            </div>
          </td>
        </tr>
        <tr>
          <td>BCc</td>
          <td>
            <div class="">
              {{$email->bcc}}
            </div>
          </td>
        </tr>
        <tr>
          <td>From</td>
          <td>
            <div class="">
              {{$email->from}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Subject</td>
          <td>
            <div class="">
              {{$email->subject}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Body</td>
          <td>
            <div class="">
              {!!$email->body!!}
            </div>
          </td>
        </tr>
        <tr>
          <td>Status</td>
          <td>
            <div class="">
              {{App\Email::$status[$email->status]}}
            </div>
          </td>
          <tr>
            <td>Created By</td>
            <td>
              <div class="">
                {{$email->createdBy?$email->createdBy->username:'-'}}
              </div>
            </td>
          </tr>
          <tr>
            <td>Updted By</td>
            <td>
              <div class="">
                {{$email->updatedBy?$email->updatedBy->username:'-'}}
              </div>
            </td>
          </tr>
          <tr>
            <td>Created At</td>
            <td>
              <div class="">
                {{$email->created_at}}
              </div>
            </td>
          </tr>
          <tr>
            <td>Updated At</td>
            <td>
              <div class="">
                {{$email->updated_at}}
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