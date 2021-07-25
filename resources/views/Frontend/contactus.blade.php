{{-- {{dd('hiiii')}} --}}
@extends('layouts.frontendnav')
@section('content')

<style>
  html {
    box-sizing: border-box;
  }
  
  *, *:before, *:after {
    box-sizing: inherit;
  }
  
  .column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
  }
  
  @media screen and (max-width: 650px) {
    .column {
      width: 100%;
      display: block;
    }
  }
  
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }
  
  .container {
    padding: 0 16px;
  }
  
  .container::after, .row::after {
    content: "";
    clear: both;
    display: table;
  }
  
  .title {
    color: grey;
  }
  
  .button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
  }
  
  .button:hover {
    background-color: #555;
  }
  </style>
  
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container justify-content-center">
    <div class="container justify-content-center">
<h4>Email us at</h4>
{{-- <p>Resize the browser window to see the effect.</p> --}}
<br>

<div class="row">
  <div class="column col-md-4">
    <div class="card">
      <img src="../img/images.png" alt="Mike" style="float:center; width:250px; height:250px; align:middle;">
      <div class="container">
        <h3>Soham Balekar</h3>
        {{-- <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p> --}}
        <p>soham123@gmail.com</p>
        {{-- <p><button class="button">Contact</button></p> --}}
      </div>
    </div>
  </div>

  <div class="column col-md-4">
    <div class="card">
      <img src="../img/images.png" alt="Mike" style="float:center; width:250px; height:250px; align:middle;">
      <div class="container">
        <h3>Rais Ansari</h2>
        {{-- <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p> --}}
        <p>ansarirais@gmail.com</p>
        {{-- <p><button class="button">Contact</button></p> --}}
      </div>
    </div>
  </div>
  <div class="column col-md-4">
    <div class="card">
      <img src="../img/images.png" alt="Mike" style="float:center; width:250px; height:250px; align:middle;">
      <div class="container">
        <h3>Parag Bansode</h3>
        {{-- <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p> --}}
        <p>parag@gmail.com</p>
        {{-- <p><button class="button">Contact</button></p> --}}
      </div>
    </div>
  </div>
</div>
<div>
</div>
<br>
@endsection