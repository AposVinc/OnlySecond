@extends('frontend.layout')

@section('content')
    <!-- =====  BANNER START  ===== -->
    <div class="banner">
        @if($banners->count() == 1)
            <div class="main-banner owl-carousel">
                <div class="item"><a href="#"><img src="{{asset($banners->first()->path_image)}}" alt="Main Banner" class="img-responsive" /></a></div>
            </div>
        @else
            <div class="main-banner owl-carousel">
                @foreach($banners as $banner)
                    <div class="item"><a href="#"><img src="{{asset($banner->path_image)}}" alt="Main Banner" class="img-responsive" /></a></div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <!-- =====  SUB BANNER  START ===== -->
        <div class="row">
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Shipping"></div>
                    <h6>Spedizione Gratuita</h6>
                    <p>Spedizione Gratuita sopra i 250€</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Star"></div>
                    <h6>Recensisci i Prodotti</h6>
                    <p>Lascia la recensione dei prodotti acquistati</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Save"></div>
                    <h6>Registrati e Compra</h6>
                    <p>Salva i tuoi prodotti preferiti</p>
                </div>
            </div>
            <div class="col-sm-3 mt_20 cms-icon ">
                <div class="feature-i-left ptb_30 ">
                    <div class="icon-right Safe"></div>
                    <h6>Shopping Sicuro</h6>
                    <p>Acquista in totale sicurezza</p>
                </div>
            </div>
        </div>

        @include('frontend.partials.sliderproducts')

<!--
        <div class="row">
            <div class="cms_banner">
                <div class="col-xs-12 mt_60">
                    <div id="subbanner4" class="sub-hover owl-carousel">
                        @foreach($sub_banners as $sub_banner)
                            <div class="item sub-img"><a href="#"><img src="{{asset($sub_banner->path_image)}}" alt="Sub Banner5" class="img-responsive"></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
-->
        
        <div class="main-banner owl-carousel">
            @foreach($sub_banners as $banner)
                <div class="item"><a href="#"><img src="{{asset($banner->path_image)}}" alt="Sub Banner" class="img-responsive" /></a></div>
            @endforeach
        </div>

        <!-- =====  SUB BANNER END  ===== -->

        @include('frontend.partials.slideroffers')

        @include('frontend.partials.sliderbrands')

    </div>
    <!-- =====  CONTAINER END  ===== -->

@endsection
