@extends("layouts.app")


@section("content")
<div class="text-center">
        <a href="{{route('areas.create')}}" class="mt-4 btn btn-success">Create Area</a>
    </div>
    <div class="container mt-5 ">
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>address</th>
                    <th>action</th>
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
                url:"{{ route('areas.index') }}",
            },
            columns: [
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                      {data: 'address', name: 'address'},
                      {data: 'action', name: 'action', orderable: true, searchable: true},
                  ]
        });
    } );
    
    
    
        </script>
@endsection
