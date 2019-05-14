@extends('frontend.layout')

@section('content')

    <div class="main_slider" style="background-image: url(http://localhost/OnlySecond/images/casioslider.jpg)">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>CASIO / Collezione 2019</h6>
                        <h1>Nuovi Arrivi</h1>
                        <div class="red_button shop_now_button"><a href="#">Compra Ora</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(http://localhost/OnlySecond/images/banner_1.jpg)">
                        <div class="banner_category">
                            <a href="categories.html">Fossil</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(http://localhost/OnlySecond/images/banner_2.jpg)">
                        <div class="banner_category">
                            <a href="categories.html">Casio</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(http://localhost/OnlySecond/images/banner_3.jpg)">
                        <div class="banner_category">
                            <a href="categories.html">Ice Watch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Nuovi Arrivi</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tutti</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">Fossil</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">Tissot</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">Wellington</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <!-- Product 1 -->

                        <div class="product-item men">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <img src="..\images\product_1.png" alt="">
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-20€</span></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Wellington White</a></h6>
                                    <div class="product_price">520.00€<span>590.00€</span></div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 2 -->

                        <div class="product-item women">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_2.png" alt="">
                                </div>
                                <div class="favorite"></div>
                                <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>Nuovo</span></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Fossil Black</a></h6>
                                    <div class="product_price">610.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 3 -->

                        <div class="product-item women">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_3.png" alt="">
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Fossil Gold</a></h6>
                                    <div class="product_price">120.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 4 -->

                        <div class="product-item accessories">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_4.png" alt="">
                                </div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Saldi</span></div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Tissot Black</a></h6>
                                    <div class="product_price">410.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 5 -->

                        <div class="product-item women ">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_5.png" alt="">
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Fossil Rose Gold</a></h6>
                                    <div class="product_price">180.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 6 -->

                        <div class="product-item accessories">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <img src="../images/product_6.png" alt="">
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-20€</span></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="#single.html">Tissot Leather</a></h6>
                                    <div class="product_price">520.00€<span>590.00€</span></div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 7 -->

                        <div class="product-item women">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_7.png" alt="">
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Fossil White</a></h6>
                                    <div class="product_price">610.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 8 -->

                        <div class="product-item accessories">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_8.png" alt="">
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Tissot Steel</a></h6>
                                    <div class="product_price">120.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 9 -->

                        <div class="product-item men">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_9.png" alt="">
                                </div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Saldi</span></div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Wellington Gold</a></h6>
                                    <div class="product_price">410.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>

                        <!-- Product 10 -->

                        <div class="product-item men">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <img src="../images/product_10.png" alt="">
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html">Wellington color</a></h6>
                                    <div class="product_price">180.00€</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Aggiungi La Carta</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="../images/offertaok.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Offerta Della Settimana</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Giorni</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Ore</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Minuti</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Secondi</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#">Compra Ora</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        <div class="owl-carousel owl-theme product_slider">

                            <!-- Slide 1 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="../images/product_1.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-20€</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Wellington White</a></h6>
                                            <div class="product_price">520.00€<span>590.00€</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_2.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>Nuovo</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Fossil Black</a></h6>
                                            <div class="product_price">610.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_3.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Fossil Gold</a></h6>
                                            <div class="product_price">120.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_4.png" alt="">
                                        </div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Saldi</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Tissot Black</a></h6>
                                            <div class="product_price">410.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_5.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Fossil Rose Gold</a></h6>
                                            <div class="product_price">180.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="../images/product_6.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-20€</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Tissot Leather</a></h6>
                                            <div class="product_price">520.00€<span>590.00€</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 7 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_7.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Fossil White</a></h6>
                                            <div class="product_price">610.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 8 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_8.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Tissot Steel</a></h6>
                                            <div class="product_price">120.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 9 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_9.png" alt="">
                                        </div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Saldi</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Wellington Gold</a></h6>
                                            <div class="product_price">410.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 10 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_10.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="single.html">Wellington Color</a></h6>
                                            <div class="product_price">180.00€</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slider Navigation -->

                        <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>Consegna Gratuita</h6>
                            <p>Ha subito alterazioni di qualsiasi forma</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>Metodi di Pagamento</h6>
                            <p>info</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>15 giorni di reso</h6>
                            <p>con confezione intatta</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>Apertura settimanale</h6>
                            <p>orario</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
