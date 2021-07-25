{{-- {{dd('salam')}} --}}
@extends('layouts.dashboard')
@section('page_title','Add Payment details')
@section('content')

<form method="POST" action="/restaurent/merchantid">
  @csrf
<div class="form-group">
  <label for="merchant_id">Merchant ID</label>
  <input type="text" name="merchant_id" class="form-control " required="" value="">
</div>
<div class="form-group">
  <label for="secert_key">Merchant Secert Key</label>
  <input type="text" name="secert_key" class="form-control " required="" value="">
</div>
<button class="btn btn-primary" type="submit">Submit</button>
</form>

@endsection