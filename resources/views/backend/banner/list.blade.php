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

    @component('backend.dialogDelete')
        @slot('title')
            Banner
        @endslot
        @slot('content')
            questo banner
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Banner
        @endslot
        @slot('content')
            questo banner
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
                                        <th>Nome Brand</th>
                                        <th>Nome Collezione</th>
                                        <th>Immagine Banner</th>
                                        <th>Tipo</th>
                                        <th>Visibile</th>
                                        <th>Creato il</th>
                                        <th>Ultima modifica</th>
                                        <th>Disattivato il</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{$banner->collection->brand->name}}</td>
                                        <td>{{$banner->collection->name}}</td>
                                        <td><u><a href="{{route('Admin.Banner.ShowImage',['id' => $banner->id])}}">{{$banner->path_image}}</a></u></td>
                                        <td>{{$banner->type}}</td>
                                        @if($banner->visible)
                                            <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td>
                                        @else
                                            <td class="centre-text-cell"><i class="fa fa-square-o"></i></td>
                                        @endif
                                        <td>{{$banner->created_at}}</td>
                                        <td>{{$banner->updated_at}}</td>
                                        <td>{{$banner->deleted_at}}</td>
                                        <td>
                                            @if (!$banner->trashed())
                                                <a href="{{route('Admin.Banner.EditButton',$banner->id)}}"><i class="fa fa-edit" title="Modifica" style="color: darkblue"></i></a>
                                                <a id="iconDelete" title="Elimina" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Banner.DeleteButton',$banner->id)}}" style="cursor: pointer">
                                                    <i class="fa fa-minus-square" style="color: #cc0000"></i>
                                                </a>
                                            @else
                                                <a id="iconRestore" title="Riattiva" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.Banner.RestoreButton',$banner->id)}}" style="cursor: pointer">
                                                    <i class="fa fa-refresh" style="color: green"></i>
                                                </a>
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
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
