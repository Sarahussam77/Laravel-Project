@extends('layouts.app')

@section('title')
    Create Medicinie
@endsection

@section('content')


    <form method="POST" action= "{{route('medicines.store')}}"  enctype="multipart/form-data">
        @csrf
       
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Type</label>
            <input name="type" type="text" class="form-control" id="exampleFormControlInput1">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
            <input name="price" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection