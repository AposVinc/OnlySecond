@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Profilo</h1>
                    <ul>
                        <li><a href="index.html">Il Mio Profilo</a></li>
                        <li class="active">Profilo</li>
                    </ul>
                </div>
            </div>
            <div class="ya-card-row">

                <div class="ya-card-cell">
                    <a href="{{route('Chronology')}}" class="ya-card__whole-card-link">
                    <div data-card-identifier="yourorders" class="a-box ya-card--rich"><div class="a-box-inner">
                        <div class="a-row">
                            <div class="a-column a-span3">
                                <img src="#">
                            </div>
                            <div class="a-column a-span9 a-span-last">
                                <h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
                                    I Miei Ordini
                                </h2>
                                <div><span class="a-color-secondary">Cronologia di tutti gli ordini effettuati</span></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    </a>
                </div>


                <div class="ya-card-cell">

                    <a href="{{route('EditProfile')}}" class="ya-card__whole-card-link">
                        <div data-card-identifier="edit" class="a-box ya-card--rich"><div class="a-box-inner">
                                <div class="a-row">
                                    <div class="a-column a-span3">
                                        <img src="#">
                                    </div>
                                    <div class="a-column a-span9 a-span-last">
                                        <h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
                                            Impostazioni Del Profilo
                                        </h2>
                                        <div><span class="a-color-secondary">Modifica Nome, Cognome e il Numero di Cellulare</span></div>

                                    </div>
                                </div>
                            </div></div>
                    </a>
                 </div>

                <div class="ya-card-cell">

                    <a href="{{route('Favorite')}}" class="ya-card__whole-card-link">
                        <div data-card-identifier="edit" class="a-box ya-card--rich"><div class="a-box-inner">
                                <div class="a-row">
                                    <div class="a-column a-span3">
                                        <img src="#">
                                    </div>
                                    <div class="a-column a-span9 a-span-last">
                                        <h2 class="a-spacing-none ya-card__heading--rich a-text-normal">
                                            WishList
                                        </h2>
                                        <div><span class="a-color-secondary">I Tuoi Prodotti Preferiti</span></div>

                                    </div>
                                </div>
                            </div></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection