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
                            <div class="pl_0 col-md-2 ">
                                <label class="sub_title">N° Ordine: </label>
                                <label class="text_title">{{$order->id}}</label>
                            </div>
                            <div class="pl_0 col-md-3">
                                <div class="text_title" style="color: #fff;" >Data: </div>
                                <div class="text_title">{{date('d-m-Y H:i', strtotime($order->created_at))}}</div>
                            </div>
                            <div class="col-md-offset-2 col-md-2">
                                <label class="text_title" style="color: #fff;">Regalo: </label>
                                <label class="text_title">@if($order->gift) Si @else No @endif</label>
                            </div>
                            <div class="pull-right">
                                <label class="sub_title">Prezzo Totale: </label>
                                <label class="text_title">{{$order->calculateTotalPrice()}} €</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb_20">
                            <div id="review" class="mt_10 mr_5 col-md-3 pull-right" style="text-align: right">
                                <div>
                                    <label><span>Indirizzo di Fatturazione:</span><br>{{$order->billingAddress->name}} {{$order->billingAddress->surname}} <br> {{$order->billingAddress->address}}, {{$order->billingAddress->civic_number}}<br>{{$order->billingAddress->city}} {{'('. $order->billingAddress->region. ')'}} CAP:{{$order->billingAddress->zip}}</label>
                                </div>
                                <div>
                                    <label><span>Metodo di Pagamento:</span><br>{{$order->payment->name}}</label>
                                </div>

                                <div>
                                    <label><span>Indirizzo di Spedizione:</span><br>{{$order->mailingAddress->name}} {{$order->mailingAddress->surname}} <br> {{$order->mailingAddress->address}}, {{$order->mailingAddress->civic_number}}<br>{{$order->mailingAddress->city}} {{'('. $order->mailingAddress->region. ')'}} CAP:{{$order->mailingAddress->zip}}</label>
                                </div>
                                <div>
                                    <label><span>Corriere:</span>{{$order->courier->name}}</label>
                                </div>
                            </div>
                            @foreach($order->products as $product)
                                <div id="review" class="mb_10 col-md-8">

                                    <div class="mt_10 pl_0 col-md-3">
                                        <div class="image product-imageblock">
                                            <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive" height="175" width="175">
                                            </a>
                                        </div>
                                    </div>
                                    <div id="review" class="mt_10 pl_0 col-md-8">
                                        <div>
                                            <label class="product-name"><span>Prodotto:</span>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</label>
                                        </div>
                                        <div>
                                            <label><span>Prezzo:</span>{{$product->pivot->price}} €</label>
                                        </div>
                                        <div>
                                            <label><span>Quantità Acquistata:</span>{{$product->pivot->quantity}}</label>
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
