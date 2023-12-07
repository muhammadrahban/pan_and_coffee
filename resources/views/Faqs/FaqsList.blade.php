@extends('layouts.master')
@section('contain')
    <div class="row page-titles" style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Faqs Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li ><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">User Table</li> --}}
                </ol>
                <a href="{{route('faq.form')}}"><button type="button"
                    class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                    New</button></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h6 class="card-subtitle">Data table example</h6> --}}
            <div class="table-responsive">
                <table id="myTablenanny" class="table table-striped border dataTable no-footer">
                    <thead>
                            <tr style="background-color: gray " class="text-white">
                                <th>S.No</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th >Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td class="text-canter">
                                    <a title="Edit" href="{{ route('faq.edit', $faq->id) }}"><i
                                            class="far fa-edit" style="font-size:20px"></i></a>

                                    <a title="Delete" type="button" onclick="swalll({{ $faq->id }})"><i class="fa fa-trash "
                                            aria-hidden="true"></i></a>
                                    <form id="delete-form-{{ $faq->id }}"
                                        action="{{ route('faq.delete', $faq->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
         function swalll(id) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary field!",
        icon: "warning",
        showCancelButton: true, // This displays the cancel button
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel" // Provide the text for the cancel button
    }).then((result) => {
        if (result.isConfirmed) {
            var formId = "delete-form-" + id;
            document.getElementById(formId).submit();
        }
    });
}
        $(function() {
            $('#myTablenanny').DataTable({
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
