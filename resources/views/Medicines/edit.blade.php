@extends('layouts.app')

@section('title')
    edit Medicinie
@endsection

@section('content')


<form method="POST" action= "{{route('medicines.update',$medicine['id'])}}" enctype="multipart/form-data">
    @method('PUT')
        @csrf
       
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput2" value="{{$medicine->name}}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Type</label>
            <input name="type" type="text" class="form-control" id="exampleFormControlInput1" value="{{$medicine->type}}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
            <input name="price" type="text" class="form-control" id="exampleFormControlInput1" value="{{$medicine->price}}">
        </div>
        
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection