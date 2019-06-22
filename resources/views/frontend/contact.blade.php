@extends('frontend.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container mt_30">
    <div class="row ">
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                <div class="nav-responsive">
                    <div class="heading-part">
                        <h2 class="main_title">Top Brands</h2>
                    </div>
                    <!-- pannello di sinistra lasciato così in modo da poter decidere insieme cosa metterci-->
                    <ul class="nav  main-navigation collapse in">
                        <li><a href="#">Breil</a></li>
                        <li><a href="#">Tissot</a></li>
                        <li><a href="#">Casio</a></li>
                        <li><a href="#">Wellington</a></li>
                        <li><a href="#">Swatch</a></li>
                        <li><a href="#">okok</a></li>
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
            <!-- contact  -->
            <div class="row">
                <div class="col-md-4 col-xs-12 contact">
                    <div class="location mb_50">
                        <h5 class="capitalize mb_20"><strong>I Nostri Contatti Telefonici</strong></h5>
                        <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>+0861254897</div>
                        <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>+3339568744</div>
                    </div>
                    <div class="Career mb_50">
                        <h5 class="capitalize mb_20"><strong>I Nostri Contatti Di Posta Elettronica</strong></h5>
                        <div class="address">Ponici domande e ti forniremo le adeguate delucidazioni</div>
                        <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:onlysecondinfo@gmail.com" target="_top">onlysecondinfo@gmail.com</a></div>
                    </div>
                    <div class="Hello mb_50">
                        <h5 class="capitalize mb_20"><strong>Hai Bisogno Di Aiuto?</strong></h5>
                        <div class="address">Scrivi un'email fornendoci tutti i dettagli e provvederemo ad aiutarti al meglio!</div>
                        <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:onlysecondhelp@gmail.com" target="_top">onlysecondhelp@gmail.com</a></div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 contact-form mb_50">
                    <!-- Contact FORM -->
                    <div id="contact_form">
                        <form id="contact_body" method="post" action="contact">

                            <input class="full-with-form " type="text" name="name" placeholder="Nome" data-required="true" />
                            <input class="full-with-form  mt_30" type="email" name="email" placeholder="Indirizzo Email" data-required="true" />
                            <input class="full-with-form  mt_30" type="text" name="phone1" placeholder="Numero Di Telefono" maxlength="15" data-required="true" />
                            <input class="full-with-form  mt_30" type="text" name="subject" placeholder="Oggetto" data-required="true">
                            <textarea class="full-with-form  mt_30" name="message" placeholder="Messaggio" data-required="true"></textarea>
                            <button class="btn mt_30" type="submit">Invia Il Messaggio</button>
                        </form>
                        <div id="contact_results"></div>
                    </div>
                    <!-- END Contact FORM -->
                </div>
            </div>
            <!-- map  -->
            <div class="row">
                <div class="col-xs-12 map mb_80">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =====  CONTAINER END  ===== -->

@endsection