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
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
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
                                        @foreach($list as $element )
                                            <tr>
                                                <td>#</td>
                                                <td>{{$element->product->collection->brand->name}}</td>
                                                <td>{{$element->product->collection->name}}</td>
                                                <td>{{$element->product->category->collection->brand->name}}</td>
                                                <td>{{$element->product->genre}}</td>
                                                <td>{{$element->product->price}}</td>
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
