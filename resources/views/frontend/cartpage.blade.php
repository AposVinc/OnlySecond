@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbshome')
                Carrello
            @endcomponent

            <div class="col-sm-12 mtb_20">
                <form method="post" action="#">
                    @auth()
                        @foreach(auth()->User()->products as $product)
                            <div class="heading-part mb_10"></div>
                            <div class="mb_10 col-md-12">
                                <div class="mt_10 pl_0 col-md-2">
                                    <div class="image product-imageblock">
                                        <a href="{{route('Product', ['cod' => $product->cod])}}">
                                            <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->cod}}" title="{{$product->cod}}" class="img-responsive" height="175" width="175">
                                        </a>
                                    </div>
                                </div>
                                <div class="mt_10 col-md-4">
                                    <div class="productName">
                                        <span>Prodotto:</span>
                                        <label>
                                            {{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}
                                        </label>
                                    </div>
                                    <div class="productPrice">
                                        <span>Prezzo:</span>
                                        <label>
                                            {{$product->price}} €
                                        </label>
                                    </div>
                                    <div class="productField">
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
                                    <div class="productField">
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
                                </div>
                                <div class="mt_10 col-md-3">
                                    <div class="productQuantity">
                                        <span>Quantità Acquistata:</span>
                                        <input class="cart-qty" name="product_quantity" min="1" value="{{$product->pivot->quantity}}" type="number">
                                    </div>
                                </div>
                                <div class="mt_10 col-md-3">
                                    <div class="productPriceTotal pt_8 floatR">
                                        <span>Prezzo x Qt:</span>
                                        <label>{{auth()->User()->calculatepriceQuantityProduct($product)}} €</label>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endauth
                </form>
                <div class="col-sm-12 pl_0 pr_0">
                    <div class="heading-part mb_10"></div>
                </div>
                <div class="col-sm-4 pl_68 col-sm-offset-9">
                    <div class="productName">
                        <span>Sub - Totale:</span>
                        <label>{{auth()->User()->calculateTotalPrice()}} €</label>
                    </div>
                    <div class="productPriceTotal">
                        @if(auth()->User()->calculateTotalPrice()>250)
                            <span>Costo di spedizione:</span>
                            <label>Gratuita</label>
                        @else
                            <strong> + Costo di spedizione</strong>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 mt_40">
                    <form action="{{route('Shop')}}">
                        <input class="btn pull-left mt_30" type="submit" value="Continua Lo Shopping">
                    </form>
                    <form action="{{route('Checkout')}}">
                        <input class="btn pull-right mt_30" type="submit" value="Checkout">
                    </form>
                </div>
            </div>
        </div>

        @include('frontend.partials.sliderbrands')
    </div>
    <!-- =====  CONTAINER END  ===== -->
@endsection
