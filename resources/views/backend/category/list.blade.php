@extends('backend.layout')

@section('content')
    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Categorie
        @endslot
        @slot('op')
            Lista
        @endslot
        Categorie
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Categoria
        @endslot
        @slot('content')
            questa categoria
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Categoria
        @endslot
        @slot('content')
            questa categoria
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
                                    <th>Creata il</th>
                                    <th>Ultima Modifica</th>
                                    <th>Disattivata il</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>{{$category->updated_at}}</td>
                                        <td>{{$category->deleted_at}}</td>
                                        <td>
                                            @if (!$category->trashed())
                                                <a href="{{route('Admin.Category.EditButton',$category->id)}}"><i class="fa fa-edit" style="color: darkblue"></i></a>
                                                <a id="iconDelete" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Category.DeleteButton',$category->id)}}" style="cursor: pointer"><i class="fa fa-minus-square" style="color: #cc0000"></i></a>
                                            @else
                                                <a id="iconRestore" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.Category.RestoreButton',$category->id)}}" style="cursor: pointer"><i class="fa fa-refresh" style="color: green"></i></a>
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
        </div>
    </div>
@endsection
