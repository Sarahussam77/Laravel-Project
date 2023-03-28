@extends('layouts.app')

@section('title')
    Create Order
@endsection

@section('content')


    <form action="#" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">User</label>
            <select name="name_of_user" class="form-control">
                    <option >User One</option>
                    <option >User Two</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Medicine Name</label>
            <input name="medicine_name" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
            <textarea name="quantity" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Type</label>
            <textarea name="type" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
            <textarea name="price" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection