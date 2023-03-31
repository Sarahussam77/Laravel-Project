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
    <h5 class="card-title">Email:</h5>
    <p>{{$doctor['email']}}</p>
    <h5 class="card-title">Name:</h5>
    <p class="card-text">{{$doctor['name']}}</p>

    <h5 class="card-title">National ID:</h5>
    <p class="card-text">{{$doctor['national_id']}}</p>

    <img src="{{$doctor['image']}}" alt="">
    @if($doctor->image)
            <img src="{{Storage::url($doctor->image)}}" width="250px"   alt="{{$doctor->image}}">
        @endif
        
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $doctor->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>

      

@endsection