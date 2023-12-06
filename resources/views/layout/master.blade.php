<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Pan & Coffee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta Descripción -->
    <meta name="Pan & Coffee"
        content="We want you to experience the love and taste of homemade meals and drinks, made with sustainable, natural and organic products.">
    <meta name="description"
        content="Pan & Coffee is a bakery and coffee shop born on 2020 specialized in Mexican breads, gourmet baking and sustainable cuisine.">
    <meta name="keywords"
        content="breads bakery, bakery, hot breads, coffee, coffee shops, best coffee, mexican cuisine, bakery near me, coffee near me, coffee shops near me, cuisine" />
    <!-- End Meta Descripción -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto+Slab:400,700">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@1&display=swap');
    </style> --}}
</head>

<body>
    <div class="page-loader preloader">
        <div class="page-loader-body">
            <div class="cssload-thecube">
                <div class="cssload-cube cssload-c1"></div>
                <div class="cssload-cube cssload-c2"></div>
                <div class="cssload-cube cssload-c4"></div>
                <div class="cssload-cube cssload-c3"></div>
            </div>
        </div>
    </div>
    <div class="page">
        <header class="page-header page-header-absolute page-header-dark">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-default rd-navbar-wide rd-navbar-minimal rd-navbar-minimal-dark rd-navbar-classic-dark"
                    data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                    data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                    data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static"
                    data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="1px" data-lg-stick-up-offset="1px"
                    data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel">
                            <button class="rd-navbar-toggle"
                                data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        </div>
                        <div class="rd-navbar-minimal-inner">
                            <div class="rd-navbar-minimal-left">
                                <div class="rd-navbar-nav-wrap">
                                    <div class="rd-navbar-nav-scroll-holder">
                                        <!--Brand-->
                                        <a class="brand" href="index.html">
                                            <img class="brand-logo-dark" src="assets/img/pan-and-coffee-side-menu.png"
                                                alt="Pan and Coffee" width="75" height="75" />
                                            <img class="brand-logo-light" src="assets/img/pan-and-coffee-brand.png"
                                                alt="Pan and Coffee" width="75" height="75" />
                                            <img class="brand-logo-white" src="assets/img/pan-and-coffee-brand.png"
                                                alt="" width="145" height="145" />
                                        </a>
                                        <ul class="rd-navbar-nav">
                                            <li class="rd-nav-item active">
                                                <a class="rd-nav-link" href="{{ route('main') }}">Home</a>
                                            </li>
                                            <li class="rd-nav-item">
                                                <a class="rd-nav-link"
                                                    href="{{ route('main') }}/menu-pan-and-coffee.pdf"
                                                    target="_blank">Menu</a>
                                            </li>
                                            <li class="rd-nav-item">
                                                <a class="rd-nav-link" href="{{ route('gallery') }}">Gallery</a>
                                            </li>
                                            <li class="rd-nav-item">
                                                <a class="rd-nav-link" href="{{ route('contact') }}">Contact</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('store') }}">Order Online</a>
                                            </li>
                                            <li>
                                                <a class="icon icon-sm-mod-20 fa fa-instagram"
                                                    href="https://www.instagram.com/panandcoffeeusa" target="_blank"
                                                    style="margin-top: -5px"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="rd-navbar-minimal-right">
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link js-toggle-cart" href="#">
                                            <i class="fas fa-shopping-cart" style="color:#ffffff"></i>
                                            <span class="cart-indicator">{{ count(session('cart', [])) }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        @section('content')
        @show

        {{-- start cart --}}

        <aside class="cart js-cart">
            {{-- <div class="cart__header">
                <h1 class="cart__title">Shopping cart</h1>
                <p class="cart__text">
                    <a class="button button--light js-toggle-cart" href="#" title="Close cart">
                        Close cart
                    </a>
                </p>
            </div> --}}
            <div class="cart__products js-cart-products">
                <p class="cart__empty js-cart-empty">
                    Add a product to your cart
                </p>
                <div class="cart__product js-cart-product-template">
                    <article class="js-cart-product">
                        <h1>Product title</h1>
                        <p>
                            <a class="js-remove-product" href="#" title="Delete product">
                                Delete product
                            </a>
                        </p>
                    </article>
                </div>
            </div>
            <div class="cart__footer">
                <p class="cart__text">
                    <a class="button" href="{{route('checout.index')}}" title="Checkout">
                        Checkout
                    </a>
                </p>
            </div>
        </aside>

        {{-- End cart --}}

        <!-- Footer -->
        <footer id="footer"
            class="page-footer page-footer-corporate section-lg section-lg--inset-bottom-60 bg-gray-dark text-left">
            <div class="container-wide container-fluid">
                <div class="row justify-content-sm-center row-40">
                    <div style="position: relative; margin: 7%;" class="col-md-6 col-xl-4"><a class="brand"
                            href="index.html"><img src="assets/img/pan-and-coffee-logo-footer.png" width="270"
                                height="150" alt="Pan & Coffee bakery and coffee shop"></a>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <h6 style="font-family: 'Baskervville',serif">Contact Information</h6>
                        <div class="contact-info">
                            <div class="unit flex-row unit-spacing-xxs">
                                <div class="unit-left"><span
                                        class="icon icon-sm mdi mdi-map-marker icon-primary"></span></div>
                                <div class="unit-body">
                                    <p>19298 Stone Oak Parkway suite 1101. San Antonio, TX 78258</p>
                                </div>
                            </div>
                            <div class="unit flex-row unit-spacing-xxs">
                                <div class="unit-left"><span
                                        class="icon icon-sm mdi mdi-calendar-clock icon-primary"></span></div>
                                <div class="unit-body">
                                    <p><b>Monday to Friday</b></p>
                                    <p style="font-size: 12px">7:00 am to 3:00 pm</p>
                                    <p><b>Saturday & Sunday</b></p>
                                    <p style="font-size: 12px">8:00 am to 3:00 pm</p>
                                </div>
                            </div>
                            <div class="unit flex-row unit-spacing-xxs">
                                <div class="unit-left"><span class="icon icon-sm mdi mdi-phone icon-primary"></span>
                                </div>
                                <div class="unit-body">
                                    <p>(210) 756-7312</p>
                                </div>
                            </div>
                            <div class="unit flex-row unit-spacing-xxs">
                                <div class="unit-left"><span
                                        class="icon icon-sm mdi mdi-email-outline icon-primary"></span></div>
                                <div class="unit-body">
                                    <p>hi@panandcoffeeusa.com</p>
                                </div>
                            </div>
                            <!--<ul class="list-inline list-inline-12 list-inline-gray-lighter">-->
                            <!--<li><a class="icon icon-sm-mod-20 fa fa-facebook-f" href="#"></a></li>-->
                            <!--<li><a class="icon icon-sm-mod-20 fa fa-twitter" href="#"></a></li>-->
                            <!--<li><a class="icon icon-sm-mod-20 fa fa-instagram" href="#"></a></li>-->
                            <!--<li><a class="icon icon-sm-mod-20 fa fa-linkedin" href="#"></a></li>-->
                            <!--</ul>-->
                        </div>
                    </div>
                </div>
                <div class="privacy-wrap" style="text-align: center">
                    <p class="rights"><span>&copy;&nbsp;</span><span
                            class="copyright-year"></span><span>&nbsp;</span><span
                            style="color: #d6d1c4; font-weight: bold">Pan & Coffee</span><span>.&nbsp;</span><span>All
                            Rights
                            Reserved.</span><span>&nbsp;</span><a href="{{route('privacy_policy')}}"
                            style="font-weight: bold">Privacy Policy</a>
                    </p>
                    <p style="font-size: 12px; color: #6c757d">Powered by: <a href="https://www.mogarsoft.com/"
                            target="_blank">www.mogarsoft.com</a></p>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
