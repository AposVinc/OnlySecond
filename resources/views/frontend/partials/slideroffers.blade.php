<!-- =====  PRODUCT TAB  ===== -->
<div class="row">
    <div class="col-sm-12 mtb_10">
        <div class="mt_60">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Deals of the Week</h2>
            </div>
            <div class="latest_pro box">
                <div class="latest owl-carousel">

                    @foreach($offers as $offer)
                    <div class="product-grid">
                        <div class="item">
                            <div class="product-thumb">
                                <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $offer->product->cod])}}"> <img data-name="product_image" src="{{asset($offer->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="{{asset($offer->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                                    <div class="button-group text-center">
                                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                    </div>
                                </div>
                                <div class="caption product-detail text-center">
                                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                    <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{$offer->product->collection->brand->name}} {{$offer->product->collection->name}}, {{$offer->product->color->name}}</a></h6>
                                    <span class="price"><span class="amount"><span class="currencySymbol">€</span>{{$offer->calculateDiscount()}}</span>
                        </span>
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
