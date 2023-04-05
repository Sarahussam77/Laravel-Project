@extends('layouts.app')

@section('title')
    edit Doctor
@endsection

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
<form method="POST" action= "{{route('doctors.update',$doctors['id'])}}" enctype="multipart/form-data">
    @method('PUT')
     @csrf
     @role('doctor')
     <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlTextarea1"  value="{{$doctors->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">email</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlTextarea1"  value="{{$doctors->email}}">
        </div>
      
     @endrole
        
     @role('pharmacy')
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlTextarea1"  value="{{$doctors->type->name}}">
        </div>
        <div class="mb-3">
           
      <label for="exampleFormControlTextarea1" class="form-label">Pharmacy name</label>
      <select name="pharmacy_id" class="form-control">
          @foreach($pharmacies as $pharmacy)
              <option value="{{$pharmacy->id}}">{{$pharmacy->type->name}}</option>
          @endforeach
      </select>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Avatar Image</label>
        <input name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        <img class="mt-2" src="{{'/'.'storage/'.$doctors->avatar}}" width="250"alt=""/>
      </div>
     
    </div>
 @endrole
        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection