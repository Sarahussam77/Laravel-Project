@extends("layouts.app")


@section("content")
@role('admin')
<div class="text-center">
        {{-- style="background-color:#6D9886 ; color:white" --}}
        <a   href="{{route('useraddresses.create')}}" class="mt-4 btn btn-success">Create Address</a>
    </div>
@endrole

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
                <th>area</th>
                <th>user</th>
                @role('admin')
                <th>action</th>
                @endrole
            </tr>
        </thead>
            <tbody>
            
            </tbody>
        
    </table>
    </div>
    
    <script>
          var user = {{ Js::from($user) }};
          if(user!="app\\Models\\Doctor"|user!="app\\Models\\Pharmacy"){
    
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
                  {data: 'ismain', name: '"Is Main"'},
                  {data: 'area', name: 'area'},
                  {data: 'user', name: 'user'},
                 
                
                 
              ]
    });
} );

          }
          else{
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
                  {data: 'ismain', name: '"Is Main"'},
                  {data: 'area', name: 'area'},
                  {data: 'user', name: 'user'},
                  {data: 'action', name: 'action', orderable: true, searchable: true},
                
                 
              ]
    });
} );
          }

    </script>
@endsection
