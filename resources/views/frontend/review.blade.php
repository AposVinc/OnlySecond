@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Le Mie Recensioni</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">Recensioni</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 mt_20">
                <div class="category-page-wrapper mb_30">
                    <div class="list-grid-wrapper pull-right">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                        </div>
                    </div>
                    <div class="page-wrapper pull-right">
                        <label class="control-label" for="input-limit">Mostra :</label>
                        <div class="limit">
                            <select id="input-limit" class="form-control">
                                <option value="ASC" selected="selected">Tutte</option>
                                <option value="ASC">Recenti</option>
                                <option value="DESC">Meno Recenti</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                    <div class="sort-wrapper pull-right">
                        <label class="control-label" for="input-sort">Brand :</label>
                        <div class="sort-inner">
                            <select id="input-sort" class="form-control">
                                <option value="ASC" selected="selected">Tutti</option>
                                <option value="ASC">Breil</option>
                                <option value="DESC">Tissot</option>
                                <option value="ASC">Wellington</option>
                                <option value="DESC">Fossil</option>
                                <option value="DESC">Lacoste</option>
                                <option value="ASC">Ice Watch</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt_10">
                <h4>Consiglio applicare pellicola antigraffio su quadro</h4>
                <h6><div class="mt_10">21 ottobre 2017</div></h6>
                <div class="mt_10">
                    <h5><a href="product.html" class="fa fa-image">
                        Breil, cat, coll, cod</a>
                    </h5>
                </div>
            </div>

            <div class="col-lg-12 mt_10">
                    <span>Ho aspettato un po' prima di recensire questo orologio della casio, devo dire che è perfetto per ogni tipo di outfit.<br>Inoltre il quadro nero gli dà un aspetto elegante all'orologio.
                        Durante il giorno il quadro di vede bene, la notte pure grazie alla retroilluminazione.<br>Buono presenti tutte le funzioni, sveglia, cronometro, timer, ecc..È arrivato con la garanzia Casio di 24 mesi.
                        <br>Un ottimo acquisto, consiglio di acquistare una qualche pellicola che protegga il vetro del quadro da graffi, perché per il vetro non risulta essere molto antigraffio. Per questo do 4 stelle</span>
            </div>


            <div class="col-lg-12 mt_40">
                <h4>Titolo Recensione</h4>
                <h6><div class="mt_10">Data</div></h6>
                <div class="mt_10">
                    <h5><a href="product.html" class="fa fa-image">
                            Breil, cat, coll, cod</a>
                    </h5>
                </div>
            </div>

            <div class="col-lg-12 mt_10">
                <span>....................................................<br>.....................................................</span>
            </div>

            <div class="col-lg-12 mt_40">
                <h4>Titolo Recensione</h4>
                <h6><div class="mt_10">Data</div></h6>
                <div class="mt_10">
                    <h5><a href="product.html" class="fa fa-image">
                            Breil, cat, coll, cod</a>
                    </h5>
                </div>
            </div>

            <div class="col-lg-12 mtb_10">
                <span>....................................................<br>.....................................................</span>
            </div>
        </div>
    </div>
@endsection
