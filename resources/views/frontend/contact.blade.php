@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container mt_30">
        <div class="row ">

            <div class="col-sm-12 col-lg-auto mtb_20">
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
                            <form action="{{route('ContactUS.AddPost')}}" method="post">
                                @csrf
                                <div>
                                    <input class="full-with-form " type="text" id="name" name="name" placeholder="Il Tuo Nome" data-required="true" />
                                    <input class="full-with-form  mt_30" type="email" id="email" name="email" placeholder="Il Tuo Indirizzo Email" data-required="true" />
                                    <input class="full-with-form  mt_30" type="text" id="phone" name="phone" placeholder="Numero Di Telefono" maxlength="15" data-required="true" />
                                    <input class="full-with-form  mt_30" type="text" id="subject" name="subject" placeholder="Oggetto" data-required="true">
                                    <textarea class="full-with-form  mt_30" id="message" name="message" placeholder="Messaggio" data-required="true"></textarea>
                                    <button type="submit" class="btn mt_30">Invia Il Messaggio</button>
                                </div>
                            </form>
                            @if (session('success'))
                                <div id="contact_results">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <!-- END Contact FORM -->
                    </div>
                </div>
                <!-- map  -->

                <div class="heading-part mb_20 mt_40">
                    <h2 class="main_title">Dove Trovarci? &nbsp;</h2>
                    <div class="sub_title" style="font-style: italic;">Via Vetoio, 67100 L'Aquila AQ </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 map mb_20">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =====  CONTAINER END  ===== -->

@endsection
