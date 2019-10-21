@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                WishList
            @endcomponent

            @if(auth()->User()->productsWishlist->isEmpty())

            @else
                @foreach(auth()->User()->productsWishlist as $product)
                    @if($product->offer()->exists())
                        <div class="col-lg-12 mb_40">
                            <div class="heading-part mt_0 mb_10">
                                <label class="sub_title"><span>Prodotto:</span></label>
                                <div class="product-info">{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</div>
                            </div>
                            <div class="mt_10 col-md-2">
                                <div class="image product-imageblock">
                                    <a href="{{route('Product', ['cod' => $product->cod])}}">
                                        <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                                    </a>
                                </div>
                                <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>

                            </div>
                            <div id="wishlist" class="col-md-10 mt_10">
                                <div>
                                    <div style="position: absolute; top: 0; right: 10px;">
                                        <a href="" type="button" class="btn btn-outline fa fa-shopping-cart" ></a>
                                        <a href="{{route('Wishlist.RemoveProduct',['cod'=>$product->cod])}}" type="button" class="btn btn-outline fa fa-trash"></a>
                                    </div>
                                </div>
                                <div class="mt_10">
                                    <label class="product-price"><span>Prezzo:</span><del>{{$product->price}}€</del>{{$product->offer->calculateDiscount()}} €</label>
                                    <label class="product-attr"><span>Genere:</span>{{$product->genre}}</label>
                                    <label class="product-attr"><span>Categoria:</span>
                                        @php
                                            $stringa = "";
                                            foreach($product->categories as $category){
                                                if($stringa==""){
                                                    $stringa = $stringa. $category->name;
                                                }else{
                                                    $stringa = $stringa. ", ". $category->name;
                                                }
                                            }
                                            echo $stringa;
                                        @endphp
                                    </label>
                                    <p class="product-desc">{{Str::limit($product->long_desc,410)}}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 mb_40">
                            <div class="heading-part mt_0 mb_10">
                                <label class="sub_title"><span>Prodotto:</span></label>
                                <div class="product-info">{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</div>
                            </div>
                            <div class="mt_10 col-md-2">
                                <div class="image product-imageblock">
                                    <a href="{{route('Product', ['cod' => $product->cod])}}">
                                        <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div id="wishlist" class="col-md-10 mt_10">
                                <div>
                                    <div style="position: absolute; top: 0; right: 10px;">
                                        <a href="" type="button" class="btn btn-outline fa fa-shopping-cart" ></a>
                                        <a href="{{route('Wishlist.RemoveProduct',['cod'=>$product->cod])}}" type="button" class="btn btn-outline fa fa-trash"></a>
                                    </div>
                                </div>
                                <div>
                                    <label class="product-price"><span>Prezzo:</span>{{$product->price}} €</label>
                                    <label class="product-attr"><span>Genere:</span>{{$product->genre}}</label>
                                    <label class="product-attr"><span>Categoria:</span>
                                        @php
                                            $stringa = "";
                                            foreach($product->categories as $category){
                                                if($stringa==""){
                                                    $stringa = $stringa. $category->name;
                                                }else{
                                                    $stringa = $stringa. ", ". $category->name;
                                                }
                                            }
                                            echo $stringa;
                                        @endphp
                                    </label>
                                    <p class="product-desc"><span>Descrizione:</span>{{Str::limit($product->long_desc,550)}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @endif
        </div>
    </div>
@endsection
