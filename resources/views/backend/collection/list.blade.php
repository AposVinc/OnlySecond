@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Collezioni
        @endslot
        @slot('op')
            Lista
        @endslot
        Collezioni
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Collezione
        @endslot
        @slot('content')
            questa collezione
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Collezione
        @endslot
        @slot('content')
            questa collezione
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
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Disattivato il</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($collections as $collection)
                                    <tr>
                                        <td>{{$collection->brand->name}}</td>
                                        <td>{{$collection->name}}</td>
                                        <td>{{$collection->created_at}}</td>
                                        <td>{{$collection->updated_at}}</td>
                                        <td>{{$collection->deleted_at}}</td>
                                        <td>
                                            @if (!$collection->trashed())
                                                <a href="{{route('Admin.Collection.EditButton',$collection->name)}}"><i class="fa fa-edit" style="color: darkblue"></i></a>
                                                <a id="iconDelete" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Collection.DeleteButton',$collection->name)}}" style="cursor: pointer"><i class="fa fa-minus-square" style="color: #cc0000"></i></a>
                                            @else
                                                <a id="iconRestore" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.Collection.RestoreButton',$collection->name)}}" style="cursor: pointer"><i class="fa fa-refresh" style="color: green"></i></a>
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
