@extends('backend.layout')

@section('content')


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Lista Brand</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('Admin.Index')}}">Home</a></li>
                        <li>Gestione Brand</li>
                        <li class="active">Lista Brand</li>
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
                                    <th>Email</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsletters as $newsletter)
                                    <tr>
                                        <td>{{$newsletter->email}}</td>
                                        <td>{{$newsletter->created_at}}</td>
                                        <td>{{$newsletter->updated_at}}</td>
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
