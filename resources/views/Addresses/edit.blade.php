@extends('layouts.app')

@section('title')
    edit address
@endsection

@section('content')


    <form action="#" enctype="multipart/form-data">
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
        
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection