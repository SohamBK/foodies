{{-- {{dd('hiii')}} --}}

@extends('layouts.dashboard')
@section('page_title','Update Email')
@section('content')
<style>
.icon-times{
    font-size:20px;
    color:red;
    background-color:cornsilk;

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
        <form method="POST" action="/email/{{$email->id}}">
            @csrf
            @method('patch')
              <div class="form-group">
                <label for="to">To</label>
                <input type="text" name="to" class="form-control {{$errors->has('to')?'is-invalid':''}}" required value="{{old('to')?old('to'):$email->to}}">
              </div>
              <div class="form-group">
                <label for="cc">Cc</label>
                <input type="text" name="cc" class="form-control {{$errors->has('cc')?'is-invalid':''}}" required value="{{old('cc')?old('cc'):$email->cc}}">
              </div>
              <div class="form-group">
                <label for="bcc">BCc</label>
                <input type="text" name="bcc" class="form-control {{$errors->has('bcc')?'is-invalid':''}}" required value="{{old('bcc')?old('bcc'):$email->bcc}}">
              </div>
              <div class="form-group">
                <label for="from">From</label>
                <input type="text" name="from" class="form-control {{$errors->has('from')?'is-invalid':''}}" required value="{{old('from')?old('from'):$email->from}}">
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control {{$errors->has('subject')?'is-invalid':''}}" required value="{{old('subject')?old('subject'):$email->subject}}">
              </div>
              
              <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="textarea" class="form-control {{$errors->has('body')?'is-invalid':''}}" required value="{{old('body')?old('body'):$email->body}}">
                </textarea>
              </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
      
      $('#textarea').ckeditor();
      CKEDITOR.instances.editor1.setData( '<p>This is the editor data.</p>' );
     // CKEDITOR.instances['#textarea'].setData('<b>bold</b>');
      $(document).ready(function() { 
        CKEDITOR.instances.editor1.setData( '<p>This is the editor data.</p>' );
       // CKEDITOR.setData('dfkljasdlkfjlaksdjf'); 
     // CKEDITOR.instances['#textarea'].setHtml('<b>bold</b>');
       // $('.cke_editable .cke_contents_ltr > p').html('<b>bold</b>');
      });
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
@endsection