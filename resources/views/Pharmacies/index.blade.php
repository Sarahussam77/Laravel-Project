@extends("layouts.app")


@section("content")

<div class="d-flex flex-row-reverse mb-3 text-center ">
        <a class="btn bg-gradient-danger m-3" href="/readsoftdelete"> Deleted Pharmacies</a>
        <a href="{{route('pharmacies.create')}}" class="btn bg-gradient-success m-3">Create Pharmaciest</a>
        
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
                    <th>Email</th>
                    <th>National_ID</th>
                    <th>Avatar_image</th>
                    <th>Area_ID</th>
                    <th>priority</th>
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
                url:"{{ route('pharmacies.index') }}",
            },
            columns: [
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                      {data: 'email', name: 'email'},
                      {data: 'national_id', name: 'national_id'},
                      {data: 'avatar_image', name: 'avatar_image'},
                      {data: 'area_id', name: 'area_id'},
                      {data: 'priority', name: 'priority'},
                      {data: 'action', name: 'action', orderable: true, searchable: true},
                      
                  ]
        });
    } );

        </script>

@endsection