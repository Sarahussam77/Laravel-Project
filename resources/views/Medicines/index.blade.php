@extends("layouts.app")


@section("content")

Medicines Datatables 
<div class="container mt-5 ">
    <table id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>quantity</th>
                <th>type</th>
                <th>price</th>
                <th>pharmacy_id</th>
                <th>doctor_id</th>
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
                  {data: 'quantity', name: 'quantity'},
                  {data: 'type', name: 'type'},
                  {data: 'price', name: 'price'},
                  {data: 'pharmacy_id', name: 'pharmacy_id'},
                  {data: 'doctor_id', name: 'doctor_id'},
                  {data: 'action', name: 'action', orderable: true, searchable: true},
              ]
    });
} );



    </script>
@endsection