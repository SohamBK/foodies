{{-- {{dd($dish->dishCategory)}} --}}

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
            <form method="post" action="/dish/{{$dish->id}}">
                @csrf
                @method('delete')
                <input type="submit" onclick="return confirm('Are you sure, you want to delete this Dish?')" class="btn btn-danger" value="Delete"/>
            </form>
        </div>
        <div class="col-md-1">
            <form method="get" action="/dish/{{$dish->id}}/edit" enctype = 'multipart/form-data'>
                <input type="submit" class="btn btn-success" value="Update"/>
            </form>
        </div>
        {{-- <div class="col-md-1">
          <form method="get" action="/customization/{{$dish->id}}/create" enctype = 'multipart/form-data'>
              <input type="submit" class="btn btn-primary" value="Customization"/>
          </form>
      </div> --}}
      {{-- <div class="col-md-3" style="margin-left: 48px;">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">
              Add Customization Option
            </button>
      
      </div> --}}
      </div>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-condensed">
        <tbody><tr>
          <th>Name</th>
          <th>description</th>
        </tr>
        <tr>
          <td>Dish Name</td>
          <td>
            <div class="">
              {{$dish->name}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Dish Image</td>
          <td>
            @if($dish->image)
            <div style="width:100%;height:190px">
              <img style="height:190px" src="{{$dish->image?asset('/storage/uploads/'.$dish->image->file_name):''}}"/>
            </div>
            @endif
          </td>
        </tr>
          <td>Desription</td>
          <td>
            <div class="">
              {{$dish->description}}
            </div>
          </td>
        </tr>
        <td>Price</td>
        <td>
          <div class="">
            {{$dish->price}}
          </div>
        </td>
      </tr>
      <tr>
          <td>Dish Type</td>
          <td>
            <div class="">
              {{App\Dish::$dish_for[$dish->dish_for]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>status</td>
          <td>
            <div class="">
              {{App\Dish::$status[$dish->status]}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created By</td>
          <td>
            <div class="">
              {{$dish->createdBy?$dish->createdBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updted By</td>
          <td>
            <div class="">
              {{$dish->updatedBy?$dish->updatedBy->username:'-'}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>
            <div class="">
              {{$dish->created_at}}
            </div>
          </td>
        </tr>
        <tr>
          <td>Updated At</td>
          <td>
            <div class="">
              {{$dish->updated_at}}
            </div>
          </td>
        </tr>
        {{-- <tr>
            <td>Updated At</td>
            <td>
              <div class="">
                @foreach ($dish->dishCategory as $dishCategory)
                    {{$dishCategory}}
                    
                @endforeach
              </div>
            </td>
          </tr> --}}
      </tbody></table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<div class="col-lg-12">
<div class="card">
  <div class="card-body">
      <div class="card-body ">
              <table class="table table-hover">
                <tbody>
                {{-- <tr>
                  <th>Sr. No.</th>
                  <th>Customization Name</th>
                  <th>Options</th>
                  <th>Status</th>
                </tr> --}}
                  <?php $i=1; ?>
                  @foreach($dish->customization as $customization)
                  {{-- {{dd($customization->CustomizationName)}} --}}
                  <tr>
                  {{-- <td> {{$i++}}</td>
                  <td> {{$customization->name}}</td> --}}
                  <td> 
                   
                    @foreach($customization->CustomizationName as $c)
                      {{-- {{$c->name}}  -   Rs. {{$c->price}}<br> --}}
                    @endforeach
                  </td>
                  {{-- <td> {{App\Customization::$status[$customization->status]}}</td> --}}
                </tr>
                  @endforeach
               
              </tbody>
          </table>
          {{-- {{$dishes->onEachSide(5)->links()}} --}}
      </div>
  </div>
</div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Customization Options</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="col-md-12">  
                  <form method="POST" action="/customization/optionstore">
                    @csrf
                  <div class="form-group">
                      <label for="city">Select Customization</label>
                      <input type="hidden" id="dishid" name="dish_id" value="{{$dish->id}}">
                      <select id="test" class='form-control' name="customization_id" required>
                        @foreach($dish->customization as $customization)
                          <option value="{{$customization->id}}">{{$customization->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="name">Option Name</label>
                      <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                      <label for="zip_code">Price</label>
                      <input type="number" name="price" class="form-control {{$errors->has('price')?'is-invalid':''}}" required value="{{old('price')}}">
                  </div>
                  <input type="submit" class="btn btn-primary">
                  </form>
              </div>
        </div>
      </div>
    </div>
  </div> --}}

@endsection