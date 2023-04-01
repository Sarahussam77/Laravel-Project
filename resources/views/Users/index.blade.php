@extends("layouts.app")


@section('content')

    <div class="container mt-5 ">
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Avatar_image</th>
                    <th>National_ID</th>
                    <th>Email</th>
                    <!-- <th>Date Of Birth</th> -->
                    <th>Gender</th>
                    <th>Phone</th>
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
                url:"{{ route('users.index') }}",
            },
            columns: [
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                      {data: 'avatar_image', name: 'avatar_image'},
                      {data: 'national_id', name: 'national_id'},
                      {data: 'email', name: 'email'},
                    //   {data: 'date_fo_birth', name: 'date_fo_birth'},
                      {data: 'gender', name: 'gender'},
                      {data: 'phone', name: 'phone'},
                      {data: 'action', name: 'action', orderable: true, searchable: true},
                  ]
        });
    } );
    
    
    
        </script>
@endsection