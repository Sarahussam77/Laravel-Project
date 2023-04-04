@extends('layouts.app')

@section('title')
    edit Doctor
@endsection

@section('content')


<form method="POST" action= "{{route('doctors.update',$doctors['id'])}}" enctype="multipart/form-data">
    @method('PUT')
     @csrf
        

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

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection