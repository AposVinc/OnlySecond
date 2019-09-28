@extends('frontend.layout')

@section('content')
    <!-- =====  BANNER START  ===== -->
    <div class="banner">
        <div class="main-banner owl-carousel">
            <div class="item"><a href="#"><img src="{{asset('images/frontend/banner/Misfit-Vapor.png')}}" alt="Main Banner" class="img-responsive" /></a></div>
            <div class="item"><a href="#"><img src="{{asset('images/frontend/banner/edifice-radio.png')}}" alt="Main Banner" class="img-responsive" /></a></div>
        </div>
    </div>
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <!-- =====  SUB BANNER  STRAT ===== -->
        <div class="row">
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Shipping"></div>
                    <h6>Free Shipping</h6>
                    <p>Free dedlivery worldwide</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Order"></div>
                    <h6>Order Online</h6>
                    <p>Hours : 8am - 11pm</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Save"></div>
                    <h6>Shop And Save</h6>
                    <p>For All Spices & Herbs</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Safe"></div>
                    <h6>Safe Shoping</h6>
                    <p>Ensure genuine 100%</p>
                </div>
            </div>
        </div>

        @include('frontend.partials.sliderproducts')

        <div class="row">
            <div class="cms_banner">
                <div class="col-xs-12 mt_60">
                    <div id="subbanner4" class="sub-hover">
                        <div class="sub-img"><a href="#"><img src="images/sub5.jpg" alt="Sub Banner5" class="img-responsive"></a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- =====  SUB BANNER END  ===== -->

        @include('frontend.partials.slideroffers')

        @include('frontend.partials.sliderbrands')

    </div>
    <!-- =====  CONTAINER END  ===== -->

@endsection
