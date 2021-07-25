{{-- {{dd('hii')}} --}}

@extends('layouts.dashboard')
@section('page_title','View')
@section('content')
@if(Session::has('message'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
  {{-- <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-1">
            <form method="post" action="/restaurent/{{$restaurent->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this Resturent?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/restaurent/{{$restaurent->id}}/edit" enctype = 'multipart/form-data'>
                <input type="submit" class="btn btn-success" value="Update"/>
            </form>
        </div>
      </div>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-condensed">
        <tbody><tr>
          <th>Name</th>
          {{-- <th>Detail</th> --}}
        </tr>
        <tr>
          <td>Category Name</td>
          <td>
            <div class="">
              {{$restaurent->name}}
            </div>
          </td>
        </tr>
        {{-- <tr>
          <td>No of Outlet</td>
          <td>
            <div class="">
              {{$restaurent->number_of_outlet?$restaurent->number_of_outlet:'-'}}
            </div>
          </td>
        </tr> --}}
        <tr>
          <td>Category</td>
          <td>
            <div class="">
              {{$restaurent->category}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Website Address</td>
          <td>
            <div class="">
              {{$restaurent->website_address}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Type</td>
          <td>
            <div class="">
              {{$restaurent->type?$restaurent->type:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Shop Registration Number</td>
          <td>
            <div class="">
              {{$restaurent->shop_register_number}}
            </div>
          </td>
        </tr>
        <tr>
          <td>GSTN Number</td>
          <td>
            <div class="">
              {{$restaurent->gstn}}
            </div>
          </td>
        </tr>
        <tr>
          <td>FSSAI Number</td>
          <td>
            <div class="">
              {{$restaurent->fssai}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Subscription</td>
          <td>
            <div class="">
              {{$restaurent->subscription?$restaurent->subscription:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Subscription ends on</td>
          <td>
            <div class="">
              {{$restaurent->subscription_end_date?$restaurent->subscription_end_date:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Merchant ID</td>
          <td>
            <div class="">
              {{$restaurent->merchant_id?$restaurent->merchant_id:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Secert Key</td>
          <td>
            <div class="">
              {{$restaurent->secret_key?$restaurent->secret_key:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>status</td>
          <td>
            <div class="">
              {{App\Restaurent::$status[$restaurent->status]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created By</td>
          <td>
            <div class="">
              {{$restaurent->createdBy?$restaurent->createdBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updted By</td>
          <td>
            <div class="">
              {{$restaurent->updatedBy?$restaurent->updatedBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{$restaurent->created_at}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updated At</td>
          <td>
            <div class="">
              {{$restaurent->updated_at}}
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