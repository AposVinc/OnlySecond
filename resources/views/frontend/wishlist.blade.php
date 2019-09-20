@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER START  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>WishList</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">WishList</li>
                    </ul>
                </div>
            </div>
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
                                            <th>Brand</th>
                                            <th>Collezione</th>
                                            <th>Categoria</th>
                                            <th>Genere</th>
                                            <th>Prezzo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(auth()->User()->productsWishlist as $product )
                                            <tr>
                                                <td><img src="{{asset($product->path_image)}}"></td>
                                                <td>{{$product->collection->brand->name}}</td>
                                                <td>{{$product->collection->name}}</td>

                                                <td>
                                                    @foreach($product->categories as $category)
                                                    {{$category->name}}
                                                    @endforeach </td>
                                                <td>{{$product->genre}}</td>
                                                <td>{{$product->price}}</td>
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
        </div>
    </div>
@endsection
