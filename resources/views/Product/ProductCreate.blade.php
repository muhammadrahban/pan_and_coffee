@extends('layouts.master')
@section('contain')
    <!-- Page titles -->
    <div class="row page-titles">
        <!-- Title based on whether you're updating or adding a product -->
        <div class="col-md-5 align-self-center">
            @if (isset($product))
                <h4 class="card-title">Update Product</h4>
            @else
                <h4 class="card-title">Add Product</h4>
            @endif
        </div>
        <div class="col-md-7 align-self-center text-end">
            <!-- Breadcrumbs -->
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ Route('product.index') }}">Products</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Page titles -->

    <!-- product Form -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            @if (isset($product))
                <!-- Form for updating an existing product -->
                <form method="POST" action={{ Route('product.update', $product->id) }} enctype="multipart/form-data"
                    data-parsley-validate>
                    @csrf
                    @method('PUT')
                @else
                    <!-- Form for adding a new product -->
                    <form action="{{ Route('product.add') }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate>
                        @csrf
            @endif
            <!-- Form fields -->
            <div class="form-row col-md-6">
                <!-- Title field -->
                <div class="col-md-12 mb-3">
                    <label class="font-bold">Title*</label>
                    <!-- Input for the title -->
                    <input required data-parsley-required-message="Title field is required" type="text"
                        class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ $product->title ?? old('title') }}" autocomplete="off" placeholder="Enter title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="font-bold">Size*</label>
                    <!-- Input for the subtitle -->
                    <input required data-parsley-required-message="size field is required" type='text' name="size"
                        value="{{ $product->size ?? old('size') }}"
                        class=" form-control @error('size') is-invalid @enderror" placeholder="Enter size">
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="form-group col-sm-12">
                        <label for="title" class="font-bold">Url*</label>
                        <input required type="text" name="redirect_url"
                            value="{{ isset($product) ? ($product->redirect_url ? $product->redirect_url : (old('redirect_url') ? old('redirect_url') : '')) : (old('redirect_url') ? old('redirect_url') : '') }}"
                            class="form-control @error('redirect_url') is-invalid @enderror" id="exampleInputEmail111"
                            placeholder="Enter redirect_url" data-parsley-type="redirect_url"
                            data-parsley-pattern="^https?://[\w-]+(\.[\w-]+)+(/[\w-./?%&=]*)?$">
                        @error('redirect_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                <div class="col-md-12 mb-3">
                    <label class="font-bold">Price*</label>
                    <!-- Input for the price (read-only) -->
                    <input required data-parsley-required-message="price field is required" type="number" name="price"
                        min="5" oninput="this.value = this.value.replace(/\D/g, '')"
                        value="{{ $product->price ?? old('price') }}"
                        class="form-control @error('price') is-invalid @enderror" autocomplete="off"
                        placeholder="Enter price">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- image field -->
                <div class="col-md-12 mb-3">
                    <label class="font-bold">Image</label>
                    <!-- Textarea for the image -->
                    <input
                        @if (!isset($product)) required data-parsley-required-message="Image field is required" @endif
                        type="file" accept="image/*" placeholder="Add image"
                        class="form-control @error('image') is-invalid @enderror" name="image" rows="5">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (isset($product))
                        <a href="{{ URL::asset($product->image != null ? env('MEDIA_URL') . $product->image : 'images/placeholder_blue_user.png') }}"
                            target="_blank">
                            <img src="{{ $product->image != null ? env('MEDIA_URL') . $product->image : asset('images/placeholder_blue_user.png') }}"
                                class="img-circle" width="50" />
                        </a>
                    @endif
                </div>
                <div class="col-md-12 mb-3">
                    <label class="font-bold">Description*</label>
                    <!-- Input for the subtitle -->
                    <input required data-parsley-required-message="description field is required" type='text'
                        name="description" value="{{ $product->description ?? old('description') }}"
                        class=" form-control @error('subtitle') is-invalid @enderror" placeholder="Enter subtitle">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Submit button -->
            <div class="col-md-12">
                @if (isset($product))
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
            document.getElementById('number-mask'), {
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
