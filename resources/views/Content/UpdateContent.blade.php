@extends('layouts.master')
@section('contain')
     {{-- title --}}
     <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            @if (isset($content))
            <h4 class="card-title">Update Content</h4>
        @else
            <h4 class="card-title">Add Content</h4>
        @endif
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a class="text-cyan" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ Route('content.list') }}" class="text-cyan">Content</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    {{-- end title --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        @if (isset($content))
                            <form method="POST" action="{{ Route('content.update',$content->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                         @else
                                <form method="POST" action="{{ Route('content.add') }}" enctype="multipart/form-data">
                                @csrf
                        @endif

                        <div class="form-group">
                            <label for="name"  class="font-bold">Name</label>
                            {{-- {{ $content->name ?? '' }} --}}
                            <input type="text" readonly  name="name" value="{{ $content->name ?? '' }}"
                                class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail111"
                                placeholder="Enter name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" form-group">
                            <label class="font-bold">Description</label>
                            <textarea  id="mymce"  placeholder="Add Description" class="form-control @error('description') is-invalid @enderror"
                                name="description" rows="5">{{ $content->description ?? '' }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (isset($content))
                            <button type="submit" class="btn btn-warning me-2 text-white">Update</button>
                        @else
                            <button type="submit" class="btn btn-success me-2 text-white">Submit</button>
                        @endif
                        {{-- <button type="submit" class="btn btn-dark">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var selected = $('#choice').val();
            if(selected == "page" || selected == "web" ){
                $('#other').css({ "display": "none" });
            }else{
                $('#other').css({ "display": "block" });
            }

            $('#choice').change(function(){
                var selected_item = $(this).val()
                if(selected_item == "page" || selected_item == "web" ){
                    // $('#other').val("").hideClass('hidden');
                    $('#other').css({ "display": "none" });
                }else{
                    $('#other').css({ "display": "block" });
                    // $('#other').val(selected_item).addClass('hidden');
                }
            });
        });

    </script>
@endsection
