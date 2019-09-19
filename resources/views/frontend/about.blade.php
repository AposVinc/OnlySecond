@extends('frontend.layout')

@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container mt_30">
    <div class="row ">
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
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="heading-part mb_20 mt_40">
                    <h2 class="main_title">Perchè acquistare su OnlySecond?</h2>
                </div>

                <div class="panel-group col-lg-10 col-sm-offset-1" id="accordion">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lo specialista degli orologi</a> </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p> Grazie alle opportunità offerte dalla Rete Internet, siamo in grado di occuparci della vendita delle più conosciute marche di orologi. Siamo costantemente alla ricerca di nuove occasioni per sorprendervi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. Sicurezza</a> </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>OS è membro di E-commerce Europe ed offre un metodo di acquisto affidabile e sicuro. Pagare il tuo ordine è facile coni nostri metodi di pagamento, come Carta di Credito e PayPal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. Resi gratuiti</a> </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Restituisci gratuitamente il pacco a OnlySecond con il nostro Servizio Resi gratuito  alla tua sede locale per il ritiro. Non paghi nulla per il reso del tuo pacco!</p>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">4. Garanzia restituzione del denaro!</a> </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                   <p>Con HWG hai 30 giorni di tempo per cambiare idea. Non sei completamente soddisfatto del tuo acquisto? Restituisci il prodotto e riceverai indietro l'importo dell'acquisto una volta che il pacco sarà arrivato alla nostra sede.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">5. Spedizione gratuita</a> </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Hai fatto la tua scelta nella nostra grande gamma? Qualsiasi ordine sopra i € 150 sarà spedito gratuitamente. Cosa aspetti?</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">6. Un anno di garanzia HWG extra!</a> </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Oltre garanzia internazionale della durata due anni obbligatoria per legge, avrai un altro anno di garanzia!</p>
                                </div>
                            </div>
                        </div>

                </div>

             </div>

            <div class="row">
                <div class="heading-part mb_20 mt_40">
                    <h2 class="main_title">Perchè acquistare su OnlySecond?</h2>
                </div>
                <div class="col-md-6">
                    <div class="panel-group" id="accordion2">
                            <div class="panel panel-default pull-left">
                                <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne1">1. Lo specialista degli orologi</a> </h4>
                        </div>
                                <div id="collapseOne1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p> Grazie alle opportunità offerte dalla Rete Internet, siamo in grado di occuparci della vendita delle più conosciute marche di orologi. Siamo costantemente alla ricerca di nuove occasioni per sorprendervi.</p>
                            </div>
                        </div>
                            </div>
                        <div class="panel panel-default pull-left">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo1">2. Sicurezza</a> </h4>
                        </div>
                        <div id="collapseTwo1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>OS è membro di E-commerce Europe ed offre un metodo di acquisto affidabile e sicuro. Pagare il tuo ordine è facile coni nostri metodi di pagamento, come Carta di Credito e PayPal.</p>
                            </div>
                        </div>
                    </div>
                        <div class="panel panel-default pull-left">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree1">3. Resi gratuiti</a> </h4>
                        </div>
                        <div id="collapseThree1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Restituisci gratuitamente il pacco a OnlySecond con il nostro Servizio Resi gratuito  alla tua sede locale per il ritiro. Non paghi nulla per il reso del tuo pacco!</p>
                            </div>
                        </div>
                     </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel-group" id="accordion3">

                        <div class="panel panel-default pull-left">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion3" href="#collapseFour2">4. Garanzia restituzione del denaro!</a> </h4>
                            </div>
                            <div id="collapseFour2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Con HWG hai 30 giorni di tempo per cambiare idea. Non sei completamente soddisfatto del tuo acquisto? Restituisci il prodotto e riceverai indietro l'importo dell'acquisto una volta che il pacco sarà arrivato alla nostra sede.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default pull-left">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion3" href="#collapseFive2">5. Spedizione gratuita</a> </h4>
                            </div>
                            <div id="collapseFive2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Hai fatto la tua scelta nella nostra grande gamma? Qualsiasi ordine sopra i € 150 sarà spedito gratuitamente. Cosa aspetti?</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default pull-left">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion3" href="#collapseSix2">6. Un anno di garanzia HWG extra!</a> </h4>
                            </div>
                            <div id="collapseSix2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Oltre garanzia internazionale della durata due anni obbligatoria per legge, avrai un altro anno di garanzia!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


                <div class="heading-part mb_10">
                     <h2 class="main_title mt_50">Il Nostro Team</h2>
                </div>

                <div class="team_grid box">
                <div class="team3col owl-carousel">
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
                </div>

            </div>
        </div>
        </div>
    </div>
<!-- =====  CONTAINER END  ===== -->
@endsection
