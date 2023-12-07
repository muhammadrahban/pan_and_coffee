@extends('layouts.master')
@section('contain')
    <!-- row page titles -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-bold">Update Caregiver</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ Route('user.list') }}" class="text-cyan">Caregivers</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End row page titles -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body" style="font-size: small;">
                    {{-- <h5 class="card-title">Basic Information</h5> --}}
                    <form method="POST" action="{{ Route('nannies.update', $nannies->id) }}" data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="">
                                <label class="font-bold" for="example-text">Full Name*</span>
                                </label>
                                <input required data-parsley-required-message="Full name field is required"type="text"
                                    value="{{ $nannies->full_name }}" id="example-text" name="full_name"
                                    class="form-control @error('full_name') is-invalid @enderror">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label class="font-bold" for="bdate">Email*</span>
                                </label>
                                <input required data-parsley-required-message="Email field is required" type="email"
                                    value="{{ $nannies->email }}" id="bdate" name="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="font-bold" for="phone">Phone*</label>
                                <input required data-parsley-required-message="Phone field is required" type="text"
                                    value="{{ $nannies->phone && $nannies->phone[0] !== '+' ? '+' . ltrim($nannies->phone, '+') : $nannies->phone }}"
                                    id="bdate" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    pattern="^\+?\d+$">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        {{-- <div class="form-group">
                            <div class="">
                                <label for="special" class="font-bold">DOB</span>
                                </label>
                                <input type="date" value="{{ $nannies->dob }}" name="dob" id="special"name="dob" class="form-control @error('dob') is-invalid @enderror">
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="">
                                <label class="font-bold">Gender*</label>
                                <select name="usertype" class="form-select" id="special">
                                    <option value="Male">Male</option>
                                    <option value="male">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="font-bold">Change Password ?</label>
                                <div class="input-group" id="password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="special">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! $errors->first('password') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="password" class="font-bold">Confirm Password</label>
                                <div class="input-group" id="password">
                                    <input id="special" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password_confirmation">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('password_confirmation') }}</li>
                                    </ul>
                                </div>
                            @endif
                            </div>
                        </div>
                        {{-- <div class="form-group" > --}}
                        <button style="margin-left: 31%; margin-top: 1%; width: 38%;" type="submit"
                            class="btn btn-warning">update</button>
                        {{-- </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#password a").on('click', function(event) {
                event.preventDefault();
                if ($('#password input').attr("type") == "text") {
                    $('#password input').attr('type', 'password');
                    $('#password i').addClass("fa-eye-slash");
                    $('#password i').removeClass("fa-eye");
                } else if ($('#password input').attr("type") == "password") {
                    $('#password input').attr('type', 'text');
                    $('#password i').removeClass("fa-eye-slash");
                    $('#password i').addClass("fa-eye");
                }
            });
        });
    </script>
@endsection
