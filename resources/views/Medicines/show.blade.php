@extends('layouts.app')

@section('title') 
display medicine 
@endsection
@section('content')
    <div class="container">
      <div class="d-inline-flex">
<div class="card m-3">
  <div class="card-header">
    Medicinie Info
  </div>
  <div class="card-body">
  
    <h5 class="card-title">Name:</h5>
    <p class="card-text">{{$medicine['name']}}</p>

    <h5 class="card-title">Quantity:</h5>
    <p class="card-text">{{$medicine['quantity']}}</p>

    <h5 class="card-title">Type:</h5>
    <p class="card-text">{{$medicine['type']}}</p>

    <h5 class="card-title">Price:</h5>
    <p class="card-text">{{$medicine['price']}}</p>
        
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $doctor->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>