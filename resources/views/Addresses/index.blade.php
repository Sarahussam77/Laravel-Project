@extends("layouts.app")


@section("content")

<div class="text-center">
        {{-- style="background-color:#6D9886 ; color:white" --}}
        <a   href="{{route('useraddresses.create')}}" class="mt-4 btn btn-success">Create Order</a>
    </div>

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
                <th>area</th>
                <th>user</th>
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



    </script>
@endsection
