@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Offerte
        @endslot
        @slot('sez')
            Offerte
        @endslot
        @slot('op')
            Lista
        @endslot
        Offerte
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
                                    <th>Cod Prodotto</th>
                                    <th>Prezzo</th>
                                    <th>Sconto</th>
                                    <th>Prezzo Scontato</th>
                                    <th>Creata il</th>
                                    <th>Modificata il</th>
                                    <th>Eliminata il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>{{$offer->collection->brand->name}}</td>
                                        <td>{{$offer->collection->name}}</td>
                                        <td>{{$offer->product->name}}</td>
                                        <td>{{$offer->product->price}}</td>
                                        <td>{{$offer->rate}}</td>
                                        <td>{{$offer->newprice}}</td>
                                        <td>{{$offer->created_at}}</td>
                                        <td>{{$offer->updated_at}}</td>
                                        <td>{{$offer->deleted_at}}</td>
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
@endsection
