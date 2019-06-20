@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Immagini
        @endslot
        @slot('sez')
            Immagine Prodotto
        @endslot
        @slot('op')
            Lista
        @endslot
        Immagini
    @endcomponent

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" id="click">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome Brand</th>
                                    <th>Nome Collezione</th>
                                    <th>Nome Prodotto</th>
                                    <th>Immagine Prodotto</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        @foreach($products as $product)
                                            @foreach($collections as $collection)
                                                @if($product->name == $image->product->name and $product->collection->name == $collection->name)
                                                    <td>{{$collection->brand->name}}</td>
                                                    <td>{{$product->collection->name}}</td>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <td>{{$image->product->name}}</td>
                                        <td><u><a class="openimg">{{$image->image}}</a></u></td>
                                        <td>{{$image->created_at}}</td>
                                        <td>{{$image->updated_at}}</td>
                                        <td>{{$image->deleted_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
