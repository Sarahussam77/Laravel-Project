@extends('layouts.app')

@section('title') 
display doctor 
@endsection
@section('content')
    <div class="container">
      <div class="d-inline-flex">
<div class="card m-3">
  <div class="card-header">
    Doctor Info
  </div>
  <div class="card-body">
    <h5 class="card-title">User:</h5>
    <!-- <p class="card-text"></p> -->
    <h5 class="card-title">Medicine Name:</h5>
    <!-- <p class="card-text"></p> -->

    <h5 class="card-title">Quantity:</h5>
    <!-- <p class="card-text"></p> -->

    <h5 class="card-title">Type:</h5>
    <!-- <p class="card-text"></p> -->

    <h5 class="card-title">Price:</h5>
    <!-- <p class="card-text"></p> -->
        
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $order->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>