@extends('layouts.app')

@section('title')
    edit Area
@endsection

@section('content')


    <form method="POST" action= "{{route('areas.update',$area['id'])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
     
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput2"  value="{{$area['name']}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
            <input name="address" type="text" class="form-control" id="exampleFormControlInput1"  value="{{$area['address']}}">

        </div>
        <div class="mb-3">
        <label for="user-name">COUNTRY</label>
            <select name="country_id" class="form-control mb-2" id="country">
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
            </div>
        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection