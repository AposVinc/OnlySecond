@extends('backend.layout')

@section('content')


    @component('backend.breadcrumbs')
        @slot('title')
            Lista Prodotti
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
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--foreach($brands as $brand => $collections)
                                foreach($collections as $collection )
                                    <tr>
                                        <td>{$brand->name}}</td>
                                        <td>{$collection->name}}</td>
                                        <td>{$product->name}}</td>
                                        <td>{$product->created_at}}</td>
                                        <td>{$product->updated_at}}</td>
                                        <td>{$product->deleted_at}}</td>
                                    </tr>
                                endforeach
                                endforeach
                                -->
                                @foreach($products as $product)
                                    <tr>
                                        @foreach($collections as $collection)
                                            @if($collection->name==$product->collection->name)
                                                <td>{{$collection->brand->name}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$product->collection->name}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->updated_at}}</td>
                                        <td>{{$product->deleted_at}}</td>
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
