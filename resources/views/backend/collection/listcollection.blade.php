@extends('backend.layout')

@section('content')


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Lista Collezioni</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin.index')}}">Home</a></li>
                        <li>Gestione Collezioni</li>
                        <li class="active">Lista Collezioni</li>
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
                                    <th>Nome Brand</th>
                                    <th>Nome Collezione</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($collection as $b)
                                    <tr>
                                        <td>{{$b->brand()->first()->name}}</td>
                                        <td>{{$b->name}}</td>
                                        <td>{{$b->created_at}}</td>
                                        <td>{{$b->updated_at}}</td>
                                        <td>{{$b->deleted_at}}</td>
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
