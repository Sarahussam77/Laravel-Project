@extends("layouts.app")


@section("content")

<h1>show</h1>
<div class="card mt-6 m-5">
        <div class="card-header">
            Pharmacy Details
        </div>
        <div class="card-body">
            <p class="card-title">Name: {{$doctors->type->name}}</p>
            <p class="card-text">National ID: {{$doctors['national_id']}}</p> 
            <p class="card-text">Pharmacy Name: {{$doctors->pharmacy->type->name}}</p> 
        </div>

        <div class="card mt-6 m-3">
        <div class="card-header">
            Doctor Image
        </div>
        <div class="card-body">
            <p class="card-text">Image: {{$doctors['avatar']}}</p>
        </div>
    </div>
    </div>

@endsection




