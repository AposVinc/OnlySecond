@extends ('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">

        @component('frontend.partials.breadcrumbshome')
            In Sconto %
        @endcomponent
<!--
            <div class="col-md-12">
                <div class="about-text">
                    <div class="about-heading-wrap">
                        <h2 class="about-heading mb_20 mt_10"> Sconti estivi %</h2>
                    </div>
                    <p> Acquista i migliori orologi con i nostri grandi sconti! Offriamo sconti fino al 70%. Dai un'occhiata a tutti i nostri orologi di vendita per target, categoria, migliori marchi e molto altro! Quale orologio scegli?</p>
                </div>
            </div>
-->
            @include('frontend.partials.filter')

            <div class="col-sm-8 col-lg-9 mtb_20">
                <div class="category-page-wrapper mb_30">
                    <div class="list-grid-wrapper pull-left">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                        </div>
                    </div>
                    <div class="page-wrapper pull-right">
                        <label class="control-label" for="input-limit">Ordina per :</label>
                        <div class="limit">
                            <select id="input-limit" class="form-control">
                                <option value="Default" selected="selected">Default</option>
                                <option value="nuovi">I Più Nuovi</option>
                                <option value="menocari">I Meno Cari</option>
                                <option value="piùcari">I Più Cari</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>

                <div class="row">

                    @foreach($offers as $offert)
                        <div class="product-layout product-grid col-md-4 col-xs-6 ">
                            <div class="item">
                                <div class="product-thumb clearfix mb_30">
                                    <div class="image product-imageblock">
                                        <a href="{{route('Product', ['cod' => $offert->product->cod])}}">
                                            <!-- aggiungere materiale e qualche altra informazione -->
                                            <img data-name="product_image" src="{{asset($offert->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive" />
                                            <img src="{{asset($offert->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive" />
                                        </a>
                                        <div class="button-group text-center">
                                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
                                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">{{$offert->product->collection->brand->name}} {{$offert->product->collection->name}}<br>{{$offert->product->cod}}, {{$offert->product->color->name}}</a></h6>
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <span class="price"><span class="amount"><span class="currencySymbol">€</span>{{$offert->product->price}}</span></span>
                                        <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="pagination-nav text-center mt_50">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        @include('frontend.partials.sliderbrands')

    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
