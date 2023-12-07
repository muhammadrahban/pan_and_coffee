<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.ico') }}">
    <title>Pan & Coffee</title>

    <!-- page css -->
    <link href="{{ asset('dist/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    {{-- <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('dist/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mdb.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    {{-- <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet"> --}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <div class="login-register d-flex flex-column justify-content-end"
        style="background-image: url('{{ asset('home/pan-and-coffee-gourmet-bakery-and-coffee-shop-2.jpg') }}');background-size: cover;
    width: 71%;
    height: 102%">

    </div>
    <section id="wrapper" class="login-register login-sidebar">
        <div class="login-box card " style="width: 29%;">
            <div class="d-flex justify-content-center" style=" padding: 5px 0px;font-size: 100%; ">
                <a type="button" href="{{ Route('login.form') }}" class="btn btn-success"
                    style="background-color: rgb(132 137 108);margin-right: 76%; font-size: 100%;">&#8678;</a>

            </div>
            <div class="card-body d-flex flex-column justify-content-center">
                {{-- <div class="card-body d-flex flex-column justify-content-center"> --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal form-material" id="loginform" method="POST"
                    action="{{ route('password.email') }}">
                    @csrf
                    <div class="d-flex justify-content-center" style="width: 100%; height: auto; padding: 5px 0px;">
                        <img src="{{ asset('images/nannylogo123.png') }}" alt="" style="margin-bottom: 10%">

                    </div>
                    <div class="form-outline " style="    margin-top: 2%;">
                        {{-- <div class="col-xs-12"> --}}
                        <input id="email" type="email"
                            class="form-control form-icon-trailing @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus style="padding: 2%;">
                        <label class="form-label" for="email">Email</label>

                        @error('email')
                            <span class="invalid-feedback" style="color: #0f0b0b;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- </div> --}}
                    </div>
                    <div class="form-group text-center p-b-10" style="margin-top: 6%;">
                        <div class="col-xs-12">
                            <button class="btn btn-lg btn-success btn-rounded text-white"
                                style="background-color: rgb(132 137 108); width: 76%; "
                                type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
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
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
    </script>

    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").hide();
            }, 3000); // 5 secs

        });
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
