@extends('layouts.app')

@section('title')
    Create address
@endsection

@section('content')


<form action="{{route("useraddresses.store")}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Street Name</label>
            <input name="street_name" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Building Number</label>
            <input name="building_number" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Flat Number</label>
            <input name="flat_number" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Floor Number</label>
            <input name="floor_number" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3">
        <label for="area">Area</label>
            <select name="area" class="form-control" >
                @foreach($areas as $area)
                <option value="{{$area->id}}"->{{$area->name}}</option>                 @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user" class="form-label">User</label>
                <select class="js-example-basic-multiple select2 @error('user') is-invalid @enderror" name="user"  style="width: 100%;" >
                        @foreach($users as $user)
                            <option value="{{$user->type->id}}">{{$user->type->name}}</option>
                        @endforeach
                </select>
        </div>
        <div class="form-group">
                    <label for="is_main">Is this your main Address?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_main" id="flexRadioDefault1" value="yes">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_main" id="flexRadioDefault2" value="no">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>

                    @error('is_main')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection