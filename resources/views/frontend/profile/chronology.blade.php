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

                    <div class="heading-part mt_20 mb_10">
                        <div class="col-md-2 mr-md-2">
                            <label class="sub_title">N° Ordine: </label>
                            <label class="text_title">{{$order->id}}</label>
                        </div>
                        <div class="sub_title" style="font-style: italic; color: #fff;" >Data: </div>
                        <div class="text_title">{{date('d-m-Y H:i', strtotime($order->created_at))}}</div>
                    </div>
                    <div class="row">

                        @foreach($order->products as $product)
                            <div class="col-lg-12 mb_10">
                                <div class="mt_10 col-md-2">
                                    <div class="image product-imageblock ">
                                        <a href="{{route('Product', ['cod' => $product->cod])}}">
                                            <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <div id="review" class="mt_10 col-md-10">
                                    <div>
                                        <label class="product-name"><span>Prodotto:</span>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</label>
                                    </div>
                                    <div>
                                        <label><span>Prezzo:</span>{{$product->pivot->price}}</label>
                                    </div>
                                    <div>
                                        <label><span>Quantità Acquistata:</span>{{$product->pivot->quantity}}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            qui sotto comuni a tutto l'ordine --- mettere visualizza altro?
                            <div>
                                <label><span>Metodo di Pagamento:</span>{{$order->payment->name}}</label>
                            </div>
                            <div>
                                <label><span>Regalo:</span> @if($order->gift) Si @else No @endif
                                </label>
                            </div>
                            <div>
                                <label><span>Prezzo Totale:</span>{{$order->calculateTotalPrice()}}</label>
                            </div>
                            <div>
                                <label><span>Indirizzo di Spedizione:</span>{{$order->mailingAddress->name}} {{$order->mailingAddress->surname}} - {{$order->mailingAddress->address}}, {{$order->mailingAddress->civic_number}} {{$order->mailingAddress->city}} {{'('. $order->mailingAddress->region. ')'}} CAP:{{$order->mailingAddress->zip}}</label>
                            </div>
                            <div>
                                <label><span>Corriere:</span>{{$order->courier->name}}</label>
                            </div>
                            <div>
                                <label><span>Indirizzo di Fatturazione:</span>{{$order->billingAddress->name}} {{$order->billingAddress->surname}} - {{$order->billingAddress->address}}, {{$order->billingAddress->civic_number}} {{$order->billingAddress->city}} {{'('. $order->billingAddress->region. ')'}} CAP:{{$order->billingAddress->zip}}</label>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
