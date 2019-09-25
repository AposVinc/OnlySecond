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

                <div class="col-sm-12">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="bootstrap-data-table-export" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Immagine</th>
                                                <th>Prodotto</th>
                                                <th>Categoria</th>
                                                <th>Genere</th>
                                                <th>Prezzo</th>
                                                <th>Azioni</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(auth()->User()->productsWishlist as $product)
                                                <tr>
                                                    <td style="width:180px; height:180px;">
                                                        <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                            <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="product" >
                                                        </a>
                                                    </td>
                                                    <td>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</td>
                                                    <td>
                                                        @foreach($product->categories as $category)
                                                            {{$category->name}} <br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{$product->genre}}</td>
                                                    <td>€ {{$product->price}}</td>
                                                    <td style="width:180px; height:180px; vertical-align: middle">
                                                        <div class="mb_10">
                                                            <a href="" type="button" class="btn btn-outline-secondary" >Aggiungi a Carrello</a>
                                                        </div>
                                                        <div >
                                                            <a href="{{route('Wishlist.RemoveProduct',['cod'=>$product->cod])}}" type="button" class="btn btn-outline-danger">Rimuovi</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection
