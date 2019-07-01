@extends('frontend.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container mt_30">
    <div class="row ">
       <!-- <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                <div class="nav-responsive">
                    <div class="heading-part">
                        pannello di sinistra lasciato così in modo da poter decidere insieme cosa metterci
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
        </div> -->
        <div class="col-sm-12 col-lg-auto mtb_20">
            <!-- about  -->
            <div class="row">
                <div class="col-md-12">
                    <figure> <img src="..\images\immabout.jpg" alt="#"> </figure>
                </div>
                <div class="col-md-12">
                    <div class="about-text">
                        <div class="about-heading-wrap">
                            <h2 class="about-heading mb_20 mt_40 ptb_10"> La Storia Della Nostra Azienda <span> Only Second </span></h2>
                        </div>
                        <p> OnlySecond è specializzato nella vendita online di orologi. Trovare consigli su un orologio, poter confrontare differenti orologi, ordinare subito, trovare un cinturino di ricambio per il tuo orologio: tutto è possibile su OnlySecond!
                            OnlySecond lo specialista degli orologi.</p>
                        <!-- bottone rimosso poichè secondo me inutile
                        <button type="button" class="btn mt_30">HIRE ME</button> -->
                    </div>
                </div>
            </div>
            <!-- =====  product ===== -->
            <div class="row">
                <div class="col-md-6">
                    <div class="heading-part mb_20 mt_40">
                        <h2 class="main_title">Perchè acquistare su OnlySecond?</h2>
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default pull-left">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lo specialista degli orologi</a> </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p> Grazie alle opportunità offerte dalla Rete Internet, siamo in grado di occuparci della vendita delle più conosciute marche di orologi. Siamo costantemente alla ricerca di nuove occasioni per sorprendervi.</div>
                            </div>
                        </div>
                        <div class="panel panel-default pull-left">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. Sicurezza innanzi tutto</a> </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>OS è membro di E-commerce Europe ed offre un metodo di acquisto affidabile e sicuro. Pagare il tuo ordine è facile coni nostri metodi di pagamento, come Carta di Credito e PayPal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default pull-left">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. Resi gratuiti</a> </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Restituisci gratuitamente il pacco a OnlySecond con il nostro Servizio Resi gratuito  alla tua sede locale per il ritiro. Non paghi nulla per il reso del tuo pacco!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="heading-part mb_20 mt_40 ">
                        <h2 class="main_title">Statistiche</h2>
                    </div>
                    <div id="p_line">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                            <span class="progress-type">Breil </span> <span class="progress-completed">60%</span> </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            <span class="progress-type">Tissot</span> <span class="progress-completed">40%</span> </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete (info)</span> </div>
                            <span class="progress-type">Casio</span> <span class="progress-completed">20%</span> </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                            <span class="progress-type">Wellington</span> <span class="progress-completed">60%</span> </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                            <span class="progress-type">Swatch</span> <span class="progress-completed">80%</span> </div>
                    </div>
                </div>
            </div>
            <!-- =====  end  ===== -->
            <!--Team Carousel -->
            <div class="heading-part mb_10">
                <h2 class="main_title mt_50">Il Nostro Team</h2>
            </div>
            <div class="team_grid box">
                <div class="team3col  owl-carousel">
                    <div class="item team-detail">
                        <div class="team-item-img"> <img src="..\images\tm1.jpg" alt="" /> </div>
                        <div class="team-designation mt_20">Sara</div>
                        <h4 class="team-title  mtb_10">Di Berardino </h4>
                        <p>Descrizione</p>
                        <ul class="social mt_20 mb_80">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="item team-detail">
                        <div class="team-item-img"> <img src="..\images\tm2.jpg" alt="" /> </div>
                        <div class="team-designation mt_20">Vincenzo</div>
                        <h4 class="team-title  mtb_10">Apostolo </h4>
                        <p>Descrizione</p>
                        <ul class="social mt_20 mb_80">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="item team-detail">
                        <div class="team-item-img"> <img src="..\images\tm3.jpg" alt="" /> </div>
                        <div class="team-designation mt_20">Valentina</div>
                        <h4 class="team-title  mtb_10">Rampa </h4>
                        <p>Descrizione</p>
                        <ul class="social mt_20 mb_80">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="item team-detail">
                        <div class="team-item-img"> <img src="images/tm4.jpg" alt="" /> </div>
                        <div class="team-designation mt_20">Colorati</div>
                        <h4 class="team-title  mtb_10">Swatch </h4>
                        <p>Descrizione</p>
                        <ul class="social mt_20 mb_80">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="item team-detail">
                        <div class="team-item-img"> <img src="images/tm5.jpg" alt="" /> </div>
                        <div class="team-designation mt_20">Sportivi</div>
                        <h4 class="team-title  mtb_10">Tissot</h4>
                        <p>Descrizione</p>
                        <ul class="social mt_20 mb_80">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="https://www.behance.net/" target="_blank"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--End Team Carousel -->
            </div>
        </div>
    </div>
</div>
<!-- =====  CONTAINER END  ===== -->
@endsection
