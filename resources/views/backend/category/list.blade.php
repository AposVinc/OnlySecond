@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Lista Categorie
        @endslot
        Categorie
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
                                <th>Eliminata il</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category )
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>
                                    <td>{{$category->deleted_at}}</td>
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