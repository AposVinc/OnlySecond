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
                        <div class="image product-imageblock ">
                            <a href="{{route('Product', ['cod' => $review->product->cod])}}">
                                <img data-name="product_image" src="{{asset($review->product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div id="review" class="mt_10 col-md-10">
                        <h4><span>Prodotto:&ensp;</span>{{$review->product->collection->brand->name}} {{$review->product->collection->name}} - {{$review->product->cod}}</h4>
                        <div class="mt_10">
                            <h5><span>Titolo:&ensp;&ensp;</span>{{$review->title}}</h5>
                            <h6><span>Voto:&ensp;</span>{{$review->vote}} &nbsp;&nbsp; <span>Data: </span>{{$review->created_at}}</h6>
                        </div>
                        <div class="mt_10" style="text-align: justify">
                            <span >{{$review->text}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
