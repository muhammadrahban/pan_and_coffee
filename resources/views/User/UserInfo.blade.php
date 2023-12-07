@extends('layouts.master')
@section('title')
    {{ 'Page Title Goes Here' }}
@endsection
@section('contain')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                @foreach ($userData as $user)
                    <div class="card-body">
                        {{-- <div class=" col-lg-12 col-md-5" style="margin-left: 17%;">
                            @php $rating = $user->rating; @endphp
                            @foreach (range(1, 5) as $i)
                                <span class="fa-stack" style="width:1em color: rgb(38, 105, 25)">
                                    <i class="far fa-star fa-stack-1x "></i>

                                    @if ($rating > 0)
                                        @if ($rating > 0.5)
                                            <i class="fas fa-star fa-stack-1x" style="color: rgb(38, 105, 25)"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-1x" style="color: rgb(38, 105, 25)"></i>
                                        @endif
                                    @endif
                                    @php $rating--; @endphp
                                </span>
                            @endforeach
                            <div class="text-success" style="margin-left: 29%;">{{ round($user->rating, 1) }}</div>
                        </div> --}}
                        <center class="m-t-30">
                            <a href="{{ URL::asset($user->profile_image != null ? env('MEDIA_URL') . $user->profile_image : 'images/placeholder_blue_user.png') }}"
                                target="_blank">
                                <img src="{{ $user->profile_image != null ? env('MEDIA_URL') . $user->profile_image : asset('images/placeholder_blue_user.png') }}"
                                    class="img-circle" width="150" />
                            </a>
                            <h4 class="waves-dark active m-t-10">
                                {{ $user->full_name ?? '-' }}</h4>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{ $user->address }}</h6>
                        <div id="map" style=" height: 150px;"></div>
                        {{-- <div  class="map-box"> --}}
                        {{-- <iframe

                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                            width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        {{-- </div> --}}
                        {{-- <small class="text-muted p-t-30 db">Social Profile</small>
                        <br />
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> --}}
                    </div>

            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                            role="tab">Timeline</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#orders" role="tab">Orders</a>
                    </li>
                    {{-- <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#wallet" role="tab">Wallet</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#withdraw_log"
                            role="tab">Withdraw Log</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#media" role="tab">Media</a>
                    </li> --}}
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body" style="height: 75.5vh;">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->full_name ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->email }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Phone</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->phone }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Address</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->address }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="selfie" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="p-3">
                                                <span style="float:right;">
                                                    <form class="form-horizontal form-material"
                                                        action="https://test-cmolds.com/zauj_admin/public/users/391/update"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv">
                                                        <p class="text-center mt-4">Status not available</p>
                                                    </form>
                                                </span>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">

                                                    <p class="text-center mt-4">Not Uploaded</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="picture" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="row">
                                                <div class="col-sm-4">

                                                    <p class="text-center mt-4">


                                                        <a href="https://test-cmolds.com/zauj-uploads/users/PYz8K/pictures/geSGyjpg"
                                                            target="blank"> Click to view </a>
                                                        <span class="badge badge-info">pending</span>

                                                        <span style="float:right;" class="p-1">
                                                            <a href="https://test-cmolds.com/zauj_admin/public/picture/841/approved"
                                                                data-toggle="tooltip" data-original-title="Approved"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="icon-check" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="https://test-cmolds.com/zauj_admin/public/picture/841/rejected"
                                                                data-toggle="tooltip" data-original-title="Disapproved"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="icon-close" aria-hidden="true"></i>
                                                            </a>
                                                        </span>
                                                        <img src="https://test-cmolds.com/zauj-uploads/users/PYz8K/pictures/geSGyjpg"
                                                            alt="" class="h-50 w-100">

                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="identity" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="p-3">
                                                <span style="float:right;">

                                                    <form class="form-horizontal form-material"
                                                        action="https://test-cmolds.com/zauj_admin/public/users/391/identity"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv">
                                                        <p class="text-center mt-4">Status not available</p>

                                                    </form>
                                                </span>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <p class="text-center mt-4">Not Uploaded</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="setting" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material"
                                            action="https://test-cmolds.com/zauj_admin/public/users/391" method="POST">
                                            <input type="hidden" name="_token"
                                                value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv"> <input type="hidden"
                                                name="_method" value="PATCH">
                                            <div class="form-group">
                                                <label class="col-sm-12">Status</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="status">
                                                        <option value="0" selected>Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Rejected</option>
                                                        <option value="3">InActive</option>
                                                        <option value="4">Blocked</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane" id="wallet" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Currency</strong>
                                    <br>
                                    <p class="text-muted">USD</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>FDP</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->wallet->fdp ?? '' }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Amount</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->wallet->total_amount ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-xs-6 b-r text-subtitle">
                            <h4 class="text-success">Transactions History</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable2" class="table table-striped border">
                                <thead>
                                    <tr class="text-white" style="background-color: gray;">
                                        <th>S.No</th>
                                        <th>Transaction Type</th>
                                        <th>FDP</th>
                                        <th>Amount Type</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @if ($user->wallet)
                                        @foreach ($user->wallet->transactions as $transaction)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $transaction->type ?? '-' }}</td>
                                                <td>{{ $transaction->fdp ?? '-' }}</td>
                                                <td>{{ $transaction->amount_type ?? '-' }}</td>
                                                <td>{{ $transaction->created_at->format('d/m/Y') ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <div class="tab-pane" id="orders" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive  m-t-40">
                                <table id="myTableorder" class="table table-striped border" style="    font-size: small">
                                    <thead>
                                        <tr style="background-color: gray " class="text-white">
                                            <th>S.No</th>
                                            <th>User Name</th>
                                            <th>Track Number</th>
                                            <th>Address</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $num = 1; @endphp
                                        @foreach ($user->orders as $order)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $order->user->full_name ?? '-' }}</td>
                                                <td>{{ $order->track_number ?? '-' }}</td>
                                                <td>{{ $order->address ?? '-' }}</td>
                                                <td>{{ $order->quantity ?? '-' }}</td>
                                                <td>{{ $order->status ?? '-' }}</td>
                                                <td>{{ $order->payment_status ?? '-' }}</td>
                                                <td>{{ $order->total_amount ?? '-' }}</td>
                                                <td>
                                                    <a type="button" title="info"
                                                        onclick="openSurveyModal({{ json_encode($order) }})">
                                                        <i class="fa fa-eye"
                                                            style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                                    </a>
                                                    <a type="button" title="status update"
                                                        onclick="updateModal({{ json_encode($order) }})">
                                                        <i class="fa fa-pen"
                                                            style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="media" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable11" class="table table-striped border">
                                    <thead>
                                        <tr class="card-success text-white">
                                            <th>Media Type</th>
                                            <th>Media Title</th>
                                            <th>Media Images</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($user->userMedia as $media)
                                            <tr>
                                                <td>{{ ucwords(str_replace('_', ' ', $media->media_type)) }}</td>
                                                <td>{{ ucwords(str_replace('_', ' ', $media->media_title)) }}</td>
                                                <td>
                                                    <a href="{{ URL::asset($media->media_url != null ? env('MEDIA_URL') . $media->media_url : 'images/user') }}"
                                                        target="_blank">
                                                        <img src="{{ $media->media_url != null ? env('MEDIA_URL') . $media->media_url : asset('images/user') }}"
                                                            alt="Not Available" width="50px" class="img-circle">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="withdraw_log" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTableLogs" class="table table-striped border">
                                    <thead>
                                        <tr style="font-size: smaller;" class="card-info text-white">
                                            <th>S.No</th>
                                            <th>Payout Batch Id</th>
                                            <th>Sender Batch Id</th>
                                            <th>Amount</th>
                                            <th>Receiver Email</th>
                                            <th>Batch Status</th>
                                            <th>Date</th>
                                            {{-- <th>Date</th> --}}

                                        </tr>
                                    </thead>
                                    @php
                                        $num = 1;
                                    @endphp
                                    <tbody>
                                        {{-- @foreach ($user->withdrawlog as $logs)
                                            <tr style="font-size: smaller;">
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $logs->payout_batch_id ?? '-' }}</td>
                                                <td>{{ $logs->sender_batch_id ?? '-' }}</td>
                                                <td>${{ $logs->amount ?? '0' }}</td>
                                                <td>${{ $logs->receiver_email ?? ' ' }}</td>
                                                <td>{{ $logs->batch_status ?? '-' }}</td>
                                                <td>{{ $logs->created_at->format('d/m/Y') ?? '-' }}</td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Column -->
    </div>
    @endforeach
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <div class="modal" id="surveyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="font-size: small; width: 80%; margin-left: 14%;">
                <div class="modal-header bg-primary text-white"
                    style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                    <h5 class="modal-title" id="surveyModalLabel">Order Detail</h5>
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
    <div class="modal" id="Updte_Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="font-size: small; width: 80%; margin-left: 14%;">
                <div class="modal-header bg-primary text-white"
                    style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                    <h5 class="modal-title" id="surveyModalLabel">Order Detail</h5>
                </div>
                <div class="modal-body">
                    <form id="statusForm" class="align-items-center">
                        <div class="form-group">
                            <label for="status">Select Status:</label>
                            <select class="form-control" name="status">
                                <option value="pending">Pending</option>
                                <option value="complete">Complete</option>
                                <option value="cancel">Cancel</option>
                                <option value="hold">Hold</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="submitStatusForm()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": 6
                }]
            });
        });

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function openSurveyModal(order) {

            const modal = $('#surveyModal');
            modal.find('.modal-body').empty();

            const orderDetailsTable = $('<table class="table"></table>');

            // Add table headers
            const headerRow = $('<tr style="background-color: gray; color: white; font-weight: bold;"></tr>');
            headerRow.append('<th>S.No</th>'); // Added S.No header
            const productDetailsHeaders = ['title', 'description', 'image', 'size', 'price',
                'quantity'
            ]; // Moved 'quantity' to the end

            productDetailsHeaders.forEach((header) => {
                headerRow.append('<th>' + header.charAt(0).toUpperCase() + header.slice(1) + '</th>');
            });

            orderDetailsTable.append(headerRow);
            // Iterate over order details
            order.order_detail.forEach((detail, index) => {
                const detailRow = $('<tr></tr>');

                // Display S.No
                const snCell = $('<td>' + (index + 1) + '</td>');
                detailRow.append(snCell);

                // Display product information
                const product = detail.product;
                const productDetails = ['title', 'description', 'image', 'size', 'price'];

                productDetails.forEach((productDetail) => {
                    const value = product[productDetail];
                    const cell = $('<td>' + (value !== undefined ? value : '-') + '</td>');
                    detailRow.append(cell);
                });

                // Display quantity (from order detail)
                const quantityCell = $('<td>' + (detail.quantity !== undefined ? detail.quantity : '-') + '</td>');
                detailRow.append(quantityCell);

                orderDetailsTable.append(detailRow);
            });

            modal.find('.modal-body').append(orderDetailsTable);
            modal.modal('show');
        }

        function updateModal(order) {
            const modal = $('#Updte_Modal');
            modal.data('orderId', order.id); // Set order ID as data attribute

            modal.find('select[name="status"]').val(order.status);
            modal.modal('show');
        }

        function submitStatusForm() {
            const status = $('#Updte_Modal select[name="status"]').val();
            const orderId = $('#Updte_Modal').data('orderId');

            // You can use AJAX to submit the form data to the server
            // Replace the AJAX request with your actual update logic
            $.ajax({
                type: 'POST',
                url: `/order/update-status/${orderId}`, // Replace with your actual update status endpoint
                data: {
                    status: status
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                    };
                    toastr.success('Status updated successfully');

                    // Reload the page after 4 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                    $('#Updte_Modal').modal('hide');
                },
                error: function(error) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                    };
                    toastr.error('Status not updated');
                    console.error('Error updating status:', error);
                }
            });

        }
    </script>
@endsection
