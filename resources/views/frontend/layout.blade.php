<!DOCTYPE html>
<html lang="en">
<head>
    <title>Only Second E-commerce</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/frontend/bootstrap4/bootstrap.min.css")}}">
    <link href="{{URL::asset("plugins/frontend/font-awesome-4.7.0/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("plugins/frontend/OwlCarousel2-2.2.1/owl.carousel.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("plugins/frontend/OwlCarousel2-2.2.1/owl.theme.default.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("plugins/frontend/OwlCarousel2-2.2.1/animate.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/frontend/main_styles.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/frontend/responsive.css")}}">
<!-- css pagina contatti-->
    <link rel="stylesheet" href="{{URL::asset("plugins/frontend/themify-icons/themify-icons.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("plugins/frontend/jquery-ui-1.12.1.custom/jquery-ui.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/frontend/contact_styles.css")}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset("css/frontend/contact_responsive.css")}}">
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header trans_300">

        <!-- Top Navigation -->

        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_nav_left">Consegna gratuita con una spesa superiore ai 150€</div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Currency / Language / My Account -->

                                <li class="currency">
                                    <a href="#">
                                        Moneta
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="currency_selection">
                                        <li><a href="#">€ Euro </a></li>
                                        <li><a href="#">£ Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li>
                                <li class="language">
                                    <a href="#">
                                        Lingua
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="language_selection">
                                        <li><a href="#">Italiano</a></li>
                                        <li><a href="#">Francese</a></li>
                                        <li><a href="#">Tedesco</a></li>
                                        <li><a href="#">Spagnolo</a></li>
                                    </ul>
                                </li>
                                <li class="account">
                                    <a href="#">
                                        Il Mio Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        @auth
                                            <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Esci</a></li>
                                        @else
                                            <li><a href="{{route('user.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Accedi</a></li>
                                            <li><a href="{{route('user.register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrati</a></li>
                                            <li><a href="{{url('admin')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Area Privata</a></li>
                                        @endauth

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="#">Only<span>Second</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="{{url('/home')}}">Home</a></li>
                                <li><a href="categories.html">Brand</a></li>
                                <li><a href="categories.html">Donna</a></li>
                                <li><a href="single.html">Uomo</a></li>
                                <li><a href="single.html">Chi siamo</a></li>
                                <li><a href="{{url('/contact')}}">Contatti</a></li>
                            </ul>
                            <ul class="navbar_user">
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <li class="checkout">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="checkout_items" class="checkout_items">2</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        usd
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">cad</a></li>
                        <li><a href="#">aud</a></li>
                        <li><a href="#">eur</a></li>
                        <li><a href="#">gbp</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        English
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">French</a></li>
                        <li><a href="#">Italian</a></li>
                        <li><a href="#">German</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">shop</a></li>
                <li class="menu_item"><a href="#">promotion</a></li>
                <li class="menu_item"><a href="#">pages</a></li>
                <li class="menu_item"><a href="#">blog</a></li>
                <li class="menu_item"><a href="#">contact</a></li>
            </ul>
        </div>
    </div>

    <!-- Slider -->

    @yield('content')

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_nav_container">
                        <div class="cr">©2019 All Rights Reserverd.</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<script src="{{URL::asset("js/frontend/jquery-3.2.1.min.js")}}"></script>
<script src="{{URL::asset("css/frontend/bootstrap4/popper.js")}}"></script>
<script src="{{URL::asset("css/frontend/bootstrap4/bootstrap.min.js")}}"></script>
<script src="{{URL::asset("plugins/frontend/Isotope/isotope.pkgd.min.js")}}"></script>
<script src="{{URL::asset("plugins/frontend/OwlCarousel2-2.2.1/owl.carousel.js")}}"></script>
<script src="{{URL::asset("plugins/frontend/easing/easing.js")}}"></script>
<script src="{{URL::asset("js/frontend/bootstrap4/custom.js")}}"></script>
<!-- script pagina contatti-->
<script src="{{URL::asset("https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA")}}"></script>
<script src="{{URL::asset("plugins/frontend/jquery-ui-1.12.1.custom/jquery-ui.js")}}"></script>
<script src="{{URL::asset("js/frontend/contact_custom.js")}}"></script>
</body>

</html>
