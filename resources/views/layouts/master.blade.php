<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- toaster session message -->
    <title>Pan & Coffee</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="200x200" href="{{ asset('img/favicon.ico') }}">
    <title>Pan & Coffee</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->

    <link href="{{ asset('modules/js/morrisjs/morris.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('') }}" rel="stylesheet"> --}}
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('modules/js/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/ecommerce.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('dist/css/pages/dashboard1.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('modules/js/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('modules/js/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    {{-- start toastr libraries --}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/toaster.min.css') }}">
    <script src="{{ asset('dist/js/toaster.min.js') }}"></script>
    {{-- end toastr libraries --}}
    {{-- sweet alert --}}
    <script src="{{ asset('modules/js/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="skin-megna fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Pan & Coffee</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        @include('partials.header')
        @include('partials.sidebar')
        {{-- @include('partials.header') @include('partials.sidebar'); --}}
        <div class="page-wrapper">
            <div class="container-fluid">

                <!-- .right-sidebar -->
                @yield('contain')
                @include('partials.rightsidebar')
                <!-- .right-sidebar-end -->
            </div>
        </div>
        @include('partials.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('modules/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('modules/js/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('modules/js/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('modules/js/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{ asset('modules/js/toast-master/js/jquery.toast.js') }}"></script>
    <!-- jQuery peity -->
    <script src="{{ asset('modules/js/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('modules/js/tinymce/tinymce.min.js') }}"></script>
    {{-- <script src="{{ asset('modules/js/tinymce/tinymce.min.js') }}"></script> --}}

    <script src="{{ asset('modules/js/peity/jquery.peity.init.js') }}"></script>
    <script src="{{ asset('dist/js/dashboard1.js') }}"></script>
    <script src="{{ asset('modules/js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('modules/js/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/parsley.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script>
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 150,
                plugins: [
                    // "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    // "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    // "save table contextmenu directionality emoticons template paste textcolor"
                ],
                menubar: false
                // statusbar: false
                // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    </script>
    <script>
        // firebase script
        firebase.initializeApp({
            apiKey: "AIzaSyCVutmoLLLTkmzXRB_RKbOBrU1V9DVtiHc",
            authDomain: "villagenanny-1674137440956.firebaseapp.com",
            projectId: "villagenanny-1674137440956",
            storageBucket: "villagenanny-1674137440956.appspot.com",
            messagingSenderId: "275084376907",
            appId: "1:275084376907:web:076d8920b3e235fc4c46ce",
            measurementId: "G-ME801BXYZX"
        })

        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {

            messaging
                .requestPermission()
                .then(function() {
                    // messageElement.innerHTML = "Got notification permission";
                    console.log("Got notification permission");

                    messaging.getToken({
                        vapidKey: 'BBCZHPt1Xo_scXhYbZhtp8nLj96nI-_aoodPKoG0c7EgEi7hIeGBv9yxThQ1ufWCw5ihP66bYbqtU1eHpJfJzjs'
                    }).then((currentToken) => {
                        if (currentToken) {

                            console.log(currentToken);

                            $.ajax({
                                url: '{{ url('/setDeviceToken') }}',
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    udid: new Date().getTime(),
                                    device_token: currentToken,
                                    device_type: "web"
                                },
                                dataType: 'JSON',
                                success: function(response) {
                                    // console.log(data);
                                },

                                error: function(error) {
                                    // alert(error);
                                },
                            });

                            // Send the token to your server and update the UI if necessary
                            // ...
                        } else {
                            // Show permission request UI
                            console.log('No registration token available. Request permission to generate one.');
                            // ...
                        }
                    }).catch((err) => {
                        console.log('An error occurred while retrieving token. ', err);
                        // ...
                    });

                })
                .catch(function(err) {
                    // errorElement.innerHTML = "Error: " + err;
                    console.log("Didn't get notification permission", err);
                });
        }

        messaging.onMessage(function(payload) {

            console.log("Message received.", payload.data.custom);

            const data = JSON.parse(payload.data.custom);
            console.log(data.type)

            switch (data.type) {
                case "withdraw-amount-request":
                     Swal.fire({
                        title: data.body,
                        icon: "success"
                    });
                    break;
                case "account-review-request":
                    console.log("Inside cashout_request case");
                    Swal.fire({
                        title: data.body,
                        icon: "success"
                    });
                    break;
                default:
                    break;
            }
        });

        messaging.onTokenRefresh(function() {
            messaging.getToken()
                .then(function(refreshedToken) {
                    console.log('Token refreshed.');
                    // tokenElement.innerHTML = "Token is " + refreshedToken;
                }).catch(function(err) {
                    // errorElement.innerHTML = "Error: " + err;
                    console.log('Unable to retrieve refreshed token ', err);
                });
        });

        initFirebaseMessagingRegistration();
        // firebase script End

        // imask input mony method
        $(function() {
            $('.makemony').maskMoney();
        })

        //         var currencyMask = IMask(
        //   document.getElementById('makemony'),
        //   {
        //     mask: [
        //         { mask: '' },
        //         {
        //             mask: 'num $',
        //             lazy: false,
        //             blocks: {
        //                 num: {
        //                     mask: Number,
        //                     scale: 2,
        //                     thousandsSeparator: '.',
        //                     padFractionalZeros: true,
        //                     radix: ',',
        //                     mapToRadix: ['.'],
        //                 }
        //             }
        //         }
        //     ]
        //   });
        // imask input mony method end

        $(document).ready(function() {



            $('#vehicle_id').change(function() {
                var vehicle_id = $(this).val();
                var user_id = $(this).data('user-id');

                var url = "{{ route('update.nannyvehicle', 'vehicle_id') }}"
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    type: 'POST',
                    url: url,
                    data: {
                        vehicle_id,
                        user_id
                    },
                    success: function(response) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                        }
                        toastr.success(response);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    },
                    error: function() {
                        console.log('Error occured');
                    }
                });
            });
        });

        $(function() {
            $('#myTable').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": 6
                }]
            });
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
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
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
            }
            toastr.success("{{ session('message') }}");
        @elseif (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>
