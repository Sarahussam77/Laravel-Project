@extends("layouts.app")


@section("content")

addresses
<div class="container mt-5 ">
    <table id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>street_name</th>
                <th	>building_number</th>
                <th>floor_number</th>
                <th>flat_number</th>
                <th>is_main</th>
                <th>area_id</th>
                <th>user_id</th>
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
            url:"{{ route('useraddresses.index') }}",
        },
        columns: [
                  {data: 'id', name: 'id'},
                  {data: 'street_name', name: 'street_name'},
                  {data: 'building_number', name: 'building_number'},
                  {data: 'floor_number', name: 'floor_number'},
                  {data: 'flat_number', name: 'flat_number'},
                  {data: 'is_main', name: 'is_main'},
                  {data: 'area_id', name: 'area_id'},
                  {data: 'user_id', name: 'user_id'},
                  {data: 'action', name: 'action', orderable: true, searchable: true},
              ]
    });
} );



    </script>
@endsection
