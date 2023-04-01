@extends('layouts.app')

@section('title')
    Create Order
@endsection

@section('content')


    <form action="{{route('orders.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name_of_user1" class="form-label">User</label>
            <select name="name_of_user" class="form-control">
                    @foreach($users as $user)
                    <option>{{$user->name}}</option>
                    @endforeach
                  </select>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address :street name</label>
            <select name="address" class="form-control">
                    @foreach($address as $add)
                    <option>{{$add->street_name}}</option>
                    @endforeach
                  </select>
            </select>
        </div>
        
        <div class="mb-3" >
                  <label for="insured">Is insured ?</label>
                  <select name="insured" class="form-control">
                    
                    <option>Yes</option>
                    <option>No</option>
                   
                  </select>
        </div>
        <div class="mb-3">
            <label for="med" class="form-label">Medicine Name</label>
            <select class="form-control" name="med" >   
                @foreach($medicine as $med)
                    <option value="{{$med->id}}">{{$med->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <select class="form-control" name="qty" >
                        @for($x=1;$x<=10;$x++)
                            <option value="{{$x}}">{{$x}}</option>
                        @endfor
                        </select>
        </div>
        <div class="mb-3">
        <label for="DocName">Doctor Name</label>
            <select name="DocName" class="form-control" >
                @foreach($doctors as $doctor)
                    <option>{{$doctor->name}}</option>
                 @endforeach
            </select>
        </div>
        <!-- <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
            <input name="price" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
        </div> -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" >
                <option>NEW</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="creator_type" class="form-label">Creator Type</label>
            <select name="creator_type" class="form-control" >
                <option>Doctor</option>
                <option>Pharmacy</option>
                <option>User</option>
            </select>
        </div>
        <div class="form-group">
                        <label for="PharmacyName">Pharmacy Name</label>
                        <select name="PharmacyName" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          @foreach($pharmacy as $phar)
                          <option>{{$phar->name}}</option>
                          @endforeach
                        </select>
        </div>
            
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
@endsection