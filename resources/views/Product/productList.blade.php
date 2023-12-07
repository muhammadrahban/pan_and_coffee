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
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="font-size: small;">
            <table id="myTable" class="table table-striped border dataTable no-footer">
                <thead>
                    <tr style="background-color: gray " class="text-white">
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $num = 1; @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $product->title?? '-' }}</td>
                        <td>{{ $product->description ?? '-' }}</td>
                        <td>{{ $product->image ?? '-' }}</td>
                        <td>{{ $product->size ?? '-' }}</td>
                        <td>{{ $product->price ?? '-' }}</td>
                        <td>
                            <a type="button" title="info" onclick="openSurveyModal({{ json_encode($product) }})">
                                <i class="fa fa-info-circle" style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                            </a>
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
            <div class="modal-header bg-primary text-white" style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
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
    $(document).ready(function (){
        $('#myTable').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": 6
                }]
            });
    });

</script>

@endsection
