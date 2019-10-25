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
                    <div class="heading-part mt_0 mb_10">
                        <span class="sub_title">Prodotto:</span>
                        <label class="product-info">{{$review->product->collection->brand->name}} {{$review->product->collection->name}} - {{$review->product->cod}}</label>
                    </div>

                    <div class="mt_10 col-md-2">
                        <div class="image product-imageblock ">
                            <a href="{{route('Product', ['cod' => $review->product->cod])}}">
                                <img data-name="product_image" src="{{asset($review->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div id="review" class="col-md-10 mt_10">
                        <div class="button-right">
                            <a href="{{route('Product', ['cod' => $review->product->cod])}}" type="button" class="btn btn-outline fa fa-pencil" title="Modifica Recensione"></a>
                            <a href="{{route('Review.Remove', ['id' => $review->id])}}" type="button" class="btn btn-outline fa fa-trash"></a>
                        </div>
                        <div class="review-title">
                            <span>Titolo:</span>
                            <label>{{$review->title}}</label>
                        </div>
                        <div class="review-vote-date">
                            <span>Data:</span>
                            <label>{{date('d-m-Y H:i', strtotime($review->created_at))}}</label>

                            <span style="margin-left: 25px;">Voto:</span>
                            @for ($i = 1; $i < 6; $i++)
                                @if($i <= $review->vote)
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                @else
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                @endif
                            @endfor
                        </div>
                        <div class="review-text">
                            <p>{{$review->text}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
