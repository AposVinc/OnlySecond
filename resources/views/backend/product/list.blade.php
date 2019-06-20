@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Prodotti
        @endslot
        @slot('op')
            Lista
        @endslot
        Prodotti
    @endcomponent

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome Brand</th>
                                    <th>Nome Collezione</th>
                                    <th>Nome Prodotto</th>
                                    <th>Codice Prodotto</th>
                                    <th>Disp. Magaz</th>
                                    <th>Prezzo</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    @foreach($brand->collections as $collection)
                                        @foreach($collection->products as $product)
                                        <tr>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$collection->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->cod}}</td>
                                            <td>{{$product->stock_availability}}</td>
                                            <td>{{$product->price}} €</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>{{$product->updated_at}}</td>
                                            <td>{{$product->deleted_at}}</td>
                                        </tr>
                                    @endforeach

                                    @endforeach
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
