@extends('layouts.master')
@section('contain')

<!-- Page titles -->
<div class="row page-titles">
    <!-- Title based on whether you're updating or adding a faq -->
    <div class="col-md-5 align-self-center">
        @if (isset($faqs))
            <h4 class="card-title">Update Faqs</h4>
        @else
            <h4 class="card-title">Add Faqs</h4>
        @endif
    </div>
    <div class="col-md-7 align-self-center text-end">
        <!-- Breadcrumbs -->
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a class="text-cyan" href="{{Route('faqs.list')}}">offers</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page titles -->

<!-- faq Form -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
        @if (isset($faqs))
            <!-- Form for updating an existing faq -->
            <form method="POST" action={{ Route('faq.update',$faqs->id) }} enctype="multipart/form-data" data-parsley-validate>
                @csrf
                @method('PUT')
        @else
            <!-- Form for adding a new faq -->
            <form action="{{ Route('faqs.add')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @csrf
        @endif
                <!-- Form fields -->
                <div class="form-row col-md-9">
                    <!-- Title field -->
                    <div class="col-md-12  mb-3">
                        <label class="font-bold">Question*</label>
                        <!-- Input for the title -->
                        <input required data-parsley-required-message="question field is required" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $faqs->question ?? old('question') }}" autocomplete="off" placeholder="Enter question">
                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <!-- subtitle field -->
                    <div class="col-md-12  mb-3">
                        <label class="font-bold">Answer*</label>
                        <!-- Input for the subtitle -->
                        <input required data-parsley-required-message="answer field is required" type='text' name="answer"  value="{{ $faqs->answer ?? old('answer') }}" class=" form-control @error('answer') is-invalid @enderror" placeholder="Enter answer">
                        @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <!-- Submit button -->
                <div class="col-md-12">
                    @if (isset($faqs))
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
