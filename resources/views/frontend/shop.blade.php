@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">

            @component('frontend.partials.breadcrumbshome')
                Prodotti
            @endcomponent

            @include('frontend.partials.filter')

            <div class="col-sm-8 col-lg-9 mtb_20">
                <div class="category-page-wrapper mb_30">
                    <div class="list-grid-wrapper pull-left">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                        </div>
                    </div>
                    <div class="sort-wrapper pull-right">
                        <label class="control-label" for="input-sort">Ordina Per :</label>
                        <div class="sort-inner">
                            <select id="input-sort" class="form-control">
                                <option value="name_ASC" selected="selected">Nome (A - Z)</option>
                                <option value="name_DESC">Nome (Z - A)</option>
                                <option value="price_ASC">Prezzo (Cres)</option>
                                <option value="price_DESC">Prezzo (Decres)</option>
                                <option value="vote_DESC">Votazione (Cres)</option>
                                <option value="vote_ASC">Votazione (Decres)</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>

                <div id="listProducts" class="row">
                    @foreach($products as $product)
                        @if($product->offer()->exists())
                            <div class="product-layout product-grid col-md-4 col-xs-6">
                                <div class="item">
                                    <div class="product-thumb clearfix mb_50">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <!-- aggiungere materiale e qualche altra informazione -->
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" />
                                                <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" />
                                            </a>
                                            <div class="button-group text-center">
                                                <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}" class="wishlist" title="Aggiungi a wishlist"><span>Wishlist</span></a>
                                                <a href="{{route('Cart.AddProduct', ['cod' => $product->cod])}}" class="add-to-cart" title="Aggiungi al carrello"><span>Add to cart</span></a>
                                            </div>
                                            <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                                        </div>
                                        <div class="caption product-detail text-center">
                                            <h6 data-name="product_name" class="product-name mt_20"><a href="{{route('Product',['cod' => $product->cod])}}">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                            <div class="rating">
                                                @for ($i = 1; $i < 6; $i++)
                                                    @if($i <= $product->CalculateAverageVote())
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    @else
                                                        @if(is_float($product->CalculateAverageVote()) and ($i==ceil($product->CalculateAverageVote())) )
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star-half fa-stack-1x"></i></span>
                                                        @else
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @endif
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="oldPrice"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                            <span class="price"><span class="amount">{{$product->offer->calculateDiscount()}}<span class="currencySymbol">€</span></span></span>
                                            <p class="product-desc mt_20">{{Str::limit($product->long_desc,400)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="product-layout product-grid col-md-4 col-xs-6">
                                <div class="item">
                                    <div class="product-thumb clearfix mb_50">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <!-- aggiungere materiale e qualche altra informazione -->
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" />
                                                <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" />
                                            </a>
                                            <div class="button-group text-center">
                                                <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}" class="wishlist" title="Aggiungi a wishlist"><span>Wishlist</span></a>
                                                <a href="{{route('Cart.AddProduct', ['cod' => $product->cod])}}" class="add-to-cart" title="Aggiungi al carrello"><span>Add to cart</span></a>
                                            </div>
                                        </div>
                                        <div class="caption product-detail text-center">
                                            <h6 data-name="product_name" class="product-name mt_20"><a href="{{route('Product',['cod' => $product->cod])}}">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                            <div class="rating">
                                                @for ($i = 1; $i < 6; $i++)
                                                    @if($i <= $product->CalculateAverageVote())
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    @else
                                                        @if(is_float($product->CalculateAverageVote()) and ($i==ceil($product->CalculateAverageVote())) )
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star-half fa-stack-1x"></i></span>
                                                        @else
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                        @endif
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="price"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                            <p class="product-desc mt_20">{{Str::limit($product->long_desc,400)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                <div class="pagination-nav text-center mt_50">
                    {{$products->links()}}
                </div>

            </div>
        </div>

        @include('frontend.partials.sliderbrands')

    </div>
    <!-- =====  CONTAINER END  ===== -->

@endsection
