@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_20">

            @component('frontend.partials.breadcrumbsprofile')
                Le Mie Recensioni
            @endcomponent

            <div class="col-lg-12 mt_20">
                <div class="category-page-wrapper mb_30">
                    <div class="list-grid-wrapper pull-right">
                        <div class="btn-group btn-list-grid">
                            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                            <button type="button" id="list-view" class="btn btn-default list-view"></button>
                        </div>
                    </div>
                    <div class="page-wrapper pull-right">
                        <label class="control-label" for="input-limit">Mostra :</label>
                        <div class="limit">
                            <select id="input-limit" class="form-control">
                                <option value="ASC" selected="selected">Tutte</option>
                                <option value="ASC">Recenti</option>
                                <option value="DESC">Meno Recenti</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                    <div class="sort-wrapper pull-right">
                        <label class="control-label" for="input-sort">Brand :</label>
                        <div class="sort-inner">
                            <select id="input-sort" class="form-control">
                                <option value="ASC" selected="selected">Tutti</option>
                                <option value="ASC">Breil</option>
                                <option value="DESC">Tissot</option>
                                <option value="ASC">Wellington</option>
                                <option value="DESC">Fossil</option>
                                <option value="DESC">Lacoste</option>
                                <option value="ASC">Ice Watch</option>
                            </select>
                        </div>
                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>

            @foreach(auth()->user()->reviews as $review)
                <div class="col-lg-12 mb_40">
                    <div class="mt_10 col-md-2">
                        <div class="image product-imageblock">
                            <a href="{{route('Product', ['cod' => $review->product->cod])}}">
                                <img data-name="product_image" src="{{asset($review->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div id="review" class="col-md-10 mt_10">
                        <div>
                            <label class="product-name"><span>Prodotto:</span>{{$review->product->collection->brand->name}} {{$review->product->collection->name}} - {{$review->product->cod}}</label>
                            <div style="position: absolute; top: 0; right: 10px;">
                                <a href="{{route('Product', ['cod' => $review->product->cod])}}" type="button" class="btn btn-outline fa fa-pencil" title="Modifica Recensione"></a>
                                <a href="{{route('Review.Remove', ['id' => $review->id])}}" type="button" class="btn btn-outline fa fa-trash" title="Elimina Recensione"></a>
                            </div>
                        </div>
                        <div class="mt_10">
                            <label class="review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>
                            <label class="review-vote-date">
                                <span>Data:</span>{{date('d-m-Y H:i', strtotime($review->created_at))}}
                                <span style="margin-left: 25px;">Voto:</span>
                                @for ($i = 1; $i < 6; $i++)
                                    @if($i <= $review->vote)
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                    @else
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    @endif
                                @endfor
                            </label>
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
