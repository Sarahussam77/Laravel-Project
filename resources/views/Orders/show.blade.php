@extends('layouts.app')

@section('title') 
display doctor 
@endsection
@section('content')
    <div class="container">
      <div class="d-inline-flex">
<div class="card m-3">
  <div class="card-header">
   Order Info
  </div>
  <div class="card-body">
    <h5 class="card-title">User: {{$order->user->name}}</h5>
    <p class="card-text">Is Insured ? {{$order->is_insured}}</p>

    <h5 class="card-title">Pharmacy:{{$order->pharmacy->name}}</h5>
    <p class="card-text"></p>

    <h5 class="card-title">Doctor Name: {{$order->doctor->name}}</h5>
    <p class="card-text"></p>
    <h5 class="card-title">Status: {{$order->status}}</h5>
    <p class="card-text"></p>
        
   <p class=" text-danger card-text"><span class="fw-bold">created At:</span><br> {{ $order->created_at->format('l jS \\of F Y h:i:s A') }}</h5>  </div>
</div>
@endsection