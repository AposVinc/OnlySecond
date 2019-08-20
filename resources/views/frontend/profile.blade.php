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

            <div class="card col-sm-4 col-lg-4 mtb_20">
                <a href="{{route('Chronology')}}">
                <div class="content">
                    <h1 class="header">I Miei Ordini</h1>
                    <div class="small feed">
                        <div class="content">
                           <div class="summary">
                              <li> Cronologia di tutti gli ordini effettuati</li>
                              <li> Cronologia di tutti gli ordini effettuati</li>
                              <li> Cronologia di tutti gli ordini effettuati</li>
                           </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="card2 col-sm-4 col-lg-5 mtb_20">
                <a href="{{route('EditProfile')}}">
                    <div class="content">
                        <h1 class="header">Modifica Del Profilo</h1>
                        <div class="small feed">
                            <div class="content">
                                <div class="summary">
                                    <li> Modifica Nome, Cognome e il Numero di Cellulare</li>
                                    <li> Modifica Nome, Cognome e il Numero di Cellulare</li>
                                    <li> Modifica Nome, Cognome e il Numero di Cellulare</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="card3 col-sm-4 col-lg-2 mtb_20">
                <a href="{{route('Favorite')}}">
                    <div class="content">
                        <h1 class="header">WishList</h1>
                        <div class="small feed">
                            <div class="content">
                                <div class="summary">
                                    <li>I Tuoi Prodotti Preferiti</li>
                                    <li>I Tuoi Prodotti Preferiti</li>
                                    <li>I Tuoi Prodotti Preferiti</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="card4 col-sm-4 col-lg-4 mtb_20">
                <a href="{{route('Profile')}}">
                    <div class="content">
                        <h1 class="header">Pagamento</h1>
                        <div class="small feed">
                            <div class="content">
                                <div class="summary">
                                    <li>Modifica e Aggiungi i Tuoi Metodi Di Pagamento</li>
                                    <li>Modifica e Aggiungi i Tuoi Metodi Di Pagamento</li>
                                    <li>Modifica e Aggiungi i Tuoi Metodi Di Pagamento</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection