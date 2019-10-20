@@ -0,0 +1,78 @@
@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_20">

            @component('frontend.partials.breadcrumbsprofile')
                Le Mie Recensioni
            @endcomponent

            @foreach(auth()->user()->reviews as $review)
                <div class="col-lg-12 mb_40">

                    <div class="heading-part mt_20 mb_10">
                        <label class="sub_title"><span>Prodotto:</span></label>
                        <div class="text_title" style="color:#9E9E9E; font-style: normal; font-weight: bold;">{{$review->product->collection->brand->name}} {{$review->product->collection->name}} - {{$review->product->cod}}</div>
                    </div>

                    <div class="mt_10 col-md-2">
                        <div class="image product-imageblock ">
                            <a href="{{route('Product', ['cod' => $review->product->cod])}}">
                                <img data-name="product_image" src="{{asset($review->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div id="review" class="col-md-10 mt_10">
                        <div style="position: absolute; top: 0; right: 10px;">
                            <a href="{{route('Product', ['cod' => $review->product->cod])}}" type="button" class="btn btn-outline fa fa-pencil" title="Modifica Recensione"></a>
                            <a href="{{route('Review.Remove', ['id' => $review->id])}}" type="button" class="btn btn-outline fa fa-trash"></a>
                        </div>
                        <div class="mt_10">
                            <label class="review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>
                            <label class="review-vote-date"><span>Voto:</span>{{$review->vote}}<span style="margin-left: 10px;">Data:</span>{{$review->created_at}}</label>
                        </div>
                        <div style="margin-top:5px; text-align: justify;">
                            <span>{{$review->text}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
