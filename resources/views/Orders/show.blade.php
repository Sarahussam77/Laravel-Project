



@extends("layouts.app")


@section("content")

<h1>show</h1>
<div class="card mt-6 m-5">
        <div class="card-header">
            Order Details
        </div>
        <div class="card-body">
            <p class="card-title"value{{$order->client->id}}>User: {{$order->client->type->name}}</p>
            <p class="card-text">Email: {{$order->client->type->email}}</p>
            <p class="card-text">Is Insured ? {{$order->is_insured}}</p> 
            <p class="card-text">Pharmacy:{{$order->pharmacy->type->name}}</p>
            <p class="card-text">Doctor Name: {{$order->doctor->type->name}}</p>
            <p class="card-text">Status: {{$order->status}}</p>
            
        @if($order->price==0)
        <form action="{{route('orders.complete',$order['id'])}}" method="POST">
          @csrf
         
             
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
      <button  class="btn btn-success" style="background-color:#6D9886 ; color:white">Submit</button>
    </form>
          @endif
        </div>

        <div class="card mt-6 m-3">
        <div class="card-header">
            Order Image
        </div>
        <div class="card-body">
            <img src="{{'/'.'storage/'.$order->prescription->pluck('path')[0]}}" width="250" alt=""/>
        </div>
    </div>
    </div>
<script>
  $(".medicane").select2({
           tags: true
           
         });
         $(".quantity").select2({
           tags: true
           
         });    
</script>
@endsection