@extends('layouts.dashboard')
@section('page_title','Cities List')
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
                <strong>Showing {{$cities->firstItem()}} to {{$cities->lastItem()}} out of  {{$cities->total()}}</strong> 
                <!-- search section start -->
                <div class="pull-right mb-2">
                  <a class="btn btn-dark btn-sm mr-2" href="{{url('city')}}" >Reset</a> 
                  <button class="btn btn-dark btn-sm search">Search</button>
                </div>
                <div class="toggle">
                  <form action="/city" method="get">
                    @csrf
                    <div class="form-group">
                        <label for=""><strong>Advanced Search</strong></label><br>
                          <div class="form-group">
                            <label>Select Column</label>
                            <select class="form-control selection" name="column" required>
                              <option value="">Select search column here...</option>
                              <option  value="name">City Name</option>
                              {{-- <option value="status">Status</option> --}}
                            </select>
                          </div>
                          <div class="search-input">
                            <label for="username">Search</label>
                              <input type="text" name="search" class="search-text form-control {{$errors->has('name')?'is-invalid':''}}" value="{{old('name')}}" required placeholder="keyword">
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
                    <th>City Name</th>
                    <th>Status</th>
                  </tr>
                  <?php $id = $cities->firstItem() ?>
                  @foreach($cities as $city)
                    <tr class="table-tr" data-href="/city/{{$city->id}}">
                    <td>{{$id}}</td>
                      <td>{{$city->name}}</td>
                      <td><?php echo App\City::$status[$city->status]; ?></td>
                    </tr>
                    <?php $id++; ?>
                  @endforeach
                </tbody>
            </table>
            {{$cities->onEachSide(5)->links()}}
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
