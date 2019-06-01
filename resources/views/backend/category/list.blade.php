@extends('backend.layout')

@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <hl>Lista Categorie</hl>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                      <li><a href="{{route('admin.index')}}">Home</a></li>
                      <li>Gestione Categorie</li>
                      <li class="active">Lista Categorie</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

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