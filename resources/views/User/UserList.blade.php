@extends('layouts.master')
@section('contain')
    <div class="row page-titles" style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Users Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li ><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">User Table</li> --}}
                </ol>
                {{-- <a href="{{ Route('address.swform') }}"><button type="button"
                    class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                    New</button></a> --}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h6 class="card-subtitle">Data table example</h6> --}}
            <div class="table-responsive">
                <table id="myTableuser" class="table table-striped border dataTable no-footer">
                    <thead>
                            <tr style="background-color: gray " class="text-white">
                                <th>S.No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th >Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($userData as $Ndata)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $Ndata->full_name }}</td>
                                <td>{{ $Ndata->email }}</td>
                                <td class="text-canter">
                                        @if ($Ndata->user_type != "admin")
                                        {{-- <a href="{{ Route('nannies.edit', $Ndata->id) }}"><i title="Edit" class="far fa-edit" style="font-size:20px"></i></a> --}}
                                            <a href="{{ Route('user.info', $Ndata->id) }}"> <i title="User Info" class="far fa-eye" style="font-size:20px"></i></a>
                                            @else
                                                    <i style="text-decoration: underline;">Not Modify</i>
                                            @endif
                                            {{-- <a title="delete" class="btn" onclick="swalll({{ $Ndata->id }})"><i class="fa fa-trash" style="font-size:20px"></i></a>
                                            <form id="delete-form-{{ $Ndata->id }}"
                                                action="{{ route('nannies.delete', $Ndata->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function swalll(id)
        {
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary field !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var formId = "delete-form-" + id;
                            document.getElementById(formId).submit();
                            // swal("Poof! Your imaginary file has been deleted!", {
                            //     icon: "success",
                            // });
                        } else {
                            // swal("Your imaginary file is safe!");
                        }
                    });
        }
        $(function() {
            $('#myTableuser').DataTable({
                columnDefs:[
                    {
                        orderable: false,
                        "targets":[3]
                    }
                ]
            });
            var table = $('#example').DataTable({
                "columnDefs": [
                    {
                        "visible": false,
                        "targets": 2
                    }
                ],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                'btn btn-primary me-1');
        });
    </script>
@endsection
