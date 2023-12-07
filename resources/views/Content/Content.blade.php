@extends('layouts.master')
@section('contain')
  <!-- row page titles -->
                <!-- ============================================================== -->
                <div class="row page-titles" style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
                        <div class="col-md-5 align-self-center">
                            <h3 class="text-themecolor">Content Management</h3>
                        </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                                {{-- <li class="breadcrumb-item active">Content</li> --}}
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
                <table id="myTablecontent" class="table table-striped border">
                    <thead>
                        <tr style="background-color: gray" class="text-white">
                            <th>S.No</th>
                            <th>Name</th>
                            {{-- <th>Slug</th> --}}
                            {{-- <th>Type</th>
                            <th>Media</th> --}}
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        <?php
                        $arrImgExtensions = ["jpg", "PNG","png", "jpeg"];
                        $arrVideoExtensions = ["mp4"];
                        ?>
                        @foreach ($contentData as $content)
                        <?php
                        $mediaFilePath = $content->media ? $content->media : "";
                        $arrMediaFilePath = explode(".", $mediaFilePath);
                        $extention = $arrMediaFilePath[count($arrMediaFilePath) -1];
                        // print_r( $arrMediaFilePath )
                        // echo $extention;
                        // dd($extention, $arrMediaFilePath);
                        ?>
                        <tr>
                        <td>{{ $num++}}</td>
                        <td>{{ $content->name??'' }}</td>
                        {{-- <td>{{ $content->slug??'' }}</td> --}}
                        {{-- <td>{{ $content->type??'' }}</td> --}}

                        {{-- <td> --}}
                           {{-- {{ dd(in_array($extention, $arrVideoExtensions))}} --}}
                        {{-- // check image file --}}
                        {{-- @if (in_array($extention, $arrImgExtensions)) --}}
                        {{--dd("image")--}}
                        {{-- <a href="{{ URL::asset($content->media != null ? env("MEDIA_URL").$content->media : null) }}" target="_blank">
                        <img src="{{ $content->media != null ? env("MEDIA_URL").$content->media : null }}" alt="Not Available" width="50px" class="img-circle">
                        </a> --}}
                        {{-- // check video file --}}
                        {{-- @elseif (in_array($extention, $arrVideoExtensions)) --}}
                        {{--dd("video")--}}

                        {{-- <a href="{{ URL::asset($content->media != null ? env("MEDIA_URL").$content->media : null) }}" target="_blank">
                        <video width="150" height="70" controls>
                        <source src="{{URL::asset($content->media != null ? env("MEDIA_URL").$content->media : null)}}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                        </a>
                        @else
                        {{'NA'}} --}}
                        {{--dd("unknown extenstion '" . $extention . "'")--}}

                        {{-- @endif --}}
                        {{-- </td> --}}

                        {{-- <td>{{ $content->media }}</td> --}}
                        <td>{!! $content->description !!}</td>
                        <td>
                        <a title="edit" href="{{Route('content.edit', $content->id)}}"><i class="far fa-edit" style="font-size:20px"></i>
                        </a>
                        {{-- <a href="{{Route('user.info', $content->id)}}"> <button class="btn bg-primary btn-small"><i class="fa-solid fa-info"></i></button></a> --}}
                        {{-- <a onclick="swalll({{ $content->id }})"><i class="fa fa-trash " aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $content->id }}" action="{{ route('category.delete', $content->id) }}" method="POST" class="d-none">
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
        function swalll(id) {
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


            // alert(id);
        }
        $(function() {
            $('#myTablecontent').DataTable({
                columnDefs:[
                    {
                        orderable: false,
                        "targets": 6
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
