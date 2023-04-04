@extends('layouts.app')

@section('title')
    Edit
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
    <form method="POST" action= "{{route('pharmacies.update',$pharmacies['id'])}}" enctype="multipart/form-data">
    @method('PUT')
     @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control"  value="{{$pharmacies->type->name}}">
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
            <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Avatar Image</label>
        <input name="avatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        <img class="mt-2" src="{{'/'.'storage/'.$pharmacies->avatar}}" width="250"alt=""/>
      </div>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection