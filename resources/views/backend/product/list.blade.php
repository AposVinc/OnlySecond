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

    @component('backend.dialogDelete')
        @slot('title')
            Prodotto
        @endslot
        @slot('content')
            questo prodotto
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Prodotto
        @endslot
        @slot('content')
            questo prodotto
        @endslot
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
                                        <th>Codice Prodotto</th>
                                        <th>Disp. Magaz</th>
                                        <th>Prezzo</th>
                                        <th>Creato il</th>
                                        <th>Ultima modifica</th>
                                        <th>Disattivato il</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->collection->brand->name}}</td>
                                            <td>{{$product->collection->name}}</td>
                                            <td>{{$product->cod}}</td>
                                            <td>{{$product->stock_availability}}</td>
                                            <td>{{$product->price}} €</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>{{$product->updated_at}}</td>
                                            <td>{{$product->deleted_at}}</td>
                                            <td>
                                                @if (!$product->trashed())
                                                    <a href="{{route('Admin.Product.EditButton',$product->cod)}}"><i class="fa fa-edit" title="Modifica" style="color: darkblue"></i></a>
                                                    <a id="iconDelete" title="Elimina" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Product.DeleteButton',$product->cod)}}" style="cursor: pointer"><i class="fa fa-minus-square" style="color: #cc0000"></i></a>
                                                @else
                                                    <a id="iconRestore" title="Riattiva" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.Product.RestoreButton',$product->cod)}}" style="cursor: pointer"><i class="fa fa-refresh" style="color: green"></i></a>
                                                @endif
                                            </td>
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
