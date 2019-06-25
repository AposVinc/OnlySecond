<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="it">
<!--<![endif]-->

<head>
    <!-- =====  BASIC PAGE NEEDS  ===== -->
    <meta charset="utf-8">
    <title>Only Second E-commerce </title>
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating" content="8 YEARS">
    <meta name="Language" content="en-us">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
    <!-- =====  MOBILE SPECIFICATION  ===== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width">
    <!-- =====  CSS  ===== -->

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/magnific-popup.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/owl.carousel.css') }}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset("plugins/frontend/font-awesome-4.7.0/css/font-awesome.min.css")}}">

    <link rel="shortcut icon" href="{{URL::asset("images/icon/rosa.ico")}}">
    <link rel="apple-touch-icon" href="{{URL::asset("images/icon/rosa.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset("images/icon/rosa.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset("images/icon/rosa.png")}}">
</head>

<body>
<!-- =====  LODER  ===== -->
<div class="loder"></div>
<div class="wrapper">
    <!-- =====  POPUP START  ===== -->
<!--
        @include('frontend.initialpopup')
        -->
    <!-- =====  POPUP END  ===== -->
    <!-- =====  HEADER START  ===== -->
    <header id="header">
        <div class="header-top riga">
            <div class="container">
                <div class="row ">
                    <div class="col-xs-12 col-sm-4">
                        <div class="header-top-left">
                            <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Spedizione gratuita con ordini superiori ai 150€</span></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <ul class="header-top-right text-right">
                            <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Lingua <span class="caret"></span> </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Italiano</a></li>
                                    <li><a href="#">Inglese</a></li>
                                </ul>
                            </li>
                            <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Moneta <span class="caret"></span> </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                                    <li><a href="#">€ Euro</a></li>
                                    <li><a href="#">£ Pound Sterling</a></li>
                                    <li><a href="#">$ US Dollar</a></li>
                                </ul>
                            </li>

                            @auth
                                <li class="account"> <a href="{{route('Admin.Index')}}"> Area Privata <i class="fa fa-lock"></i></a> </li>
                                <!-- Sostituire con pagina profilo -->
                                <li class="account"><a href="{{route('user.login')}}">Il mio account (mod) </a><i class="fa fa-user"></i></li>
                                <li class="account"><a href="{{route('user.logout')}}">Logout </a><i class="fa fa-sign-out"></i></li>
                            @else
                                <li class="account"> <a href="{{route('Admin.LoginForm')}}"> Area Privata <i class="fa fa-lock"></i></a> </li>
                                <li class="account"> <a href="{{route('user.login')}}">Il mio account </a><i class="fa fa-user"></i> </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="main-search mt_40">
                            <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <!-- Title -->
                    <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="{{route('Home')}}"> <img alt="themini" src="{{url::asset('images/logo/lungo-O-bianca.png')}}"> </a> </div>
                    <div class="col-xs-6 col-sm-4 shopcart">
                        <div id="cart" class="btn-group btn-block mtb_40">
                            <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true">
                                <span id="shippingcart">Carrello</span>
                                <span id="cart-total">Prodotti (0)</span>
                            </button>
                        </div>
                        <div id="cart-dropdown" class="cart-menu collapse">
                            <ul>
                                <li>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="text-center"><a href="#"><img src="/public/images/frontend/product/70x84.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                                            <td class="text-left product-name"><a href="#">MacBook Pro</a> <span class="text-left price">$20.00</span>
                                                <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                                            </td>
                                            <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><a href="#"><img src="/public/images/frontend/product/70x84.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                                            <td class="text-left product-name"><a href="#">MacBook Pro</a> <span class="text-left price">$20.00</span>
                                                <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                                            </td>
                                            <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Sub-Total</strong></td>
                                            <td class="text-right">$2,100.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                                            <td class="text-right">$2.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>VAT (20%)</strong></td>
                                            <td class="text-right">$20.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Total</strong></td>
                                            <td class="text-right">$2,122.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <form action="cart_page.html">
                                        <input class="btn pull-left mt_10" value="View cart" type="submit">
                                    </form>
                                    <form action="checkout">
                                        <input class="btn pull-right mt_10" value="Checkout" type="submit">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <nav class="navbar">
                    <p>menu</p>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul id="menu" class="nav navbar-nav">
                            <li> <a href="{{route('Home')}}">Home</a></li>
                            <li class="dropdown"> <a href="{{url::route('shop')}}" class="dropdown-toggle" data-toggle="dropdown">Brand </a> <!-- non funzione l'href-->
                                <ul class="dropdown-menu">
                                    <!-- poi ci andra un while che per ogni brand estatto dal database aggiunge all'elenco un <li>, la lista deve esser ordinata alfanumericamente
                                    se vogliamo possiamo mettere un limite sul numero e mandare a capo dopo 6 brand o una cosa del genere
                                    la pagina che si apre deve aver gia settato i filti. se scelgo tissot avro solo tissot-->
                                    <li> <a href="{{ url('/shop') }}">Tissot</a></li>
                                    <li> <a href="{{ url('/shop') }}">Morellato</a></li>
                                    <li> <a href="{{ url('/shop') }}">Fossil</a></li>
                                    <li> <a href="{{ url('/shop') }}">Ice Watch</a></li>
                                    <li> <a href="{{ url('/shop') }}">Casio</a></li>
                                    <li> <a href="{{ url('/shop') }}">Breil</a></li>
                                    <li> <a href="{{ url('/shop') }}">Swatch</a></li>
                                    <li> <a href="{{ url('/shop') }}">Wellington</a></li>
                                </ul>
                            </li>
                            <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Collezioni </a>
                                <ul class="dropdown-menu mega-dropdown-menu row">
                                    <li class="col-md-3">
                                        <ul>
                                            <li class="dropdown-header">Donna</li>
                                            <li><a href="#">Classici</a></li>
                                            <li><a href="#">Digitali</a></li>
                                            <li><a href="#">Waterproof </a></li>
                                            <li><a href="#">Smartwatch</a></li>
                                            <li><a href="#">Sportivi</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <ul>
                                            <li class="dropdown-header">Uomo</li>
                                            <li><a href="#">Classici</a></li>
                                            <li><a href="#">Digitali</a></li>
                                            <li><a href="#">Waterproof </a></li>
                                            <li><a href="#">Smartwatch</a></li>
                                            <li><a href="#">Sportivi</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <ul>
                                            <li class="dropdown-header">Unisex</li>
                                            <li><a href="#">Classici</a></li>
                                            <li><a href="#">Digitali</a></li>
                                            <li><a href="#">Waterproof </a></li>
                                            <li><a href="#">Smartwatch</a></li>
                                            <li><a href="#">Sportivi</a></li>
                                        </ul>
                                    </li>
                                    <!--  IMMAGINE NELLA TENDINA DELLE CATEGORIE   -->
                                    <li class="col-md-3">
                                        <ul>
                                            <li id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="item active"> <a href="#"><img src="/public/images/frontend/menu-banner1.jpg" class="img-responsive" alt="Banner1"></a></div>
                                                    <!-- End Item -->
                                                    <div class="item"> <a href="#"><img src="/public/images/frontend/menu-banner2.jpg" class="img-responsive" alt="Banner1"></a></div>
                                                    <!-- End Item -->
                                                    <div class="item"> <a href="#"><img src="/public/images/frontend/menu-banner3.jpg" class="img-responsive" alt="Banner1"></a></div>
                                                    <!-- End Item -->
                                                </div>
                                                <!-- End Carousel Inner -->
                                            </li>
                                            <!-- /.carousel -->
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li> <a href="about">Chi siamo</a></li>
                            <li> <a href="contact">Contatti</a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </nav>
            </div>
        </div>
    </header>
    <!-- =====  HEADER END  ===== -->

    @yield('content')

    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
        <div class="container">
            <div class="newsletters mt_30 mb_50">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="news-head pull-left">
                            <h2>Segui i nostri aggiornamenti !</h2>
                            <div class="new-desc">Sii il primo a sapere dei nostri nuovi arrivi e molto altro!</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="news-form pull-right">
                            <form onsubmit="return validatemail();" method="post">
                                <div class="form-group required">
                                    <input name="email" id="email" placeholder="Enter Your Email" class="form-control input-lg" required="" type="email">
                                    <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 footer-block">
                    <h6 class="footer-title ptb_20">Informazioni</h6>
                    <ul>
                        <li><a href="#">Chi siamo</a></li>
                        <li><a href="#">Condizioni di vendita</a></li>
                        <li><a href="#">Informativa privacy</a></li>
                        <li><a href="#">Termini e condizioni</a></li>
                        <li><a href="contact.html">Contatti</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-block">
                    <h6 class="footer-title ptb_20">Servizi</h6>
                    <ul>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Il mio account</a></li>
                        <li><a href="#">Cronologia ordini</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-block">
                    <h6 class="footer-title ptb_20">Extras</h6>
                    <ul>
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Gift Certificates</a></li>
                        <li><a href="#">Affiliates</a></li>
                        <li><a href="#">Specials</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-block">
                    <h6 class="footer-title ptb_20">Contacts</h6>
                    <ul>
                        <li>Shop & Offices,</li>
                        <li>12345 Street Only, Italia IT</li>
                        <li>(+024) 666 888</li>
                        <li>only.second@shop.it</li>
                        <li><a href="http://www.lionode.com/">www.onlysecondshop.it</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom mt_60 ptb_20">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="copyright-part text-center">@ 2019 All Rights Reserved Only Second</div>
                    </div>
                    <div class="col-sm-4">
                        <div class="payment-icon text-right">
                            <ul>
                                <li><i class="fa fa-cc-paypal "></i></li>
                                <li><i class="fa fa-cc-visa"></i></li>
                                <li><i class="fa fa-cc-discover"></i></li>
                                <li><i class="fa fa-cc-mastercard"></i></li>
                                <li><i class="fa fa-cc-amex"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====  FOOTER END  ===== -->
</div>
<a id="scrollup"></a>

<script src="{{ URL::asset('js/frontend/jQuery_v3.1.1.min.js') }}"></script>
<script src="{{ URL::asset('js/frontend/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/frontend/jquery.magnific-popup.js') }}"></script>
<script src="{{ URL::asset('js/frontend/jquery.firstVisitPopup.js') }}"></script>
<script src="{{ URL::asset('js/frontend/custom.js') }}"></script>

@if(route::currentRouteName('shop'))
    <!-- PRESI DALLA PAGINA category_page -->
    <script src="{{ URL::asset('js/frontend/jquery-ui.js')}}"></script>
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [75, 300],
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
    <!-- PRESI DALLA PAGINA category_page END -->
@endif

</body>

</html>
