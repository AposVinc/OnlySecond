@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                Cronologia Ordini
            @endcomponent

            <div class="col-sm-12 col-lg-auto">

                @foreach(auth()->user()->orderHistories()->get() as $order )

                    <div class="heading-part mb_10">
                        <div class="col-md-12">
                            <div class="order-info pl_0 col-md-2 ">
                                <span>N° Ordine:</span>
                                <label>{{$order->id}}</label>
                            </div>
                            <div class="order-info pl_0 col-md-3">
                                <label class="mr_5" style="color: #fff;">Data: </label>
                                <label>{{date('d-m-Y H:i', strtotime($order->created_at))}}</label>
                            </div>
                            <div class="col-md-offset-2 col-md-2 order-info">
                                <label style="color: #fff;">Regalo:</label>
                                <label>@if($order->gift) Si @else No @endif</label>
                            </div>
                            <div class="pull-right order-info">
                                <span>Prezzo Totale:</span>
                                <label class="order-price">{{$order->calculateTotalPrice()}} €</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb_20">
                            <div id="order-attr" class="mt_10 mr_5 col-md-3 pull-right">
                                <div>
                                    <span>Indirizzo di Fatturazione:</span>
                                    <label>{{$order->billingAddress->name}} {{$order->billingAddress->surname}} <br> {{$order->billingAddress->address}}, {{$order->billingAddress->civic_number}}<br>{{$order->billingAddress->city}} {{'('. $order->billingAddress->region. ')'}} CAP:{{$order->billingAddress->zip}}</label>
                                </div>
                                <div>
                                    <span>Metodo di Pagamento:</span>
                                    <label>{{$order->payment->name}}</label>
                                </div>

                                <div>
                                    <span>Indirizzo di Spedizione:</span>
                                    <label>{{$order->mailingAddress->name}} {{$order->mailingAddress->surname}} <br> {{$order->mailingAddress->address}}, {{$order->mailingAddress->civic_number}}<br>{{$order->mailingAddress->city}} {{'('. $order->mailingAddress->region. ')'}} CAP:{{$order->mailingAddress->zip}}</label>
                                </div>
                                <div>
                                    <span>Corriere:</span>
                                    <label>{{$order->courier->name}}</label>
                                </div>
                            </div>
                            @foreach($order->products as $product)
                                <div id="chronology" class="mb_10 col-md-8">
                                    <div class="mt_10 pl_0 col-md-3">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="175" width="175">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt_10 pl_0 col-md-8">
                                        <div class="product-name">
                                            <span>Prodotto:</span>
                                            <label>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</label>
                                        </div>
                                        <div class="product-price">
                                            <span>Prezzo:</span>
                                            <label>{{$product->pivot->price}} €</label>
                                        </div>
                                        <div class="product-attr">
                                            <span>Quantità Acquistata:</span>
                                            <label>{{$product->pivot->quantity}}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
