@extends('layouts.app')

@section('title')
    edit Client 
@endsection

@section('content')


<form method="POST" action= "{{route('clients.update',$client['id'])}}" enctype="multipart/form-data">
    @method('PUT')
     @csrf
        

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlTextarea1"  value="{{$client->type->name}}">
        </div>
        <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Date of birth</label>
      <input type="text" name="date_of_birth" class="form-control" id="exampleFormControlTextarea1"  value="{{$client->date_of_birth}}">
      
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Date of birth</label>
        <input type="text" name="phone" class="form-control" id="exampleFormControlTextarea1"  value="{{$client->phone}}">
        
      </div>

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection