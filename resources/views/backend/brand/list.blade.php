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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$brand->name}}</td>
                                        <td><u><a href="{{route('Admin.Brand.Image',['name' => $brand->name])}}">{{$brand->path_logo}}</a></u></td>
                                        <td>{{$brand->created_at}}</td>
                                        <td>{{$brand->updated_at}}</td>
                                        <td>{{$brand->deleted_at}}</td>
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
