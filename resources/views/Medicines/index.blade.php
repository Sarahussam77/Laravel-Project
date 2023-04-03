@extends("layouts.app")


@section("content")

<div class="text-center">
    <a href="{{route('medicines.create')}}" class="mt-4 btn btn-success">Add Medicine</a>
</div>
@if(isset($alert))
<div class="alert alert-{!! $alert['type'] !!} alert-dismissable" 
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
    {!! $alert['message']!!}
</div>
 @endif
<div class="container mt-5 ">
    <table id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                 <th>Name</th>
                 <th>type</th>
                <th>price</th>
                <th>Action</th>
            </tr>
        </thead>
            <tbody>
            
            </tbody>
        
    </table>
    </div>
    
    <script>
      $data=  $(document).ready(function() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax: {
            url:"{{ route('medicines.index') }}",
        },
        columns: [
                  {data: 'id', name: 'id'},
                  {data: 'name', name: 'name'},
                  {data: 'type', name: 'type'},
                  {data: 'price', name: 'price'},
                  {data: 'action', name: 'action', orderable: true, searchable: true},
              ]
    });
} );



    </script>
@endsection