@extends('layouts.app')

@section('title')
    Create Pharmaciest
@endsection

@section('content')


    <form method="POST" action= "{{route('pharmacies.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="exampleFormControlInput1">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <textarea name="password" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">National Id</label>
            <textarea name="national_id" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Priority</label>
            <textarea name="priority" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        
        
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Area</label>
            <select name="area_id" class="form-control">
            @if(isset($areas))
                @foreach($areas as $area)
                    <option value="{{$area->id}}"->{{$area->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Image Avatar</label>
            <input  name="avatar_image" class="form-control" id="exampleFormControlTextarea1" >
        </div>

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection