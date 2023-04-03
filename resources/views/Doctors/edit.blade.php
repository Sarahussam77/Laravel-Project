@extends('layouts.app')

@section('title')
    edit Doctor
@endsection

@section('content')


<form method="POST" action= "{{route('doctors.update',$doctors['id'])}}" enctype="multipart/form-data">
    @method('PUT')
     @csrf
        
         <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlTextarea1"  value="{{$doctors->type->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlTextarea1"  value="{{$doctors->type->name}}">
        </div>
       
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">National Id</label>
            <input type="number" name="avatar_image" class="form-control" id="exampleFormControlTextarea1"  value="{{$doctors->national_id}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">National ID</label>
            <input name="national_id" class="form-control"  rows="3" value="{{$doctors['national_id']}}">
        </div>
        <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Pharmacy name</label>
      <select name="pharmacy_id" class="form-control">
          @foreach($pharmacies as $pharmacy)
              <option value="{{$pharmacy->id}}">{{$pharmacy->type->name}}</option>
          @endforeach
      </select>
    </div>
        
        
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection