@extends("layouts.app")


@section("content")

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
    <p>{{$doctors['email']}}</p>
    <h5 class="card-title">Name:</h5>
    <p class="card-text">{{$doctors['name']}}</p>

    <h5 class="card-title">National ID:</h5>
    <p class="card-text">{{$doctors['national_id']}}</p>

    <img src="{{$doctors['image']}}" alt="">
    @if($doctors->image)
            <img src="{{Storage::url($doctors->image)}}" width="250px"   alt="{{$doctors->image}}">
        @endif
        
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $doctors->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>

      

@endsection




