@extends("layouts.app")


@section("content")

<h1>show</h1>
<div class="card mt-6 m-5">
        <div class="card-header">
            Client Details
        </div>
        <div class="card-body">
            <p class="card-title">Name: {{$client->type->name}}</p>
            <p class="card-text">Email: {{$client->type->email}}</p> 
            <p class="card-text">Birthday: {{$client['date_of_birth']}}</p> 
        </div>

      
    </div>

@endsection