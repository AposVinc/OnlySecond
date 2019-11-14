<!-- =====  PRODUCT TAB  ===== -->

<div class="row ">
    <div class="col-sm-12 mt_30">

        <div id="product-tab" class="mt_10">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Prodotti Sponsorizzati</h2>
            </div>
            <ul class="nav text-right">
                <li class="active"> <a href="#nArrivals" data-toggle="tab">Nuovi Arrivi</a> </li>
                <li><a href="#Bestsellers" data-toggle="tab">Più Venduti</a> </li>
            </ul>
            <div class="tab-content clearfix box">

                <div class="tab-pane active" id="nArrivals">
                    <div class="nArrivals owl-carousel">
                        @foreach($newarrivals as $product)
                            @if($product->offer()->exists())
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb">
                                            <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $product->cod])}}"> <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> </a>
                                                <div class="button-group text-center">
                                                    <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}"  class="wishlist"><span>wishlist</span></a>
                                                    <a href="#" class="add-to-cart"><span>Add to cart</span></a>
                                                </div>
                                                <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                                            </div>
                                            <div class="caption product-detail text-center">
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
                                                <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                                <span class="oldPrice"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                                <span class="price"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb">
                                            <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $product->cod])}}"> <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> </a>
                                                <div class="button-group text-center">
                                                    <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}"  class="wishlist"><span>wishlist</span></a>
                                                    <a href="#" class="add-to-cart"><span>Add to cart</span></a>
                                                </div>
                                            </div>
                                            <div class="caption product-detail text-center">
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
                                                <h6 data-name="product_name" class="product-name"><a href="{{route('Product', ['cod' => $product->cod])}}">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                                <span class="price"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane" id="Bestsellers">
                    <div class="Bestsellers owl-carousel">
                        @foreach($bestsellers as $product)
                            @if($product->offer()->exists())
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb  mb_30">
                                            <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $product->cod])}}"> <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> </a>
                                                <div class="button-group text-center">
                                                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                                    <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                                </div>
                                                <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                                            </div>
                                            <div class="caption product-detail text-center">
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
                                                <h6 data-name="product_name" class="product-name"><a href="{{route('Product', ['cod' => $product->cod])}}">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                                <span class="oldPrice"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                                <span class="price"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="product-grid">
                                    <div class="item">
                                        <div class="product-thumb  mb_30">
                                            <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $product->cod])}}"> <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive"> </a>
                                                <div class="button-group text-center">
                                                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                                    <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                                </div>
                                            </div>
                                            <div class="caption product-detail text-center">
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
                                                <h6 data-name="product_name" class="product-name"><a href="{{route('Product', ['cod' => $product->cod])}}">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                                <span class="price"><span class="amount">{{$product->price}}<span class="currencySymbol">€</span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- =====  PRODUCT TAB  END ===== -->
