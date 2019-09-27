@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                Cronologia Ordini
            @endcomponent

            <div class="col-sm-12 col-lg-auto ">

                @foreach(auth()->user()->orderHistories()->get() as $order )

                    <div class="heading-part mt_20 mb_10">
                        <div class="col-md-2 mr-md-2">
                            <div class="sub_title">N° Ordine: &nbsp;</div>
                            <div class="text_title">{{$order->id}}</div>
                        </div>
                        <div class="sub_title" style="font-style: italic; color: #fff;" >Data: &nbsp;</div>
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
                                    <div >
                                        <h4><span>Prodotto:&ensp;</span>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</h4>
                                    </div>
                                </div>

                                <!-- quantità venduta -->

                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
