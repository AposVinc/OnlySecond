<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="it">
<!--<![endif]-->

<head>
    <!-- =====  BASIC PAGE NEEDS  ===== -->
    <meta charset="utf-8">
    <title>Only Second E-Commerce</title>
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <link rel="stylesheet" type="text/css" href="{{ URL::asset("plugins/frontend/font-awesome-4.7.0/css/font-awesome.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/bootstrap.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/custom.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/magnific-popup.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/ribbons/ribbons.css') }}">
    @if(strpos(route::currentRouteName(),'Shop')!== false)
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/jquery-ui.css') }}">
    @endif

    <link rel="shortcut icon" href="{{URL::asset("images/icon/arancione.ico")}}">
    <link rel="apple-touch-icon" href="{{URL::asset("images/icon/arancione.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset("images/icon/arancione.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset("images/icon/arancione.png")}}">

</head>

<body>
<!-- =====  HEADER START  ===== -->
<header id="header">
    <div class="header-top riga">
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-4">
                    <div class="header-top-left">
                        <div class="contact">
                            <span class="hidden-xs hidden-sm hidden-md">
                                Spedizione gratuita con ordini superiori ai 250€
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <ul class="header-top-right text-right">
                        <li class="language dropdown">
                            <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                Lingua <span class="caret"></span>
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Italiano</a></li>
                                <li><a href="#">Inglese</a></li>
                            </ul>
                        </li>
                        <li class="currency dropdown">
                            <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                Moneta <span class="caret"></span>
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                                <li><a href="#">€ Euro</a></li>
                                <li><a href="#">£ Pound Sterling</a></li>
                                <li><a href="#">$ US Dollar</a></li>
                            </ul>
                        </li>
                        @auth
                            <li class="account"> <a href="{{route('Profile')}}">Il Mio Profilo </a><i class="fa fa-user"></i></li>
                            <li class="account"> <a href="{{route('User.Logout')}}">Logout </a><i class="fa fa-sign-out"></i></li>
                        @else
                            <li class="account"> <a href="{{route('Admin.Index')}}">Area Privata <i class="fa fa-lock"></i></a> </li>
                            @auth('admin')
                                <li class="account"> <a href="{{route('Admin.Logout')}}">Logout </a><i class="fa fa-sign-out"></i></li>
                            @else
                                <li class="account"> <a href="{{route('User.Login')}}">Login </a><i class="fa fa-sign-in"></i> </li>
                            @endauth
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4" style="display: inline-block;">
                    <div class="main-search mt_40">
                        <input id="search-input" name="search" value="" placeholder="Cerca" class="form-control input-lg" autocomplete="off" type="text">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <!-- Title -->
                <div class="navbar-header col-xs-6 col-sm-4">
                    <a class="navbar-brand mt_6" href="{{route('Home')}}">
                        <img alt="OnlySecond" src="{{url::asset('images/logo/lungo-O-bianca.png')}}">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 shopcart"  style="display: inline-block;">
                    <div id="cart" class="btn-group btn-block mtb_40">
                        <a href="{{route('Wishlist')}}" id="wishlistButtonNav">
                            <i class="fa fa-heart-o pt_3" aria-hidden="true" title="Wishlist"></i>
                        </a>
                        <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true">
                            <span id="shippingcart">Carrello</span>
                            @auth()
                                @if(auth()->User()->products->isEmpty())
                                    <span id="cart-total">Prodotti (0)</span>
                                @else
                                    <span id="cart-total">Prodotti ({{auth()->User()->products->count()}})</span>
                                @endif
                            @else
                                @if(Session::has('products'))
                                    <span id="cart-total">Prodotti ({{count(Session::get('products'))}})</span>
                                @else
                                    <span id="cart-total">Prodotti (0)</span>
                                @endif
                            @endauth
                        </button>
                    </div>
                    <div id="cart-dropdown" class="cart-menu collapse">
                        <ul>
                            @auth()
                                @if(auth()->User()->products->isEmpty())
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center tdCartEmpty">
                                                        <span style="font-size: 18px;">
                                                            Il tuo carrello è vuoto.
                                                        </span>
                                                        <br>
                                                        <small>
                                                            Per aggiungere articoli al tuo carrello, quando trovi un articolo che ti interessa, clicca su "Aggiungi al carrello"
                                                            o sull'icona " <i class="fa fa-shopping-cart"></i> "
                                                        </small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                @else
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                                @foreach(auth()->User()->products->sortBy('created_at') as $product)
                                                    @if($loop->iteration > 3)
                                                        @break
                                                    @else
                                                        <tr>
                                                            @if($product->offer()->exists())
                                                                <td class="text-center" style="width: 80px;">
                                                                    <div style="position:absolute; width: 80px;">
                                                                        <div class="image product-imageblock">
                                                                            <a href="{{route('Product',['cod' => $product->cod])}}">
                                                                                <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="ribbon orangeOSCart"><span>{{$product->offer->rate}}%</span></div>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td class="text-center" style="width: 80px;">
                                                                    <div>
                                                                        <a href="{{route('Product',['cod' => $product->cod])}}">
                                                                            <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            <td class="text-left product-name">
                                                                <a href="{{route('Product',['cod' => $product->cod])}}">
                                                                    <span>{{$product->collection->brand->name}} {{$product->collection->name}}</span>
                                                                    <span class="text-left price">{{$product->cod}}</span>
                                                                    <span class="text-left price">qnt: {{$product->pivot->quantity}}</span>
                                                                    @if($product->offer()->exists())
                                                                        <span class="price pr_10" style="float: left;"><del>{{$product->price}}€ </del> </span>
                                                                        <span class="price">{{$product->offer->calculateDiscount()}}€</span>
                                                                    @else
                                                                        <span class="text-left price">{{$product->price}}€</span>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{route('Cart.RemoveProduct',['cod'=>$product->cod])}}" type="button">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <strong>Sub-Totale</strong>
                                                        <span class="spanIva">(Iva inclusa)</span>
                                                    </td>
                                                    <td class="text-right">
                                                        {{auth()->User()->calculateTotalPrice()}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @if(auth()->User()->calculateTotalPrice()>250)
                                                        <td class="text-left">
                                                            <small>Costo di spedizione:</small>
                                                        </td>
                                                        <td class="text-right">
                                                            <small>Gratuita</small>
                                                        </td>
                                                    @else
                                                        <td colspan="2">
                                                            <small> + Costo di spedizione</small>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <a href="{{route('Checkout')}}" class="btn mt_10" style="float: left;">
                                            Checkout
                                        </a>
                                        <a href="{{route('CartPage')}}" class="btn pull-right mt_10" style="float: right;">
                                            Riepilogo
                                        </a>
                                    </li>
                                @endif
                            @else
                                @if(Session::has('products'))
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                                @foreach(Session::get('products') as $product)
                                                    @if($loop->iteration > 3)
                                                        @break
                                                    @else
                                                        <tr>
                                                            @if($product->offer()->exists())
                                                                <td class="text-center" style="width: 80px;">
                                                                    <div style="position:absolute; width: 80px;">
                                                                        <div class="image product-imageblock">
                                                                            <a href="{{route('Product',['cod' => $product->cod])}}">
                                                                                <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="ribbon orangeOSCart"><span>{{$product->offer->rate}}%</span></div>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td class="text-center" style="width: 80px;">
                                                                    <div class="image product-imageblock">
                                                                        <a href="{{route('Product',['cod' => $product->cod])}}">
                                                                            <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            <td class="text-left product-name">
                                                                <a href="{{route('Product',['cod' => $product->cod])}}">
                                                                    <span>{{$product->collection->brand->name}} {{$product->collection->name}}</span>
                                                                    <span class="text-left price">{{$product->cod}}</span>
                                                                    @if(Session::has('quantity'))
                                                                        <span class="text-left price">qnt: {{Session::get('quantity')[$loop->index] }}</span>
                                                                    @endif
                                                                    @if($product->offer()->exists())
                                                                        <span class="price pr_10" style="float: left;"><del>{{$product->price}}€ </del> </span>
                                                                        <span class="price">{{$product->offer->calculateDiscount()}}€</span>
                                                                    @else
                                                                        <span class="text-left price">{{$product->price}}€</span>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{route('Cart.RemoveProduct',['cod'=>$product->cod])}}" type="button">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <table class="table">
                                            <tbody>
                                                @if(Session::has('TotalPrice'))
                                                    <tr>
                                                        <td class="text-left">
                                                            <strong>Sub-Totale</strong>
                                                            <span class="spanIva">(Iva inclusa)</span>
                                                        </td>
                                                        <td class="text-right">
                                                            {{Session::get('TotalPrice')}} €
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        @if(Session::get('TotalPrice')>250)
                                                            <td class="text-left">
                                                                <small>Costo di spedizione:</small>
                                                            </td>
                                                            <td class="text-right">
                                                                <small>Gratuita</small>
                                                            </td>
                                                        @else
                                                            <td colspan="2">
                                                                <small> + Costo di spedizione</small>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <a href="{{route('Checkout')}}" class="btn mt_10" style="float: left;">
                                            Checkout
                                        </a>
                                        <a href="{{route('CartPage')}}" class="btn pull-right mt_10" style="float: right;">
                                            Riepilogo
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <span style="font-size: 18px;">
                                                            Il tuo carrello è vuoto.
                                                        </span>
                                                        <br>
                                                        <small>
                                                            Per aggiungere articoli al tuo carrello, quando trovi un articolo che ti interessa, clicca su "Aggiungi al carrello"
                                                            o sull'icona " <i class="fa fa-shopping-cart"></i> "
                                                        </small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
            @include('frontend.partials.nav')
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
                        <h2>Segui i nostri aggiornamenti!</h2>
                        <div class="new-desc">Scrivici per conoscere i nuovi arrivi e molto altro!</div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="news-form pull-right">
                        <form action="{{route('Newsletter.AddPost')}}" method="post">
                            @csrf
                            <div class="form-group required">
                                <input name="newsletterEmail" id="newsletterEmail" placeholder="Inserisci la tua Email" class="form-control input-lg" type="email" required>
                                <button type="submit" class="btn btn-default btn-lg">Iscriviti</button>
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
                    <li><a href="{{route('About')}}">Chi siamo</a></li>
                    <li><a href="#">Condizioni di vendita</a></li>
                    <li><a href="#">Informativa Privacy</a></li>
                    <li><a href="#">Termini e Condizioni</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-block">
                <h6 class="footer-title ptb_20">Servizi</h6>
                <ul>
                    <li><a href="{{route('Wishlist')}}">WishList</a></li>
                    <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                    <li><a href="{{route('Chronology')}}">Cronologia Ordini</a></li>
                    <li><a href="{{route('Review')}}">Recensioni</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-block">
                <h6 class="footer-title ptb_20">Extra</h6>
                <ul>
                    <li><a href="#">Brands</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">In Sconto</a></li>

                </ul>
            </div>
            <div class="col-md-3 footer-block">
                <h6 class="footer-title ptb_20">Contattaci</h6>
                <ul>
                    <li>Shop Online</li>
                    <li>Via Vetoio, 67100 L'Aquila AQ </li>
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
                    <div class="copyright-part text-center">@ 2019 Tutti I Diritti Sono Riservati Only Second</div>
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
<a id="scrollup"></a>

<script src="{{ URL::asset('js/frontend/jQuery_v3.1.1.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ URL::asset('js/frontend/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/frontend/jquery.magnific-popup.js') }}"></script>
<script src="{{ URL::asset('js/frontend/custom.js') }}"></script>


@if(strpos(route::currentRouteName(),'Shop')!== false or strpos(route::currentRouteName(),'Discount')!== false )
    <!-- PRESI DALLA PAGINA category_page -->
    <script src="{{ URL::asset('js/frontend/jquery-ui.js') }}"></script>
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

<script src="{{ URL::asset('js/frontend/jquery.firstVisitPopup.js') }}"></script>

@if(strpos(route::currentRouteName(),'Contact')!== false)
    <!-- Maps da errore con le api, su forum ho letto che è a pagamento
    https://www.mtb-mag.com/forum/threads/questa-pagina-non-carica-correttamente-google-maps.369147/

    OpenStreetMaps è un alternativa a Maps ma meno completa -->

    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script>
        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());

        var lonLat = new OpenLayers.LonLat( 13.349258 , 42.368826 )
            .transform(
                new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
                map.getProjectionObject() // to Spherical Mercator Projection
            );
        var zoom=16;
        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(lonLat));
        map.setCenter (lonLat, zoom);
    </script>
    <script src="{{URL::asset('js/frontend/map.js')}}"></script>
    <script src="{{URL::asset('js/frontend/mail.js')}}"></script>
@endif

@if(strpos(route::currentRouteName(),'EditProfile')!== false)
    <!-- checkout nuovo indirizzo-->
    <script>
        function ActiveForm(){
            var checkbox = $('<div class="checkbox col-sm-9 col-md-offset-3" style="left: 25px;">\n' +
                '               <input type="checkbox" value="true" id="change_psw" name="change_psw" onclick="changePassword()"><span>Vuoi Cambiare Password?</span>\n' +
                '             </div>');
            $('#divCheckbox').addClass('form-group required');
            $('#password').hide();
            checkbox.appendTo('#divCheckbox');

            $('input').prop('disabled',false);
            $('#buttonBack').hide();
            $('#buttonEdit').hide();
            $('#buttonReset').show();
            $('#buttonSave').show();
        }

        function changePassword() {
            if($('#change_psw').is(':checked')){
                if($('#password').children().length != 4){
                    var old_password = $(' <div class="form-group required">\n' +
                        '                                    <label for="old-password" id="label-old-password" class="col-sm-3 control-label" style="padding-top: 0; top: -5px">Vecchia Password</label>\n' +
                        '                                    <div class="col-sm-9">\n' +
                        '                                        <input type="password" class="form-control" id="old-password" placeholder="Vecchia Password" value="" name="old-password">\n' +
                        '                                    </div>\n' +
                        '                                </div>');
                    var new_password = $('<div class="form-group required">\n' +
                        '                                    <label for="new-password" id="label-new-password" class="col-sm-3 control-label" style="padding-top: 0; top: -5px">Nuova Password</label>\n' +
                        '                                    <div class="col-sm-9">\n' +
                        '                                        <input type="password" class="form-control" id="new-password" placeholder="Nuova Password" value="" name="new-password">\n' +
                        '                                    </div>\n' +
                        '                                </div>'    );
                    var confirm_new_password = $('<div class="form-group required">\n' +
                        '                                    <label for="confirm-new-password" id="label-confirm-new-password" class="col-sm-3 control-label" style="padding-top: 0; top: -5px">Conferma Nuova Password</label>\n' +
                        '                                    <div class="col-sm-9">\n' +
                        '                                        <input type="password" class="form-control" id="confirm-new-password" placeholder="Conferma Nuova Password" value="" name="confirm-new-password">\n' +
                        '                                    </div>\n' +
                        '                                </div>'    );
                    old_password.appendTo('#password');
                    new_password.appendTo('#password');
                    confirm_new_password.appendTo('#password');
                }else{
                    $('#password').children().show();
                }
                $('#password').show();
                $('#password').children().eq(0).hide();
            }else{
                $('#password').hide();
            }
        }

        function DisableForm(){
            $('#divCheckbox').removeClass('form-group required');
            $('.checkbox').remove();

            $('#password').children().hide();
            $('#password').children().eq(0).show();
            $('#password').show();

            $('input').prop('disabled',true);
            $('#buttonBack').show();
            $('#buttonEdit').show();
            $('#buttonReset').hide();
            $('#buttonSave').hide();
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Address')!== false)
    <!-- checkout nuovo indirizzo -->
    <script type="text/javascript">
        $('input[name=\'select_address\']').on('change', function() {
            if (this.value == 'existing') {
                $('#address-existing').show();
                $('#address-new').hide();
                $('#address-delete').hide();
            }
            if (this.value == 'new') {
                $('#address-existing').hide();
                $('#address-new').show();
                $('#address-delete').hide();
            }
            if (this.value == 'delete') {
                $('#address-existing').hide();
                $('#address-new').hide();
                $('#address-delete').show();
            }
        });
    </script>
@endif


<script>

    var filterGroup;

    filterGroup = $('#filter-group-brands');
    if ($('#filter-group-brands .checkbox').length > 6) AddShowMore(filterGroup);

    filterGroup = $('#filter-group-collections');
    if ($('#filter-group-collections .checkbox').length > 6) AddShowMore(filterGroup);

    filterGroup = $('#filter-group-categories');
    if ($('#filter-group-categories .checkbox').length > 6) AddShowMore(filterGroup);

    filterGroup = $('#filter-group-colors');
    if ($('#filter-group-colors .checkbox').length > 6) AddShowMore(filterGroup);

    filterGroup = $('#filter-group-materials');
    if ($('#filter-group-materials .checkbox').length > 6) AddShowMore(filterGroup);

    function AddShowMore(gen){
        gen.parent().switchClass('mb_10','mb_15');  //poiche viene aggiunto "mostra altro", i div sono troppo appiccicati
        var DivShowMore = $('<div class="showMore">\n' +
            '                                <i class="fa fa-angle-down"></i>\n' +
            '                                <a class="ml_7">Mostra Altro</a>\n' +
            '                            </div>');
        gen.addClass("content hideContent"); //aggiungo la classe solo a quelli >6
        gen.children(':eq(5)').after(DivShowMore);
    }

    $(document).on('click', '.showMore a', function(){
        var elementClick = $(this);
        var divContent = elementClick.parents('.content');
        elementClick.parent().remove();
        var DivShowLess = $('<div class="showLess">\n' +
            '                                <i class="fa fa-angle-up"></i>\n' +
            '                                <a class="ml_7">Mostra Meno</a>\n' +
            '                            </div>');
        DivShowLess.appendTo(divContent);
        divContent.switchClass("hideContent", "showContent",400);
    });

    $(document).on('click', '.showLess a', function(){
        var elementClick = $(this);
        var divContent = elementClick.parents('.content');
        elementClick.parent().remove();
        divContent.removeClass("content showContent");
        AddShowMore(divContent);
    });


    /*
    $(document).ready(function(){
        $('.navBrand').on('click', function () {
            var brand = $(this).text();
            var filterBrands = $('#filter-group-brands').children();
            for(var i=0; i < filterBrands.length; i++){
                var e = filterBrands[i].children[0];
                if(e.innerText === brand){
                    e.children[0].toggleAttribute('checked');
                }
            }
            parseProductsProva(brand);
        })
    });

    function parseProductsProva(brand){
        var products = $('#listProducts').children();
        for(var i=0; i < products.length; i++){
            if(!brand === products[i].getAttribute('brand')){
                products[i].style = "display: none;";
            }
        }
    }
*/
    function filtering() {
        var e,i,arrCheckboxes,fGroup;
        var products = $('#listProducts').children();

        for(i=0; i < products.length; i++){
            products[i].style.display = "block";
        }

        arrCheckboxes = [];
        fGroup = $('#filter-group-genres').children();
        for(i=0; i < fGroup.length; i++){
            e = fGroup[i].children[0].children[0];
            if(e.checked){
                arrCheckboxes.push(e.value);
            }
        }
        if(arrCheckboxes.length){
            parseProducts(products, arrCheckboxes, 'genre');
        }

        arrCheckboxes = [];
        fGroup = $('#filter-group-brands').children();
        for(i=0; i < fGroup.length; i++){
            if(!fGroup[i].classList.contains('showMore')){
                e = fGroup[i].children[0].children[0];
                if(e.checked){
                    arrCheckboxes.push(e.value);
                }
            }
        }
        if(arrCheckboxes.length) {
            parseProducts(products, arrCheckboxes, 'brand');
        }

        arrCheckboxes = [];
        fGroup = $('#filter-group-collections').children();
        for(i=0; i < fGroup.length; i++){
            if(!fGroup[i].classList.contains('showMore')){
                e = fGroup[i].children[0].children[0];
                if(e.checked){
                    arrCheckboxes.push(e.value);
                }
            }
        }
        if(arrCheckboxes.length) {
            parseProducts(products, arrCheckboxes, 'collection');
        }

        arrCheckboxes = [];
        fGroup = $('#filter-group-categories').children();
        for(i=0; i < fGroup.length; i++){
            if(!fGroup[i].classList.contains('showMore')){
                e = fGroup[i].children[0].children[0];
                if(e.checked){
                    arrCheckboxes.push(e.value);
                }
            }
        }
        if(arrCheckboxes.length){
            parseProducts(products, arrCheckboxes, 'categories');
        }

        arrCheckboxes = [];
        fGroup = $('#filter-group-colors').children();
        for(i=0; i < fGroup.length; i++){
            if(!fGroup[i].classList.contains('showMore')){
                e = fGroup[i].children[0].children[0];
                if(e.checked){
                    arrCheckboxes.push(e.value);
                }
            }
        }
        if(arrCheckboxes.length){
            parseProducts(products, arrCheckboxes, 'color');
        }

        arrCheckboxes = [];
        fGroup = $('#filter-group-materials').children();
        for(i=0; i < fGroup.length; i++){
            if(!fGroup[i].classList.contains('showMore')){
                e = fGroup[i].children[0].children[0];
                if(e.checked){
                    arrCheckboxes.push(e.value);
                }
            }
        }
        if(arrCheckboxes.length){
            parseProducts(products, arrCheckboxes, 'material');
        }
    }

    function parseProducts(products, arrCheckboxes, attr) {
        for(var i=0; i < products.length; i++){
            if(products[i].style.display !== "none"){
                if(arrCheckboxes.includes(products[i].getAttribute(attr))){
                    products[i].style.display = "block";
                } else {
                    products[i].style.display = "none";
                }
            }
        }
    }


</script>


</body>
</html>
