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

            <div class="col-lg-12 mtb_20">
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
                                <option value="8" selected="selected">08</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
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
<!--
            <div class="col-lg-12 mtb_20">
                <div class="category-page-wrapper mb_30">
                    <label>Orologio ottimo!</label>
                    <div class="about-text">
                        <p> .........................................................................................................................


                            ......</p>
                    </div>

                </div>
            </div>
-->
            <div aria-expanded="false" class="a-expander-content a-expander-partial-collapse-content" style="padding-bottom: 19px;"><div class="a-row a-ws-row"><h4 class="a-size-medium view-point-title">La recensione più critica</h4></div><div class="a-row a-spacing-mini"><span class="a-declarative" data-action="reviews:filter-action:push-state" data-reviews:filter-action:push-state="{&quot;allowLinkDefault&quot;:&quot;1&quot;}"><a data-reftag="cm_cr_arp_d_viewpnt_rgt" data-reviews-state-param="{&quot;filterByStar&quot;:&quot;critical&quot;,&quot;pageNumber&quot;:&quot;1&quot;}" class="a-size-base a-link-normal see-all" href="/Progettare-costruire-Contenuto-digitale-download/product-reviews/8850334044/ref=cm_cr_arp_d_viewpnt_rgt?ie=UTF8&amp;filterByStar=critical">Visualizza tutte le 10 recensioni critiche</a><span class="a-letter-space"></span><span class="a-size-base back-carat a-text-bold">› </span></span></div><div data-hook="genome-widget" class="a-row a-spacing-mini"><a href="/gp/profile/amzn1.account.AG5ENV4HXSMSLIAG25EDTAAJR2UQ/ref=cm_cr_arp_d_gw_rgt?ie=UTF8" class="a-profile" data-a-size="small"><div aria-hidden="true" class="a-profile-avatar-wrapper"><div class="a-profile-avatar"><img src="https://images-eu.ssl-images-amazon.com/images/S/amazon-avatars-global/default._CR0,0,1024,1024_SX48_.png" class="" data-src="https://images-eu.ssl-images-amazon.com/images/S/amazon-avatars-global/default._CR0,0,1024,1024_SX48_.png"><noscript><img src="https://images-eu.ssl-images-amazon.com/images/S/amazon-avatars-global/default._CR0,0,1024,1024_SX48_.png"/></noscript></div></div><div class="a-profile-content"><span class="a-profile-name">Riccardo Sangiorgio</span></div></a></div><div class="a-row"><i data-hook="review-star-rating-view-point" class="a-icon a-icon-star a-star-3 review-rating"><span class="a-icon-alt">3,0 su 5 stelle</span></i><span class="a-letter-space"></span><span data-hook="review-title" class="a-size-base review-title a-text-bold">Bel libro, ma poco pratico.</span></div><div class="a-row"><span class="a-size-base a-color-secondary review-date">22 ottobre 2017</span></div><div class="a-row a-spacing-top-mini"><span class="a-size-base">Il libro è ben strutturato. Grafica molto studiata e accattivante. Il problema: la traduzione in italiano non è il massimo, le immagini fanno riferimento a versioni dei vari OS relativamente vecchi ma soprattutto si dilunga troppo su diversi argomenti, quasi come se volesse riempire la pagina.<br>Inoltre non va a trattare argomenti molto importanti che riguardando ambedue i linguaggi come le CSS-grid ad esempio. Affronta tecnologie come Flash ecc. che sono ormai dati e non più necessari. Sarebbe un grande libro se venisse rivisitato dall'autore aggiornandolo con le tendenze e le tecnologie del 2017. Spedizione Amazon sempre perfetta.</span></div></div>
        </div>
    </div>
@endsection
