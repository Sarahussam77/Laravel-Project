@extends("layouts.app")


@section("content")

<h1>show</h1>
<div class="card mt-6 m-5">
        <div class="card-header">
            Pharmacy Details
        </div>
        <div class="card-body">
            <p class="card-title">Name: {{$pharmacies->type->name}}</p>
            <p class="card-text">National ID: {{$pharmacies['national_id']}}</p> 
            <p class="card-text">Area: {{$pharmacies['area_id']}}</p> 
        </div>

        <div class="card mt-6 m-3">
        <div class="card-header">
            Pharmacy Image
        </div>
        <div class="card-body">
            <p class="card-text">Image: {{$pharmacies['avatar']}}</p>
        </div>
    </div>
    </div>

@endsection