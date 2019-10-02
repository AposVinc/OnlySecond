@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                WishList
            @endcomponent

            @if(auth()->User()->productsWishlist->isEmpty())

            @else
                @foreach(auth()->User()->productsWishlist as $product)
                    <div class="col-lg-12 mb_40">
                        <div class="mt_10 col-md-2">
                            <div class="image product-imageblock">
                                <a href="{{route('Product', ['cod' => $product->cod])}}">
                                    <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="iPod Classic" title="iPod Classic" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div id="review" class="col-md-10 mt_10">
                            <div>
                                <label class="product-name"><span>Prodotto:</span>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</label>
                                <div style="position: absolute; top: 0; right: 10px;">
                                    <a href="" type="button" class="btn btn-outline fa fa-shopping-cart" ></a>
                                    <a href="{{route('Wishlist.RemoveProduct',['cod'=>$product->cod])}}" type="button" class="btn btn-outline fa fa-trash"></a>
                                </div>
                            </div>
                            <div class="mt_10">
                                <label class="review-title"><span style="margin-right: 8px">Prezzo:</span>{{$product->price}}</label>
                                <label class="review-vote-date"><span>Genere:</span>{{$product->genre}}</label>
                                <label class="review-vote-date"><span>Categoria:</span>
                                    @foreach($product->categories as $category)
                                        {{$category->name}},
                                    @endforeach
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </div>
@endsection
