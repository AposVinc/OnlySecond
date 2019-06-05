@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Lista Fornitori
        @endslot
        Fornitori
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
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->created_at}}</td>
                                        <td>{{$supplier->updated_at}}</td>
                                        <td>{{$supplier->deleted_at}}</td>
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
