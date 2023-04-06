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
                    <th>user</th>
                        <th>doctor</th>
                        <th>pharmacy</th>
                        <th>status</th>
                        <th>processing</th>
                        <th>is_insured</th>
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
                      {data: 'user', name: 'user'},
                      {data: 'doctor', name: 'doctor'},
                      {data: 'Pharmacy', name: 'Pharmacy'},
                      {data: 'status', name: 'status'},
                      {data: 'processing', name: 'processing'},
                      {data: 'is_insured', name: 'is_insured'},
                      {data: 'price', name: 'price'},
                      {data: 'action', name: 'action', orderable: true, searchable: true},
                  ]
        });
    } );
    
    
    
        </script>

@endsection