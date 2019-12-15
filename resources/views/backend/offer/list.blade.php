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

    @component('backend.dialogDelete')
        @slot('title')
            Offerta
        @endslot
        @slot('content')
            questa offerta
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
                                        <th>Cod Prodotto</th>
                                        <th>Prezzo</th>
                                        <th>Sconto</th>
                                        <th>Prezzo Scontato</th>
                                        <th>Fine Offerta il</th>
                                        <th>Creata il</th>
                                        <th>Modificata il</th>
                                        <th>Azioni</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>{{$offer->product->collection->brand->name}}</td>
                                        <td>{{$offer->product->collection->name}}</td>
                                        <td>{{$offer->product->cod}}</td>
                                        <td>{{$offer->product->price}}</td>
                                        <td>{{$offer->rate}}</td>
                                        <td>{{$offer->calculateDiscount()}}</td>
                                        <td>{{$offer->end}}</td>
                                        <td>{{$offer->created_at}}</td>
                                        <td>{{$offer->updated_at}}</td>
                                        <td>
                                            <a href="{{route('Admin.Offer.EditButton',$offer->product->cod)}}"><i class="fa fa-edit" style="color: darkblue"></i></a>
                                            <a id="iconDelete" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Offer.DeleteButton',$offer->product->cod)}}" style="cursor: pointer"><i class="fa fa-minus-square" style="color: #cc0000"></i></a>
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
@endsection
