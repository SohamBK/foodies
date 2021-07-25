@extends('layouts.dashboard')
@section('page_title','Delivery Staff List')
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
                <strong>Showing {{$deliverystaffs->firstItem()}} to {{$deliverystaffs->lastItem()}} out of  {{$deliverystaffs->total()}}</strong> 
                <!-- search section start -->
                <div class="pull-right mb-2">
                  <a class="btn btn-dark btn-sm mr-2" href="{{url('deliverystaff')}}" >Reset</a> 
                  <button class="btn btn-dark btn-sm search">Search</button>
                </div>
                <div class="toggle">
                  <form action="/deliverystaff" method="get">
                    @csrf
                    <div class="form-group">
                        <label for=""><strong>Advanced Search</strong></label><br>
                          <div class="form-group">
                            <label>Select Column</label>
                            <select class="form-control selection" name="column" required>
                              <option value="">Select search column here...</option>
                              <option  value="first_name">First Name</option>
                              <option  value="last_name">Last Name</option>
                              <option  value="email">Email</option>
                              {{-- <option value="status">Status</option> --}}
                            </select>
                          </div>
                          <div class="search-input">
                            <label for="username">Search</label>
                              <input type="text" name="search" class="search-text form-control {{$errors->has('first_name')?'is-invalid':''}}" value="{{old('first_name')}}" required placeholder="keyword">
                          </div>
                          <div class="form-group status-input" style="display:none;">
                            <label>Status</label>
                            <select class="form-control search-status" name="status">
                              <option value="">Choose status</option>
                              <option  value="10">Active</option>
                              <option value="0">Inactive</option>
                            </select>
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
                    {{-- <th>Retaurent Name</th> --}}
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile N0.</th>
                    <th>Status</th>
                  </tr>
                  <?php $id = $deliverystaffs->firstItem() ?>
                  @foreach($deliverystaffs as $deliverystaff)
                    <tr class="table-tr" data-href="/deliverystaff/{{$deliverystaff->id}}">
                    <td>{{$id}}</td>
                      {{-- <td>{{$deliverystaff->restaurent_name}}</td> --}}
                      <td>{{$deliverystaff->first_name}}</td>
                      <td>{{$deliverystaff->last_name}}</td>
                      <td>{{$deliverystaff->email}}</td>
                      <td>{{$deliverystaff->mobile}}</td>
                      <td><?php echo App\Deliverystaff::$status[$deliverystaff->status]; ?></td>
                    </tr>
                    <?php $id++; ?>
                  @endforeach
                </tbody>
            </table>
            {{$deliverystaffs->onEachSide(5)->links()}}
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
  
    $('.selection').on('change',function(){
        var selected = $('.selection :selected').val();
        if(selected == 'status')
        {
          $('.search-input').css('display','none');
          $('.status-input').css('display','initial');
  
          $('.search-text ').removeAttr('required');
          $('.search-status').prop('required',true);
        }
        else
        {
          $('.search-input').css('display','initial');
          $('.status-input').css('display','none');
  
          $('.search-status').removeAttr('required');
          $('.search-text ').attr('required',true);
        }
    }); 
  });
  </script>
@endsection
