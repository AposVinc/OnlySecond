@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Profilo</h1>
                    <ul>
                        <li class="active">Il Mio Profilo</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 mt_20">
                <a href="{{route('Chronology')}}">
                <div class="content">
                    <h2 class="header text-center">I Miei Ordini</h2>
                    <div class="small">
                        <div class="content">
                           <div class="summary text-center mt_10">
                              <h5> In questa sezione vedrai tutti gli ordini effettuati con i dettagli per ogni prodotto </h5>
                           </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-4 mt_20">
                <a href="{{route('EditProfile')}}">
                    <div class="content">
                        <h2 class="header text-center">Modifica Del Profilo</h2>
                        <div class="small">
                            <div class="content">
                                <div class="summary text-center mt_10">
                                    <h5>In questa sezione puoi modificare nome, cognome, numero di cellulare e password</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mt_20">
                <a href="{{route('Favorite.List')}}">
                    <div class="content">
                        <h2 class="header text-center">WishList</h2>
                        <div class="small">
                            <div class="content">
                                <div class="summary text-center mt_10">
                                    <h5>Entra qui per vedere la lista di orologi che desideri acquistare</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-4 mtb_40">
                <a href="{{route('Payment')}}">
                    <div class="content">
                        <h2 class="header text-center">Pagamento</h2>
                        <div class="small">
                            <div class="content">
                                <div class="summary text-center mt_10">
                                    <h5>In questa sezione puoi scegliere la modalità di pagamento che preferisci.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mtb_40">
                <a href="{{route('Address')}}">
                    <div class="content">
                        <h2 class="header text-center">Indirizzi</h2>
                        <div class="small">
                            <div class="content">
                                <div class="summary text-center mt_10">
                                    <h5>In questa sezione puoi inserire l'indirizzo di spedizione che preferisci</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mtb_40">
                <a href="{{route('Review')}}">
                    <div class="content">
                        <h2 class="header text-center">Le Mie Recensioni</h2>
                        <div class="small">
                            <div class="content">
                                <div class="summary text-center mt_10">
                                    <h5>Entra qui per rileggere tutte le recensioni che hai pubblicato riguardanti gli orologi acquistati</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

@endsection