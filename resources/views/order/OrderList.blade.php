@extends('layouts.master')

@section('contain')
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Order Management</h3>
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
                        @foreach ($orders as $order)
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
                                    <a type="button" title="info" onclick="openSurveyModal({{ json_encode($order) }})">
                                        <i class="fa fa-eye" style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                    </a>
                                    <a type="button" title="status update"
                                        onclick="updateModal({{ json_encode($order) }})">
                                        <i class="fa fa-pen" style="font-size: 20px; color: rgb(71, 181, 196)"></i>
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
