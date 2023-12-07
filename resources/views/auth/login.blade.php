<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.ico') }}">
    <title>Pan & Coffee</title>

    <!-- page css -->
    <!-- Custom CSS -->
    {{-- <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('dist/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mdb.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="{{ asset('dist/css/mdb1.min.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
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
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar">
        <div class="login-register" style="background-color: #68bbbe;">
            <div class="col-md-9">
                <div class="d-flex flex-column justify-content-end"
                    style="background-image: url('{{ asset('img/pan-and-coffee-header.jpg') }}'); background-position: center; background-repeat: no-repeat; height: 100vh; background-size: cover; filter: grayscale(57%);">
                    <!-- Your content goes here -->


                    {{-- <img src="{{ asset('images/freedigiBackground.png') }}" alt="" --}}>
                    {{-- <img src="{{asset('images/logo Text.svg')}}" alt="" style="width: 33%;
                height: 20vh;
                margin-left: 30%;"> --}}
                </div>
            </div>
            <img src="{{ asset('images/') }}" alt="">
        </div>
        <section id="wrapper" class="login-register login-sidebar">
            <div class="login-box card" style="width: 29%">
                <div class="card-body d-flex flex-column justify-content-center">
                    <form method="POST" class="form-horizontal form-material" id="loginform"
                        action="{{ route('login') }}">
                        @csrf
                        <div class="d-flex justify-content-center"
                            style="width: 100%; height: auto; padding: 5px 0px; margin-bottom: 31%;">
                            <img src="{{ asset('img/pan-and-coffee-brand.png') }}" alt="" style="height: 30vh;">
                        </div>

                        <div class="form-outline" style="margin-top: 8%;">
                            <input placeholder="Email" id="email" type="text" value="{{ old('email') }}"
                                class="form-control form-icon-trailing @error('email') is-invalid @enderror"
                                name="email" style="filter: grayscale(100%);">
                            @error('email')
                                <span class="invalid-feedback" style="color: #cb3546; right: 5px; top: 48px;"
                                    role="alert">
                                    <div>{{ $message }}</div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline" style="margin-top: 5%;">
                            <input placeholder="Password" id="myInput" type="password"
                                value="{{ old('password') ?? '' }}"
                                class="form-control form-icon-trailing @error('password') is-invalid @enderror"
                                name="password" style="filter: grayscale(100%);">
                            @error('password')
                                <span class="invalid-feedback" style="color: #cb3546; right: 5px; top: 48px;"
                                    role="alert">
                                    <div>{{ $message }}</div>
                                </span>
                            @enderror
                        </div>
                        <input type="checkbox" onclick="myFunction()" style="filter: grayscale(100%);"> Show Password
                        <div class="form-group row" style="margin-top: 2%;"></div>
                        <div class="form-group text-center d-flex justify-content-center" style="margin-top: 2%;">
                            <button class="btn btn-lg btn-rounded text-white"
                                style="background-color: rgb(67 62 43); width: 35%; margin-top: 7%; filter: grayscale(35%);"
                                type="submit">Log In</button>
                        </div>
                        <div class="form-group text-center" style="margin-top: 3%;">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}"
                                    style="filter: grayscale(100%);">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>

    <script src="{{ asset('modules/js/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('modules/js/bootstrap.bundle.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        // show password method
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        // show password method end
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

    <script>
        function swall() {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary field !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        }
    </script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-left"
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
