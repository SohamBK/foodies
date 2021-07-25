{{-- {{dd('hiiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','Email List')
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
            <strong>Showing {{$emails->firstItem()}} to {{$emails->lastItem()}} out of  {{$emails->total()}}</strong> 
            <!-- search section start -->
            <div class="pull-right mb-2">
              <a class="btn btn-dark btn-sm mr-2" href="{{url('email')}}" >Reset</a> 
              <button class="btn btn-dark btn-sm search">Search</button>
            </div>
            <div class="toggle">
              <form action="/email" method="get">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Advanced Search</strong></label><br>
                      <div class="form-group">
                        <label>Select Column</label>
                        <select class="form-control selection" name="column" required>
                          <option value="">Select search column here...</option>
                          <option  value="to">To</option>
                          <option  value="subject">Subject</option>
                        </select>
                      </div>
                      <div class="search-input">
                        <label for="to">Search</label>
                          <input type="text" name="search" class="search-text form-control {{$errors->has('to')?'is-invalid':''}}" value="{{old('to')}}" required placeholder="keyword">
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
                    <th>To</th>
                    <th>Subject</th>
                    <th>Status</th>
                  </tr>
                  <?php $id = $emails->firstItem() ?>
                  @foreach($emails as $email)
                    <tr class="table-tr" data-href="/email/{{$email->id}}">
                    <td>{{$id}}</td>
                      <td>{{$email->to}}</td>
                      <td>{{$email->subject}}</td>
                      <td>
                        <div class="">
                          {{App\Email::$status[$email->status]}}
                        </div>
                      </td>
                    </tr>
                    <?php $id++; ?>
                  @endforeach
                </tbody>
            </table>
            {{$emails->onEachSide(5)->links()}}
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
