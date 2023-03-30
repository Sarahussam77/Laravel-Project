@extends("layouts.app")

@section("content")

    <div class="text-center">
        {{-- style="background-color:#6D9886 ; color:white" --}}
        <a   href="{{route('orders.create')}}" class="mt-4 btn btn-success">Create Order</a>
    </div>
   
    <div class="container mt-5" style="overflow-x: auto;">
        <table id="myTable" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>user_id</th>
                    	<th> useraddress_id</th>
                        <th>doctor_id</th>
                        <th>pharmacy_id</th>
                        <th>status</th>
                        <th>actions </th>
                        <th>is_insured</th>
                        <th>creator_type</th>
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
            responsive: true,
            ajax: {
                url:"{{ route('orders.index') }}",
            },
            columns: [
                      {data: 'id', name: 'id'},
                      {data: 'user_id', name: 'user_id'},
                      {data: 'user_address_id', name: 'user_address_id'},
                      {data: 'doctor_id', name: 'doctor_id'},
                      {data: 'pharmacy_id', name: 'pharmacy_id'},
                      {data: 'status', name: 'status'},
                      {data: 'actions', name: 'actions'},
                      {data: 'is_insured', name: 'is_insured'},
                      {data: 'creator_type', name: 'creator_type'},
                      {data: 'price', name: 'price'},
                      {data: 'action', name: 'action', orderable: true, searchable: true},
                  ]
        });
    } );
    
    
    
        </script>

@endsection