@extends('layouts.app')

@section('title')
    Create Doctor
@endsection

@section('content')


    <form method="POST" action= "{{route('doctors.store')}}" enctype="multipart/form-data">
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
            <input name="password" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">National Id</label>
            <textarea name="national_id" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <!-- <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Image Avatar</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlTextarea1" >
        </div> -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Image Avatar</label>
            <input type="file" name="avatar" class="form-control" id="exampleFormControlTextarea1" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">is baned</label>
            <textarea name="is_baned" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="Pharmacy_id">Pharmacy Name</label>
            <select name="Pharmacy_id" class="form-control" >
            @if(isset($pharmacy))  
              @foreach($pharmacy as $phar)
                <option value="{{$phar->type->id}}">{{$phar->type->name}}</option>
              @endforeach
            @endif
            </select>
</div>
         

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection