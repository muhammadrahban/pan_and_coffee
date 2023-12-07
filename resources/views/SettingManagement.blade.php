@extends('layouts.master')
@section('contain')

<!-- Page titles -->
<div class="row page-titles">
    <!-- Title based on whether you're updating or adding a setting -->
    <div class="col-md-5 align-self-center">
        @if (isset($setting))
            <h4 class="card-title">Update Setting</h4>
        @else
            <h4 class="card-title">Add Offer</h4>
        @endif
    </div>
    <div class="col-md-7 align-self-center text-end">
        <!-- Breadcrumbs -->
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a class="text-cyan" href="{{Route('setting.list')}}">offers</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page titles -->

<!-- setting Form -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
        @if (isset($setting))
            <!-- Form for updating an existing setting -->
            <form method="POST" action={{ Route('setting.update',$setting->id) }} enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('PUT')
        @else
            <!-- Form for adding a new setting -->
            <form action="{{ Route('setting.add')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @csrf
        @endif
                <!-- Form fields -->
                <div class="form-row col-md-6">

                    <div class="col-md-12 mb-3">
                        <label class="font-bold">Platform Fdp</label>
                        <!-- Input for the platform_fdp (read-only) -->
                        <input required data-parsley-required-message="platform_fdp field is required"
                               type="number"
                               name="platform_fdp"
                               min="5"
                               oninput="this.value = this.value.replace(/\D/g, '')"
                               value="{{ $setting->platform_fdp ?? old('platform_fdp') }}"
                               class="form-control @error('platform_fdp') is-invalid @enderror"
                               autocomplete="off"
                               placeholder="Enter fdp value">
                        @error('platform_fdp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="font-bold">Model Fdp = $1</label>
                        <!-- Input for the model_fdp (read-only) -->
                        <input required data-parsley-required-message="model_fdp field is required"
                               type="number"
                               name="model_fdp"
                               min="5"
                               oninput="this.value = this.value.replace(/\D/g, '')"
                               value="{{ $setting->model_fdp ?? old('model_fdp') }}"
                               class="form-control @error('model_fdp') is-invalid @enderror"
                               autocomplete="off"
                               placeholder="Enter fdp value">
                        @error('model_fdp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Submit button -->
                <div class="col-md-12">
                    @if (isset($setting))
                        <button type="submit" class="btn btn-warning me-2 text-white">Update</button>
                    @else
                        <button type="submit" class="btn btn-success me-2 text-white">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var exampleUrl = "http://example.com";
        var errorMessage = "this field is required and  enter a valid HTTP URL. Example: " + exampleUrl;
        $('#exampleInputEmail111').parsley().on('field:error', function() {
            var errorElement = $(this.$element).closest('.form-group').find(
                '.parsley-errors-list.filled');
            errorElement.html(errorMessage);
        });
    });
</script>
    <script>
        var numberMask = IMask(
  document.getElementById('number-mask'),
  {
    mask: Number,
    min: -10000,
    max: 10000,
    thousandsSeparator: ' '
  });
        function swalll(id) {
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary field !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var formId = "delete-form-" + id;
                        document.getElementById(formId).submit();
                        // swal("Poof! Your imaginary file has been deleted!", {
                        //     icon: "success",
                        // });
                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });


            // alert(id);
        }

    </script>
@endsection
