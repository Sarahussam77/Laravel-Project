@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')

    <form method="POST" action= "{{route('pharmacies.update',$pharmacies['id'])}}" enctype="multipart/form-data">
    @method('PUT')
     @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control"  value="{{$pharmacies->type->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input name="email" type="text" class="form-control"  value="{{$pharmacies->type->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">National ID</label>
            <input name="national_id" class="form-control"  rows="3" value="{{$pharmacies['national_id']}}">
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">Area</label>
            <select name="area_id" class="form-control">
            @if(isset($areas))
            @foreach($areas as $area)
                    @if($area->name == $pharmacies->area->name)
                        <option value="{{$area->id}}" selected>{{$area->name}}</option>
                    @else
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endif
            @endforeach
            @endif
            </select>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection