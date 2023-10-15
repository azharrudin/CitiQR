@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <table id="example" class="display compact table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
</div>
<script>
      var table = $('#example').DataTable({
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

                ]
            });

    </script>
@endsection