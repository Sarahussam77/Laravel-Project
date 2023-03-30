@extends("layouts.app")


@section('content')
<div class="text-center">
        <a href="{{route('doctors.create')}}" class="mt-4 btn btn-success">Create Doctor</a>
    </div>
    <div class="container mt-5 ">
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Avatar_image</th>
                    <th>National_ID</th>
                    <th>Email</th>
                    <th>Pharmacy_ID</th>
                    <th>is_baned</th>
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
            ajax: {
                url:"{{ route('doctors.index') }}",
            }
            columns: [
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                      {data: 'avatar_image', name: 'avatar_image'},
                      {data: 'national_id', name: 'national_id'},
                      {data: 'email', name: 'email'},
                      {data: 'pharmacy_id', name: 'pharmacy_id'},
                      {data: 'is_baned', name: 'is_baned'},
                      {data: 'action', name: 'action', orderable: true, searchable: true},
                  ]
        });
    } );
    
    
    
        </script>
@endsection