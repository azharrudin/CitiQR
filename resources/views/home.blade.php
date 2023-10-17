@extends('layouts.app')

@section('content')
<div class="main" id="main">
   <h5>Home > <b>Dashboard</b></h5>
    <div class="mt-3 card p-3 rounded" style="min-height: 60vh;background: white;">
        <table id="example" class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Attended</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<script>
    table = $('#example').DataTable({
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "{{ url('api/event/') }}",

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        },

        "columns": [{
                "data": "id",
                "name": "id"
            },
            {
                "data": "fullname",
                "name": "fullname"
            },
            {
                "data": "phone",
                "name": "phone"
            },

            {
                "data": "email",
                "name": "email"
            },
            {
                "data": "city",
                "name": "city"
            },
            {
                "data": "attended_status",
                "name": "attended_status",

            },
            {
                "data": "action",
                "name": "action",

            },

        ]
    });
    function update(id){
        $.ajax({
            url: "{{url('api/event/update')}}",
            method: "POST",
            data: {
                "id": id
            },
            success: function(){
                table.ajax.reload();
            }
        })
    }
</script>
@endsection