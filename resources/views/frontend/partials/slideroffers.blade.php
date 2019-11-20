@if($offers->isEmpty())

@else
    <!-- =====  PRODUCT TAB  ===== -->
    <div class="row">
        <div class="col-sm-12 mtb_10">
            <div class="mt_60">
                <div class="heading-part mb_10 ">
                    <h2 class="main_title">Offerte Della Settimana</h2>
                </div>
                <div class="latest_pro box">
                    <div class="latest owl-carousel">

                        @foreach($offers as $offer)
                            <div class="product-grid">
                                <div class="item">
                                    <div class="product-thumb">
                                        <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $offer->product->cod])}}"> <img data-name="product_image" src="{{asset($offer->product->images->where('main',1)->first()->path_image)}}" alt="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" title="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} -{{$offer->product->cod}}" class="img-responsive"> <img src="{{asset($offer->product->images->where('main',1)->first()->path_image)}}" alt="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" title="{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}} - {{$offer->product->cod}}" class="img-responsive"> </a>
                                            <div class="button-group text-center">
                                                <a href="{{route('Wishlist.AddProduct', ['cod' => $offer->product->cod])}}"  class="wishlist"><span>wishlist</span></a>
                                                <a href="{{route('Cart.AddProduct', ['cod' => $offer->product->cod])}}" class="add-to-cart"><span>Add to cart</span></a>
                                            </div>
                                            <div class="ribbon orangeOS"><span>{{$offer->rate}}%</span></div>
                                        </div>
                                        <div class="caption product-detail text-center">
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
                                            <h6 data-name="product_name" class="product-name"><a href="{{route('Product', ['cod' => $offer->product->cod])}}">{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}}<br>{{$offer->product->cod}}, {{$offer->product->color->name}}</a></h6>
                                            <span class="oldPrice"><span class="amount">{{$offer->product->price}}<span class="currencySymbol">€</span></span></span>
                                            <span class="price"><span class="amount">{{$offer->calculateDiscount()}}<span class="currencySymbol">€</span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
