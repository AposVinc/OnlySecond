@extends ('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container mt_30">
        <div class="row ">
            <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
                <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                    <div class="nav-responsive">
                        <div class="heading-part">
                            <!-- pannello di sinistra lasciato così in modo da poter decidere insieme cosa metterci-->
                            <h2 class="main_title">Top category</h2>
                        </div>
                        <ul class="nav  main-navigation collapse in">
                            <li><a href="#">Appliances</a></li>
                            <li><a href="#">Mobile Phones</a></li>
                            <li><a href="#">Tablet PC & Accessories</a></li>
                            <li><a href="#">Consumer Electronics</a></li>
                            <li><a href="#">Computers & Networking</a></li>
                            <li><a href="#">Electrical & Tools</a></li>
                            <li><a href="#">Apparel</a></li>
                            <li><a href="#">Bags & Shoes</a></li>
                            <li><a href="#">Toys & Hobbies</a></li>
                            <li><a href="#">Watches & Jewelry</a></li>
                            <li><a href="#">Home & Garden</a></li>
                            <li><a href="#">Health & Beauty</a></li>
                            <li><a href="#">Outdoors & Sports</a></li>
                        </ul>
                    </div>
                </div>
                <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
            </div>
            <div class="col-sm-8 col-lg-9 mtb_20">
                <!-- about  -->
                <div class="row">
                    <div class="col-md-12">
                        <figure> <img src="images/about-page-gaando.jpg" alt="#"> </figure>
                    </div>
                    <div class="col-md-12">
                        <div class="about-text">
                            <div class="about-heading-wrap">
                                <h2 class="about-heading mb_20 mt_40 ptb_10"> Creare Pagina Sconti</h2>
                            </div>
                        </div>

                    </div>
                    <!--End Team Carousel -->
                </div>
            </div>
        </div>
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
