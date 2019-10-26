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

                    @foreach($offers as $offer)
                        <div class="product-layout product-grid col-md-4 col-xs-6 ">
                            <div class="item">
                                <div class="product-thumb clearfix mb_50">
                                    <div class="image product-imageblock">
                                        <a href="{{route('Product', ['cod' => $offer->product->cod])}}">
                                            <img data-name="product_image" src="{{asset($offer->product->images->where('main',1)->first()->path_image)}}" alt="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" title="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" class="img-responsive" />
                                            <img src="{{asset($offer->product->images->where('main',1)->first()->path_image)}}" alt="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" title="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" class="img-responsive" />
                                        </a>
                                        <div class="button-group text-center">
                                            <a href="{{route('Wishlist.AddProduct', ['cod' => $offer->product->cod])}}" class="wishlist" title="Aggiungi a wishlist"><span>Wishlist</span></a>
                                            <a href="#" class="add-to-cart" title="Aggiungi al carrello"><span>Add to cart</span></a>
                                        </div>
                                        <div class="ribbon orangeOS"><span>{{$offer->rate}}%</span></div>
                                    </div>
                                    <div class="caption product-detail text-center">
                                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}}<br>{{$offer->product->cod}}, {{$offer->product->color->name}}</a></h6>
                                        <div class="rating">
                                            @for ($i = 1; $i < 6; $i++)
                                                @if($i <= $offer->product->CalculateAverageVote())
                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                @else
                                                    @if(is_float($offer->product->CalculateAverageVote()) and ($i==ceil($offer->product->CalculateAverageVote())) )
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star-half fa-stack-1x"></i></span>
                                                    @else
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                    @endif
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="oldPrice"><span class="amount"><span class="currencySymbol">€</span>{{$offer->product->price}}</span></span>
                                        <span class="price"><span class="amount"><span class="currencySymbol">€</span>{{$offer->calculateDiscount()}}</span></span>
                                        <p class="product-desc mt_20">{{Str::limit($offer->product->long_desc,400)}}</p>
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
