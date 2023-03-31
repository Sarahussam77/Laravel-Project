@extends('layouts.app')

@section('title') 
display area 
@endsection
@section('content')
    <div class="container">
      <div class="d-inline-flex">
<div class="card m-3">
  <div class="card-header">
    Area Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Name:</h5>
    <p>{{$area['name']}}</p>
    <h5 class="card-title">Address:</h5>
    <p class="card-text">{{$area['address']}}</p>
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $area->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>

      

@endsection