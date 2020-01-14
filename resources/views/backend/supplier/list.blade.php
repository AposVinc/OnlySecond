@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Fornitori
        @endslot
        @slot('sez')
            Fornitori
        @endslot
        @slot('op')
            Lista
        @endslot
        Fornitori
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Fornitore
        @endslot
        @slot('content')
            questo fornitore
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Fornitore
        @endslot
        @slot('content')
            questo fornitore
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
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Tel</th>
                                        <th>Cap - Città - Indirizzo</th>
                                        <th>IBAN</th>
                                        <th>Creato il</th>
                                        <th>Ultima modifica</th>
                                        <th>Disattivato il</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->phone}}</td>
                                        <td>{{$supplier->zip}}<br>{{$supplier->city}}, {{$supplier->address}}</td>
                                        <td>{{$supplier->iban}}</td>
                                        <td>{{$supplier->created_at}}</td>
                                        <td>{{$supplier->updated_at}}</td>
                                        <td>{{$supplier->deleted_at}}</td>
                                        <td>
                                            @if (!$supplier->trashed())
                                                <a href="{{route('Admin.Supplier.EditButton',$supplier->email)}}"><i class="fa fa-edit" title="Modifica" style="color: darkblue"></i></a>
                                                <a id="iconDelete" title="Elimina" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Supplier.DeleteButton',$supplier->email)}}" style="cursor: pointer">
                                                    <i class="fa fa-minus-square" style="color: #cc0000"></i>
                                                </a>
                                            @else
                                                <a id="iconRestore" title="Riattiva" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.Supplier.RestoreButton',$supplier->email)}}" style="cursor: pointer">
                                                    <i class="fa fa-refresh" style="color: green"></i>
                                                </a>
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
