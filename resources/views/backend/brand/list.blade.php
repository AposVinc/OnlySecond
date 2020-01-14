@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Brand
        @endslot
        @slot('op')
            Lista
        @endslot
        Brand
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Brand
        @endslot
        @slot('content')
            questo brand
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Brand
        @endslot
        @slot('content')
            questo brand
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
                                    <th>Logo</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Disattivato il</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$brand->name}}</td>
                                        <td><u><a href="{{route('Admin.Brand.Image',$brand->name)}}">{{$brand->path_logo}}</a></u></td>
                                        <td>{{$brand->created_at}}</td>
                                        <td>{{$brand->updated_at}}</td>
                                        <td>{{$brand->deleted_at}}</td>
                                        <td>
                                            @if (!$brand->trashed())
                                                <a href="{{route('Admin.Brand.EditButton',$brand->name)}}"><i class="fa fa-edit" title="Modifica" style="color: darkblue"></i></a>
                                                <a id="iconDelete" title="Elimina" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Brand.DeleteButton',$brand->name)}}" style="cursor: pointer"><i class="fa fa-minus-square" style="color: #cc0000"></i></a>
                                            @else
                                                <a id="iconRestore" title="Riattiva" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.Brand.RestoreButton',$brand->name)}}" style="cursor: pointer"><i class="fa fa-refresh" style="color: green"></i></a>
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
