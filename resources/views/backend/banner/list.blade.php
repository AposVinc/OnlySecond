@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Lista Banner
        @endslot
        Banner
    @endcomponent
    <div id="prova" class="center">

    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" id="click">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome Collezione</th>
                                    <th>Immagine Banner</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{$banner->collection->name}}</td>
                                        <td><u><a class="openimg">{{$banner->image}}</a></u></td>
                                        <td>{{$banner->created_at}}</td>
                                        <td>{{$banner->updated_at}}</td>
                                        <td>{{$banner->deleted_at}}</td>
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
