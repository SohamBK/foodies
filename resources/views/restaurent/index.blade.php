{{-- {{dd('hiiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','Restaurent List')
@section('content')
<style>
.table-tr{
  cursor: pointer;
}
.toggle{
  margin-top:20px;
  padding:10px;
  border:2px solid #007bff;
  border-radius:10px;
  display:none;
}
</style>
<div class="card">
    <div class="card-body">
        <div class="card-body table-responsive p-0">
            <strong>Showing {{$restaurents->firstItem()}} to {{$restaurents->lastItem()}} out of  {{$restaurents->total()}}</strong> 
            <!-- search section start -->
            <div class="pull-right mb-2">
              <a class="btn btn-dark btn-sm mr-2" href="{{url('restaurent')}}" >Reset</a> 
              <button class="btn btn-dark btn-sm search">Search</button>
            </div>
            <div class="toggle">
              <form action="/restaurent" method="get">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Advanced Search</strong></label><br>
                      <div class="form-group">
                        <label>Select Column</label>
                        <select class="form-control selection" name="column" required>
                          <option value="">Select search column here...</option>
                          <option  value="name">Name</option>
                          {{-- <option  value="zip_code">Zip Code</option> --}}
                        </select>
                      </div>
                      <div class="search-input">
                        <label for="name">Search</label>
                          <input type="text" name="search" class="search-text form-control {{$errors->has('name')?'is-invalid':''}}" value="{{old('name')}}" required placeholder="keyword">
                      </div>
                  </div>
                  <button class="btn btn-primary btn-sm" type="submit">Submit</button>
              </form>
            </div>
            <!-- search section end -->
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    {{-- <th>Zip Code</th> --}}
                    <th>Status</th>
                  </tr>
                  <?php $id = $restaurents->firstItem() ?>
                  @foreach($restaurents as $restaurent)
                    <tr class="table-tr" data-href="/restaurent/{{$restaurent->id}}">
                    <td>{{$id}}</td>
                      <td>{{$restaurent->name}}</td>
                      {{-- <td>{{$restaurent->zip_code}}</td> --}}
                      <td><?php echo App\restaurent::$status[$restaurent->status]; ?></td>
                    </tr>
                    <?php $id++; ?>
                  @endforeach
                </tbody>
            </table>
            {{$restaurents->onEachSide(5)->links()}}
        </div>
    </div>
</div>
<script type="text/javascript">
  $(function(){
    $('.table-tr').on('click',function(){
      console.log($(this).data('href'));
      window.location = $(this).data('href');
    });
  
    $('.search').on('click',function(){
        $('.toggle').toggle('slide');
    });
  });
  </script>
@endsection
