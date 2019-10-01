<!-- =====  PRODUCT TAB  ===== -->

<div class="row ">
    <div class="col-sm-12 mt_30">

        <div id="product-tab" class="mt_10">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Featured Products</h2>
            </div>
            <ul class="nav text-right">
                <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
                <li><a href="#Bestsellers" data-toggle="tab">Bestsellers</a> </li>
            </ul>
            <div class="tab-content clearfix box">

                <div class="tab-pane active" id="nArrivals">
                    <div class="nArrivals owl-carousel">
                        @foreach($newarrivals as $product)
                        <div class="product-grid">
                            <div class="item">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $product->cod])}}"> <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                                        <div class="button-group text-center">
                                            <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}"  class="wishlist"><span>wishlist</span></a>
                                            <a href="#" class="quickview"><span>Quick View</span></a>
                                            <a href="#" class="compare"><span>Compare</span></a>
                                            <a href="#" class="add-to-cart"><span>Add to cart</span></a>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                        <span class="price"><span class="amount"><span class="currencySymbol">€</span>{{$product->price}}</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane" id="Bestsellers">
                    <div class="Bestsellers owl-carousel">
                        @foreach($bestsellers as $product)
                        <div class="product-grid">
                            <div class="item">
                                <div class="product-thumb  mb_30">
                                    <div class="image product-imageblock"> <a href="{{route('Product', ['cod' => $product->cod])}}"> <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                                        <div class="button-group text-center">
                                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{$product->collection->brand->name}} {{$product->collection->name}}<br>{{$product->cod}}, {{$product->color->name}}</a></h6>
                                        <span class="price"><span class="amount"><span class="currencySymbol">€</span>{{$product->price}}</span></span>
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

</div>

<!-- =====  PRODUCT TAB  END ===== -->
