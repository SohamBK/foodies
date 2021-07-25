{{-- {{dd('hiii')}} --}}

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
            <form method="post" action="/offer/{{$offer->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this Offer?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/offer/{{$offer->id}}/edit">
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
          <td>Offer Name</td>
          <td>
            <div class="">
              {{$offer->name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Offer Description</td>
          <td>
            <div class="">
              {{$offer->description}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Discount Type</td>
          <td>
            <div class="">
              {{App\Offer::$discount_type[$offer->discount_type]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Type</td>
          <td>
            <div class="">
              {{App\Offer::$type[$offer->type]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Offer value</td>
          <td>
            <div class="">
              {{$offer->value}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Valid From</td>
          <td>
            <div class="">
              {{date('Y-m-d',strtotime($offer->valid_from))}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Valid Upto</td>
          <td>
            <div class="">
              {{date('Y-m-d',strtotime($offer->valid_upto))}}
            </div>
          </td>
        </tr>
        <tr>
        <tr>
          <td>Minimum Order</td>
            <td>
              <div class="">
                {{$offer->minimum_order}}
              </div>
            </td>
         </tr>
          <td>Status</td>
          <td>
            <div class="">
              {{App\Offer::$status[$offer->status]}}
            </div>
          </td>
          <tr>
            <td>Created By</td>
            <td>
              <div class="">
                {{$offer->createdBy?$offer->createdBy->username:'-'}}
              </div>
            </td>
          </tr>
          <tr>
            <td>Updted By</td>
            <td>
              <div class="">
                {{$offer->updatedBy?$offer->updatedBy->username:'-'}}
              </div>
            </td>
          </tr>
          <tr>
            <td>Created At</td>
            <td>
              <div class="">
                {{$offer->created_at}}
              </div>
            </td>
          </tr>
          <tr>
            <td>Updated At</td>
            <td>
              <div class="">
                {{$offer->updated_at}}
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