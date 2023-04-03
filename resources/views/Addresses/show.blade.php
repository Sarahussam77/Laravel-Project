@extends('layouts.app')
@section('title') 
display address
@endsection
@section('content')
    <div class="container">
      <div class="d-inline-flex">
<div class="card m-3">
  <div class="card-header">
    Address Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Street Name:</h5>
    <p> {{$address['street_name']}}</p>

    <h5 class="card-title">Building Number: </h5>
    <p >{{$address['building_number']}}</p>

    <h5 class="card-title">Floor Number: </h5>
    <p >{{$address['floor_number']}}</p>

    <h5 class="card-title">Flat Number : </h5>
    <p >{{$address['flat_number']}}</p>

   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $address->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>

      

@endsection