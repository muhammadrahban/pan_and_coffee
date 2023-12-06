@extends('layout.master')
@section('content')
    <section class="section-fullwidth section-animate animate-content" id="section-1">
        <div class="container-fluid">
            <div class="row justify-content-sm-center no-gutters-xl">
                <div class="col-xl-6">
                    <!-- Breadcrumbs-->
                    <div class="section-fullwidth-left breadcrumbs bg-image"
                        style="background-image: url(assets/contact/pan-and-coffee-gourmet-bakery-and-coffee-shop-contact.jpg)"
                        data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
                        <div class="row row-sm-cente align-items-sm-center breadcrumb-modern section-cover">
                            <div class="col-sm-12 cutom-col section-sm">
                                <div class="breadcrumb-modern-top">
                                </div>
                                <div class="breadcrumb-modern-body">
                                    <a><img src="assets/img/pan-and-coffee-logo-sections.png" width="330" height="150"
                                            alt="Pan & Coffee"></a>
                                    <br><br><br>
                                </div>
                                <div class="breadcrumb-modern-bottom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-sm-10 col-md-8 col-xl-6 section-fullwidth-body section-fullwidth-body-scroll scroll-wrap bg-default text-left">
                    <div class="section-fullwidth-body-inner">
                        <div class="row align-items-sm-center justify-content-sm-center section-lg">
                            <div class="col-sm-12 section-mailform-wrap-25">
                                <h3 style="color: #2D2926; font-family: 'Baskervville',serif">Get in Touch</h3>
                                <div class="divider divider-lg divider-left-0 divider-primary"></div>
                                <!--<p>We would love to hear you, contact us.</p>-->
                                <br>
                                <form class="rd-mailform text-left" data-form-output="form-output-global"
                                    data-form-type="forms" method="post" action="bat/rd-mailform.php">
                                    <div class="row justify-content-sm-center row-15">
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation">
                                                <label class="form-label form-label-outside" for="contacts-name">
                                                    <p style="font-weight: bold">First name*</p>
                                                </label>
                                                <input class="form-input" id="contacts-name" type="text" name="name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation">
                                                <label class="form-label form-label-outside" for="contacts-last-name">
                                                    <p style="font-weight: bold">Last name*</p>
                                                </label>
                                                <input class="form-input" id="contacts-last-name" type="text"
                                                    name="last-name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation">
                                                <label class="form-label form-label-outside" for="contacts-email">
                                                    <p style="font-weight: bold">E-mail*</p>
                                                </label>
                                                <input class="form-input" id="contacts-email" type="email" name="email" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation">
                                                <label class="form-label form-label-outside" for="contacts-phone">
                                                    <p style="font-weight: bold">Phone*</p>
                                                </label>
                                                <input class="form-input" id="contacts-phone" type="text" name="phone" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-wrap form-wrap-validation">
                                                <label class="form-label form-label-outside" for="contacts-message">
                                                    <p style="font-weight: bold">Message*</p>
                                                </label>
                                                <textarea class="form-input" id="contacts-message" name="message" style="height:200px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-wrap">
                                        <button class="button button-primary" type="submit">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="section-button-forward section-button-forward-bottom mdi mdi-chevron-down" href="#"
            data-custom-scroll-to="section-2"></a>
    </section>


    <section class="page-footer page-footer-divided section-fullwidth" id="section-2">
        <div class="section-animate-wrapper">
            <!--<a class="section-button-forward section-button-forward-top mdi mdi-chevron-up" href="#" data-custom-scroll-to="section-0"></a>-->
            <div class="container-fluid">
                <div class="row justify-content-sm-center no-gutters-xl">
                    <div class="col-sm-10 col-lg-8 col-xl-6">
                        <div class="sticky sticky-top">

                            <div class="google-map-container"
                                data-center="19298 Stone Oak Parkway, San Antonio, Texas, EE. UU. Pan and Coffee"
                                data-zoom="5" data-icon="images/gmap_marker.png"
                                data-icon-active="images/gmap_marker_active.png"
                                data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
                                <div class="google-map"></div>
                                <ul class="google-map-markers">
                                    <li data-location="19298 Stone Oak Parkway, San Antonio, Texas, EE. UU. Pan and Coffee."
                                        data-description="19298 Stone Oak Parkway, San Antonio, Texas, EE. UU. Pan and Coffee">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-sm-10 col-lg-8 col-xl-6 section-fullwidth-body section-fullwidth-body-scroll scroll-wrap bg-lg-gray-lighter-2 text-left">
                        <div class="section-fullwidth-body-inner section-lg">
                            <h3 style="color: #2D2926; font-family: 'Baskervville',serif">Visit Us!</h3>
                            <div class="divider divider-lg divider-left-0 divider-primary"></div>
                            <p>We want you to experience the love and taste
                                of homemade meals and drinks made with high quality
                                ingredients.<br>
                                We would love to see you. We have all the health measures.</p>
                            <div class="quote quote-mod">
                                <div class="quote-body"><span
                                        class="icon icon-lg icon-rotate-180 mdi mdi-format-quote icon-primary"></span>
                                    <h4>Baked with love, baked from home.</h4>
                                </div>
                            </div>

                            <!--<a><img src="assets/img/pan-and-coffee-logo-sections.png" width="330" height="150" alt="Pan & Coffee" class="center"></a>-->

                        </div>
                    </div>
                </div>
            </div><a class="section-button-forward section-button-forward-bottom mdi mdi-chevron-down" href="#"
                data-custom-scroll-to="footer"></a>
        </div>
    </section>
@endsection
