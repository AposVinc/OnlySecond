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
                                        <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive">
                                    </a>
                                </div>
                                <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                            </div>
                            <div id="wishlist" class="col-md-10 mt_10">
                                <div class="button-right">
                                    <a href="{{route('Cart.AddProduct', ['cod' => $product->cod])}}" type="button" class="btn btn-outline fa fa-shopping-cart" title="Aggiungi al carrello"></a>
                                    <a href="{{route('Wishlist.RemoveProduct',['cod'=>$product->cod])}}" type="button" class="btn btn-outline fa fa-trash" title="Elimina dalla wishlist"></a>
                                </div>
                                <div class="mt_10">
                                    <div class="product-price">
                                        <span>Prezzo:</span>
                                        <label>
                                            <del>{{$product->price}}€</del>
                                            {{$product->offer->calculateDiscount()}} €
                                        </label>
                                    </div>
                                    <div class="product-attr">
                                        <span>Genere:</span>
                                        <label>
                                            @if($product->genre == "U")
                                                Unisex
                                            @elseif($product->genre == "M")
                                                Uomo
                                            @else
                                                Donna
                                            @endif
                                        </label>
                                    </div>
                                    <div class="product-attr">
                                        <span>Categoria:</span>
                                        <label>
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
                                    </div>
                                    <div class="product-desc">
                                        <span>Descrizione:</span>
                                        <p>{{Str::limit($product->long_desc,410)}}</p>
                                    </div>
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
                                        <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div id="wishlist" class="col-md-10 mt_10">
                                <div class="button-right">
                                    <a href="{{route('Cart.AddProduct', ['cod' => $product->cod])}}" type="button" class="btn btn-outline fa fa-shopping-cart" title="Aggiungi al carrello"></a>
                                    <a href="{{route('Wishlist.RemoveProduct',['cod'=>$product->cod])}}" type="button" class="btn btn-outline fa fa-trash" title="Elimina dalla wishlist"></a>
                                </div>
                                <div>
                                    <div class="product-price">
                                        <span>Prezzo:</span>
                                        <label>{{$product->price}}€</label>
                                    </div>
                                    <div class="product-attr">
                                        <span>Genere:</span>
                                        <label>
                                            @if($product->genre == "U")
                                                Unisex
                                            @elseif($product->genre == "M")
                                                Uomo
                                            @else
                                                Donna
                                            @endif
                                        </label>
                                    </div>
                                    <div class="product-attr">
                                        <span>Categoria:</span>
                                        <label>
                                            @foreach ($product->categories as $category)
                                                @if ($loop->first)
                                                    {{$category->name}}
                                                    @continue
                                                @endif
                                                {{', '. $category->name}}
                                            @endforeach
                                        </label>
                                    </div>
                                    <div class="product-desc">
                                        <span>Descrizione:</span>
                                        <p>{{Str::limit($product->long_desc,550)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @endif
        </div>
    </div>
@endsection
