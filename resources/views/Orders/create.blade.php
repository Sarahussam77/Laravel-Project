@extends('layouts.app')

@section('title')
    Create Order
@endsection

@section('content')


    <form action="{{route('orders.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name_of_user1" class="form-label">User</label>
            <select id="user_id" name="name_of_user" class="form-control">
                <option  selected disabled>-- Select A user -- </option>
                    @foreach($users as $user)
                    <option value="{{$user->type->typeable_id}}">{{$user->type->name}}</option>
                    @endforeach
                  </select>
            </select>
        </div>
         <div class="mb-3">
            <label for="address" class="form-label">Address :street name</label>
            <select id="address" name="address" class="form-control">
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
            <label for="med[]" class="form-label">Medicine Name</label>
            <select class="form-control medicane" name="med[]" multiple="multiple" >   
                @foreach($medicine as $med)
                    <option value="{{$med->id}}">{{$med->name}}</option>
                @endforeach
            </select>
        </div>
      
       
        <div class="mb-3">
            <label for="qty[]" class="form-label">Quantity</label>
            <select class="form-control quantity" name="qty[]" multiple="multiple" >
                        @for($x=1;$x<=10;$x++)
                            <option value="{{$x}}">{{$x}}</option>
                        @endfor
                        </select>
        </div>
        <div class="mb-3">
        <label for="DocName">Doctor Name</label>
            <select name="DocName" class="form-control" >
                @foreach($doctors as $doctor)
                    <option value=" {{ $doctor->type->id }}">{{$doctor->type->name}}</option>
                 @endforeach
            </select>
        </div>
        {{-- <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
            <input name="price" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$medicine->price}}">
        </div> --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" >
                <option>NEW</option>
            </select>
        </div>
        
        <div class="form-group">
                        <label for="PharmacyName">Pharmacy Name</label>
                        <select name="PharmacyName" class="form-control " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          @foreach($pharmacy as $phar)
                          <option value="{{ $phar->type->id }}">{{$phar->type->name}}</option>
                          @endforeach
                        </select>
        </div>
            
        

        <button class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
    <script>
        $(".medicane").select2({
           tags: true
           
         });
         $(".quantity").select2({
           tags: true
           
         });    
         $(document).ready(function() {
            
            $('#user_id').change(function() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                let user_id=$('#user_id').val();
                console.log (user_id);
    
                    $.ajax({
                url: "ajaxShipping",
                type: "POST",
                data: { id: user_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                        $('#address').html(response)
                },
                error: function() {
                    console.log("Error retrieving data from server.");
                }
                    });
                    });

                });
   
         
   </script>
@endsection