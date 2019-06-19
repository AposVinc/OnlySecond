@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Immagini
        @endslot
        @slot('sez')
            Banner
        @endslot
        @slot('op')
            Lista
        @endslot
        Banner
    @endcomponent

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" id="click">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome Brand</th>
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
                                        @foreach($collections as $collection)
                                            @if($collection->name == $banner->collection->name)
                                                <td>{{$collection->brand->name}}</td>
                                            @endif
                                        @endforeach
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
