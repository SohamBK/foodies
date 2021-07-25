@extends('layouts.dashboard')
@section('page_title','Add Email')
@section('content')

<style>
  li.select2-selection__choice {
      background-color: #3490dc !important;
      font-size: 17px;
      color: white;
  }
  .select2-selection__choice__remove {
      color: black !important;
      font-size:20px;
  }
</style>

<div class="card">
        @if($errors->any())
          <div class="alert alert-danger" role="alert">
              <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
        @endif
    <div class="card-body">
        <div class="card-body table-responsive p-0">
          <form method="POST" action="/email">
            @csrf
            <div class="form-group">
              <label>Send To</label>
              <select class="form-control group" width="300px" required>
                <option  value="">Select group to send mail...</option>
                <option  value="admin">admin</option>
                <option value="restaurent">restaurent</option>
                <option  value="coustomer">coustomer</option>
              </select>
            </div>

            {{-- <div class="form-group">
              <label for="to">To</label>
              <select class="form-control" id="to" name="to[]" data-tags="true" data-placeholder="TAGS" multiple="multiple">
              </select>
          </div> --}}

              <div class="form-group">
                <label for="to">To</label>
                <textarea name="to" class="form-control {{$errors->has('to')?'is-invalid':''}}" required value="{{old('to')}}"></textarea>
              </div>
              <div class="form-group">
                <label for="cc">Cc</label>
                <input type="text" name="cc" class="form-control {{$errors->has('cc')?'is-invalid':''}}"  value="{{old('cc')}}">
              </div>
              <div class="form-group">
                <label for="bcc">BCc</label>
                <input type="text" name="bcc" class="form-control {{$errors->has('bcc')?'is-invalid':''}}"  value="{{old('bcc')}}">
              </div>
              {{-- <div class="form-group">
                <label for="from">From</label>
                <input type="text" name="from" class="form-control {{$errors->has('from')?'is-invalid':''}}"  value="{{old('from')}}">
              </div> --}}
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control {{$errors->has('subject')?'is-invalid':''}}" required value="{{old('subject')}}">
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea class="textarea" name="body">
                </textarea>
              </div>
            <button class="btn btn-primary" type="submit" ><i class="fa fa-envelope-o"> Send</i></button>
        </form>
      </div>
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
{{-- <!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script> --}}
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.textarea').ckeditor();
    </script>
    <script type="text/javascript">
    
$(function(){

  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
  
  $('.group').on('change',function(){
    //$(".group").change(function(){
			var selected = $(".group :selected").val();
      console.log(selected);
            //$("#sendsms-sms_text").val("");
            $.ajax({
                    type:"POST",
                    url: "<?= url("/email/senders") ?>",
                    data: {selected: selected},
                    success: function (data) {
                      //console.log(data);
                      var data = JSON.parse(data);
                      var emails = '';
                      for(i=0;i < data.length; i++){
                       // console.log(data[i]);
                        emails += data[i]+', ';
                      };
                      $("[name='to']").text(emails)

                      // data.forEach(function(element) {  
                      //       console.log(element);  
                      //       $("[name='to']").appendTo(element)
                      //   });

                     // $("[name='to']").val(data);
                    //  $("[name='to']").each(function(){

                    //  });                                                               
                    }
                });
        });
   });

    </script>
        
        <script>
          $(document).ready(function(){
              $("#to").select2({ 
                tags: true,
              });
          });
      </script>

@endsection
