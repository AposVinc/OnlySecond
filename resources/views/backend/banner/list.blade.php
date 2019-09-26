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
                                        <th>Visibile</th>
                                        <th>Creato il</th>
                                        <th>Ultima modifica</th>
                                        <th>Eliminato il</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{$banner->collection->brand->name}}</td>
                                        <td>{{$banner->collection->name}}</td>
                                        <td><u><a href="{{route('Admin.Banner.ShowImage',['id' => $banner->id])}}">{{$banner->path_image}}</a></u></td>
                                        @if($banner->visible)
                                            <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td>
                                        @else
                                            <td class="centre-text-cell"><i class="fa fa-square-o"></i></td>
                                        @endif
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
