@extends('layouts.app')

@section('title')
    edit Area
@endsection

@section('content')


    <form action="#" enctype="multipart/form-data">
        @csrf
     
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
            <input name="address" type="text" class="form-control" id="exampleFormControlInput1">

        </div>
        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection