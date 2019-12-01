@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbshome')
                Carrello
            @endcomponent

            <div class="col-sm-12 mtb_20">
                @auth()
                    @if(auth()->User()->products->isEmpty())
                        <div class="col-md-12">
                            <label style="font-size: 20px;">
                                Il tuo carrello è vuoto.
                            </label>
                            <br>
                            <span>
                                Per aggiungere articoli al tuo carrello, quando trovi un articolo che ti interessa, clicca su "Aggiungi al carrello"
                                o sull'icona " <i class="fa fa-shopping-cart"></i> "
                            </span>
                        </div>
                    @else
                        @foreach(auth()->User()->products as $product)
                            <div class="heading-part mb_10"></div>
                            <div class="mb_10 col-md-12">
                                @if($product->offer()->exists())
                                    <div class="pl_0 col-md-2">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="175" width="175">
                                            </a>
                                        </div>
                                        <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                                    </div>
                                @else
                                    <div class="pl_0 col-md-2">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="175" width="175">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="cartProd mt_10 col-md-5">
                                    <div class="product-name">
                                        <span>Prodotto:</span>
                                        <label>
                                            {{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}
                                        </label>
                                    </div>
                                    <div class="product-price">
                                        <span>Prezzo:</span>
                                        <label>
                                            @if($product->offer()->exists())
                                                <del>{{$product->price}}€</del>
                                                {{$product->offer->calculateDiscount()}} €
                                            @else
                                                {{$product->price}} €
                                            @endif
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
                                </div>
                                <div class="cartProd mt_10 col-md-3">
                                    <div class="productQuantity">
                                        <span>Quantità Acquistata:</span>
                                    </div>
                                    <div>
                                        <form method="get" action="{{route('Cart.AddProduct', ['cod' => $product->cod])}}">
                                            <div class="col-md-3 pl_0 pt_3 mr_10">
                                                <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="{{$product->pivot->quantity}}" type="number" style="width: 65px; height: 35px;">
                                            </div>
                                            <div class="col-md-3 pl_0 pt_3">
                                                <button type="submit" class="btn btn-outline fa fa-refresh" title="Modifica"></button>
                                            </div>
                                        </form>
                                        <div class="col-md-3 pl_0 pt_3">
                                            <a href="{{route('Cart.RemoveProduct', ['cod' => $product->cod])}}" class="btn btn-outline fa fa-times-circle" title="Rimuovi"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cartProd mt_10 col-md-2">
                                    <div class="productPriceTotal pt_8 floatR">
                                        <span>Prezzo per Qt:</span>
                                        <label>{{auth()->User()->calculatepriceQuantityProduct($product)}} €</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="heading-part mb_10"></div>
                        <div class="cartProd col-sm-4 col-sm-offset-9">
                            <div class="product-name">
                                <span>Sub - Totale <small style="font-size: 10px;">(Iva inclusa)</small>:</span>
                                <label>{{auth()->User()->calculateTotalPrice()}} €</label>
                            </div>
                            <div class="productPriceTotal">
                                @if(auth()->User()->calculateTotalPrice()>250)
                                    <span>Costo di spedizione:</span>
                                    <label>Gratuita</label>
                                @else
                                    <span>Costo di spedizione:</span>
                                    <label>5.00 €</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt_40">
                            <a href="{{route('Shop')}}" class="btn pull-left mt_30">
                                Continua Lo Shopping
                            </a>
                            <a href="{{route('Checkout')}}" class="btn pull-right mt_30">
                                Checkout
                            </a>
                        </div>
                    @endif
                @else
                    @if(Session::has('products'))
                        @foreach(Session::get('products') as $product)
                            <div class="heading-part mb_10"></div>
                            <div class="mb_10 col-md-12">
                                @if($product->offer()->exists())
                                    <div class="pl_0 col-md-2">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="175" width="175">
                                            </a>
                                        </div>
                                        <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                                    </div>
                                @else
                                    <div class="pl_0 col-md-2">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="175" width="175">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="cartProd mt_10 col-md-5">
                                    <div class="product-name">
                                        <span>Prodotto:</span>
                                        <label>
                                            {{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}
                                        </label>
                                    </div>
                                    <div class="product-price">
                                        <span>Prezzo:</span>
                                        <label>
                                            @if($product->offer()->exists())
                                                <del>{{$product->price}}€</del>
                                                {{$product->offer->calculateDiscount()}} €
                                            @else
                                                {{$product->price}} €
                                            @endif
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
                                </div>
                                <div class="cartProd mt_10 col-md-3">
                                    <div class="productQuantity">
                                        <span>Quantità Acquistata:</span>
                                    </div>
                                    <div>
                                        <form method="get" action="{{route('Cart.AddProduct', ['cod' => $product->cod])}}">
                                            <div class="col-md-3 pl_0 pt_3 mr_10">
                                                @if(Session::has('quantity'))
                                                    <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="{{Session::get('quantity')[$loop->index]}}" type="number" style="width: 65px; height: 35px;">
                                                @endif
                                            </div>
                                            <div class="col-md-3 pl_0 pt_3">
                                                <button type="submit" class="btn btn-outline fa fa-refresh" title="Modifica"></button>
                                            </div>
                                        </form>
                                        <div class="col-md-3 pl_0 pt_3">
                                            <a href="{{route('Cart.RemoveProduct', ['cod' => $product->cod])}}" class="btn btn-outline fa fa-times-circle" title="Rimuovi"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cartProd mt_10 col-md-2">
                                    <div class="productPriceTotal pt_8 floatR">
                                        <span>Prezzo per Qt:</span>
                                        @if(Session::has('price'))
                                            <label>{{Session::get('price')[$loop->index] }} €</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="heading-part mb_10"></div>
                        <div class="cartProd col-sm-4 col-sm-offset-9">
                            @if(Session::has('TotalPrice'))
                                <div class="product-name">
                                    <span>Sub - Totale <small style="font-size: 10px;">(Iva inclusa)</small>:</span>
                                    <label>{{Session::get('TotalPrice')}} €</label>
                                </div>
                                <div class="productPriceTotal">
                                    @if(Session::get('TotalPrice')>250)
                                        <span>Costo di spedizione:</span>
                                        <label>Gratuita</label>
                                    @else
                                        <strong> + Costo di spedizione</strong>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 mt_40">
                            <a href="{{route('Shop')}}" class="btn pull-left mt_30">
                                Continua Lo Shopping
                            </a>
                            <a href="{{route('Checkout')}}" class="btn pull-right mt_30">
                                Checkout
                            </a>
                        </div>
                    @else
                        <div class="col-md-12">
                            <label style="font-size: 20px;">
                                Il tuo carrello è vuoto.
                            </label>
                            <br>
                            <span>
                                Per aggiungere articoli al tuo carrello, quando trovi un articolo che ti interessa, clicca su "Aggiungi al carrello"
                                o sull'icona " <i class="fa fa-shopping-cart"></i> "
                            </span>
                        </div>
                        <div class="col-md-12 mt_40">
                            <a href="{{route('Shop')}}" class="btn pull-left mt_30">
                                Continua Lo Shopping
                            </a>
                            <!--<form action="{{route('Checkout')}}">
                                <input class="btn pull-right mt_30" type="submit" value="Checkout">
                            </form>-->
                        </div>
                    @endif
                @endauth
            </div>
        </div>

        @auth()
            @if(auth()->User()->products->isEmpty())
                @include('frontend.partials.sliderproducts')
            @endif
        @else
            @if(!Session::has('products'))
                @include('frontend.partials.sliderproducts')
            @endif
        @endauth

        @include('frontend.partials.sliderbrands')
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
