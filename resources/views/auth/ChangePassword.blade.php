@extends('layouts.master')
@section('contain')
 <!-- row page titles -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor font-bold">Change Password</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">
                        <a href="{{ Route('nannies.list') }}" class="text-cyan">Nannies</a>
                    </li> --}}
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End row page titles -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <div class="col-sm-6">
                    {{-- <h5 class="card-title">Basic Information</h5> --}}
                    <form method="POST" action="{{Route('update.Password')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="font-bold">Old Password</label>
                                {{-- <input  type="password" class="form-control  @error('old_password') is-invalid @enderror" name="old_password" > --}}
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @if($errors->all('old_password'))
                                <p class="text-danger">
                                {{ $errors->first('old_password') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="font-bold">New Password</label>
                                {{-- <input  type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="special"> --}}
                                <div class="input-group" id="show_hide_password2">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @if($errors->all('new_password'))
                                <p class="text-danger">
                                {!! $errors->first('new_password') !!}
                                </p>
                                @endif
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="password" class="font-bold">Confirm Password</label>
                                    {{-- <input id="special" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password_confirmation"> --}}
                                    <div class="input-group" id="show_hide_password3">
                                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">
                                        <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    @if($errors->all('new_password_confirmation'))
                                    <p class="text-danger">
                                    {{$errors->first('new_password_confirmation') }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        <div class="col-md-12" >
                        <button style="margin-top: 1%;" type="submit" class="btn btn-warning">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        // password input eye method
        $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
    $(document).ready(function() {
    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password2 input').attr("type") == "text"){
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass( "fa-eye-slash" );
            $('#show_hide_password2 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password2 input').attr("type") == "password"){
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password2 i').addClass( "fa-eye" );
        }
    });
});
    $(document).ready(function() {
    $("#show_hide_password3 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password3 input').attr("type") == "text"){
            $('#show_hide_password3 input').attr('type', 'password');
            $('#show_hide_password3 i').addClass( "fa-eye-slash" );
            $('#show_hide_password3 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password3 input').attr("type") == "password"){
            $('#show_hide_password3 input').attr('type', 'text');
            $('#show_hide_password3 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password3 i').addClass( "fa-eye" );
        }
    });
});
    // password input eye method end
</script>
@endsection
