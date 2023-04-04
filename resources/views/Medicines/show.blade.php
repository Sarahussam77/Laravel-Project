@extends("layouts.app")


@section("content")

<h1>show</h1>
<div class="card mt-6 m-5">
        <div class="card-header">
            Medicine Details
        </div>
        <div class="card-body">
            <p class="card-title">Name: {{$medicine->name}}</p>
            <p class="card-text">Type: {{$medicine->type}}</p> 
            <p class="card-text">Price: {{$medicine->price}}$</p> 
        </div>

@endsection