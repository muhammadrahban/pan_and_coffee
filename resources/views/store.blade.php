@extends('layout.master')
@section('content')
    <section class="section-animate animate-content bg-secondary-3" id="section-0"
        style="padding-top: 90px; padding-bottom: 10px">
        <div class="section-animate-wrapper">
            <div class="container my-2">
                <h4>Bread</h4>
                <hr>
                <div class="row">
                    <!-- start card -->
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="my-cardbody">
                                <img src="{{asset($product->image)}}" alt="" srcset=""
                                    style="height: 200px; width: 100%" />
                                <div class="d-flex justify-content-between p-3">
                                    <p class="my-cardtitle p-0 m-0">{{$product->title}}</p>
                                    <h5 class="my-cardprice p-0 m-0">${{$product->price}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <div class="quantity p-0 m-0">
                                            <a href="#" class="quantity__minus"><span>-</span></a>
                                            <input name="quantity" type="text" class="quantity__input" value="1" />
                                            <a href="#" class="quantity__plus"><span>+</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        <button class="btn btn-success btn-block add-to-cart" data-product-id="{{$product->id}}" data-route="{{ route('cart.store') }}">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- end cart -->
                </div>
            </div>
        </div>
    </section>
@endsection
