@extends('layouts.dashboard')
@section('page_title','Users List')
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
            <strong>Showing {{$users->firstItem()}} to {{$users->lastItem()}} out of  {{$users->total()}}</strong> 
            <!-- search section start -->
            <div class="pull-right mb-2">
              <a class="btn btn-dark btn-sm mr-2" href="{{url('user')}}" >Reset</a> 
              <button class="btn btn-dark btn-sm search">Search</button>
            </div>
            <div class="toggle">
              <form action="/user" method="get">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Advanced Search</strong></label><br>
                      <div class="form-group">
                        <label>Select Column</label>
                        <select class="form-control selection" name="column" required>
                          <option value="">Select search column here...</option>
                          <option  value="username">Username</option>
                          {{-- <option  value="first_name">First Name</option>
                          <option  value="last_name">Last Name</option> --}}
                          <option  value="email">Email</option>
                          <option  value="mobile">Mobile</option>
                        </select>
                      </div>
                      <div class="search-input">
                        <label for="username">Search</label>
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
                    <th>Username</th>
                    {{-- <th>Fitst Name</th>
                    <th>Last Name</th> --}}
                    <th>Email</th> 
                    <th>Mobile Number</th>
                    <th>Status</th>
                  </tr>
                  <?php $id = $users->firstItem() ?>
                  @foreach($users as $user)
                    <tr class="table-tr" data-href="/user/{{$user->id}}">
                    <td>{{$id}}</td>
                      <td>{{$user->username}}</td>
                      {{-- <td>{{$user->first_name}}</td>
                      <td>{{$user->last_name}}</td> --}}
                      <td>{{$user->email}}</td>
                      <td>{{$user->mobile}}</td>
                      <td><?php echo App\User::$status[$user->status]; ?></td>
                    </tr>
                    <?php $id++; ?>
                  @endforeach
                </tbody>
            </table>
            {{$users->onEachSide(5)->links()}}
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
