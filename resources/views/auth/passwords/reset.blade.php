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
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('img/pan-and-coffee-brand.png') }}">
    <title>Pan & Coffee</title>

    <!-- page css -->
    <link href="{{ asset('dist/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">


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
    <div class="login-register" style="background-image: url('{{ asset('img/pan-and-coffee-brand.png') }}');width: 68%;;">
        <img src="{{ asset('images/') }}" alt="">
    </div>
    <section id="wrapper" class="login-register login-sidebar">
        <div class="login-box card " style="width: 29%;">
            <div class="card-body d-flex flex-column justify-content-center">
                <form method="POST" class="form-horizontal form-material" id="loginform"
                    action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="d-flex justify-content-center" style="width: 100%; height: auto; padding: 5px 0px;">
                        <img src="{{ asset('images/nannylogo123.png') }}" alt="">
                        {{-- style="filter: invert(63%) sepia(99%) saturate(2181%) hue-rotate(166deg) brightness(99%) contrast(95%);padding: 20px 0px;width: 200px;"> --}}
                    </div>
                    <input type="hidden" name="token" value="{{ $token }}">
                    {{-- <h3 class="box-title m-b-20">Recover Password</h3> --}}
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" type="email" placeholder="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" style="color: #be1423;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" placeholder="New Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" style="color: #be1423;" role="alert">
                                    <strong>{!! $message !!}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">

                            <input id="password-confirm" placeholder="Confirm Password" type="password"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>
                    <div class="form-group text-center p-b-10">
                        <div class="col-xs-12">
                            {{-- <button class="btn btn-info btn-lg w-100 text-uppercase waves-effect waves-light text-white" type="submit">Reset Password</button> --}}
                            <button class="btn btn-lg btn-success btn-rounded text-white"
                                style="background-color: rgb(132 137 108)" type="submit">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ==============-->






    <script src="{{ asset('modules/js/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('modules/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
    </script>
</body>

</html>
