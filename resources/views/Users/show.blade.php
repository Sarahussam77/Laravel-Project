@extends('layouts.app')

@section('title') 
display user 
@endsection
@section('content')
    <div class="container">
      <div class="d-inline-flex">
<div class="card m-3">
  <div class="card-header">
    $user Info
  </div>
  <div class="card-body">
  <img src="{{$$user['avatar_image']}}" alt="">
    @if($$user->image)
            <img src="{{Storage::url($$user->avatar_image)}}" width="250px"   alt="{{$$user->avatar_image}}">
        @endif
    <h5 class="card-title">name:</h5>
    <p>{{$$user['name']}}</p>
    <h5 class="card-title">email:</h5>
    <p>{{$$user['email']}}</p>
    <h5 class="card-title">Gender:</h5>
    <p>{{$$user['gender']}}</p>
    <h5 class="card-title">Phone:</h5>
    <p>{{$$user['phone']}}</p>
    <h5 class="card-title">National ID:</h5>
    <p class="card-text">{{$$user['national_id']}}</p>
    <h5 class="card-title">National ID:</h5>
    <p class="card-text">{{$$user['national_id']}}</p>
    <h5 class="card-title">Date Of Birth:</h5>
    <p class="card-text">{{$$user['date_of_birth']}}</p>
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $$user->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>