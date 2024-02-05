@extends('layouts.master')

@section('contain')
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Product Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                </ol>
                <a href="{{ route('product.create') }}"><button type="button"
                        class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                        New</button></a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive" style="font-size: small;">
                <table id="myproTable" class="table table-striped border dataTable no-footer">
                    <thead>
                        <tr style="background-color: gray " class="text-white">
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $num = 1; @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $product->title ?? '-' }}</td>
                                <td>{{ $product->description ?? '-' }}</td>
                                <td>{{ $product->size ?? '-' }}</td>
                                <td>{{ $product->price ?? '-' }}</td>
                                <td>
                                    <a href="{{ URL::asset($product->image != null ? env('MEDIA_URL') . $product->image : 'images/placeholder_blue_user.png') }}"
                                        target="_blank">
                                        <img src="{{ $product->image != null ? env('MEDIA_URL') . $product->image : asset('images/placeholder_blue_user.png') }}"
                                            class="img-circle" width="50" style="height: 50px" />
                                    </a>
                                </td>
                                <td>
                                    {{-- <a type="button" title="edit" onclick="openSurveyModal({{ json_encode($product) }})">
                                        <i class="fa fa-pen" style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                    </a> --}}
                                    <a title="Edit" href="{{ route('product.edit', $product->id) }}"><i
                                            class="far fa-edit" style="font-size:20px"></i></a>

                                    <a title="Delete" type="button" onclick="swalll({{ $product->id }})"><i
                                            class="fa fa-trash " aria-hidden="true"></i></a>
                                    <form id="delete-form-{{ $product->id }}"
                                        action="{{ route('product.delete', $product->id) }}" method="POST" class="d-none">
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
    <div class="modal" id="surveyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="font-size: small; width: 80%; margin-left: 14%;">
                <div class="modal-header bg-primary text-white"
                    style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                    <h5 class="modal-title" id="surveyModalLabel">Survey Questions and Answers</h5>
                </div>
                <div class="modal-body">
                    <table class="table" id="surveyContent">
                        <!-- General Donation details will be populated here -->
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
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
        $(document).ready(function() {

            $('#myproTable').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": 6
                }]
            });
        });
    </script>
@endsection
