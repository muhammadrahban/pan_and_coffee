@extends('layouts.master')
@section('contain')
    <!-- row page titles -->
    <!-- ============================================================== -->
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Activities</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active"></li> --}}
                </ol>
                {{-- <a href="{{Route('category.sform')}}"><button type="button"  class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                class="fa fa-plus-circle"></i> Create New</button></a> --}}
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End row page titles -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive m-t-40">
                <table id="myTableact" class="table table-striped border dataTable no-footer">
                    <thead>
                        <tr style="background-color: rgb(107, 122, 141);" class="text-white">
                            <th>S.No</th>
                            <th>Activity</th>
                            <th>Acivity Description</th>
                            {{-- <th>Body</th> --}}
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($activity as $Cdata)
                        @if ($Cdata->is_viewed == 0)
                            <tr title="{{ $Cdata->user->full_name ?? '-' }} info" id="row-{{ $Cdata->id }}" style="background-color: rgb(211, 168, 168); cursor: pointer;" onclick="window.location='{{Route('nannies.info', ['nanny' =>$Cdata->user->id , 'isView' => 1 , 'type' =>$Cdata->type ]) }}'">
                                 <td>{{ $num++ }}</td>
                                <td>{{ $Cdata->user->full_name ?? '-' }}</td>
                                <td>{{ $Cdata->title ?? '-' }}</td>
                                {{-- <td>{{ $Cdata->body ?? '-' }}</td> --}}
                                <td>{{ $Cdata->created_at->format('d-m-Y') ?? '-' }}</td>
                            </tr>
                        @else
                            <tr>
                                 <td>{{ $num++ }}</td>
                                <td>{{ $Cdata->user->full_name ?? '-' }} </td>
                                <td>{{ $Cdata->title ?? '-' }}</td>
                                {{-- <td>{{ $Cdata->body ?? '-' }}</td> --}}
                                <td>{{ $Cdata->created_at->format('d-m-Y') ?? '-' }}</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function swalll(id) {
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
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


            // alert(id);
        }
        $(function() {
            $('#myTableact').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": 2
                }]
            });
        });
    </script>
@endsection
