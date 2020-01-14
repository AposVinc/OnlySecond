@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Immagini
        @endslot
        @slot('sez')
            Immagine Prodotto
        @endslot
        @slot('op')
            Lista
        @endslot
        Immagini
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Immagine prodotto
        @endslot
        @slot('content')
            questa immagine
        @endslot
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
                                        <th>Nome Prodotto</th>
                                        <th>Path Prodotto</th>
                                        <th>Img Principale</th>
                                        <th>Creato il</th>
                                        <th>Disattivato il</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <td>{{$image->product->collection->brand->name}}</td>
                                        <td>{{$image->product->collection->name}}</td>
                                        <td>{{$image->product->cod}}</td>
                                        <td><u><a href="{{route('Admin.Image.ShowImage',['id' => $image->id])}}">{{$image->path_image}}</a></u></td>
                                        @if($image->main)
                                            <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td>
                                        @else
                                            <td class="centre-text-cell"><i class="fa fa-square-o"></i></td>
                                        @endif
                                        <td>{{$image->created_at}}</td>
                                        <td>{{$image->deleted_at}}</td>
                                        <td>
                                            @if (!$image->trashed())
                                                <a id="iconDelete" title="Elimina" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Image.DeleteButton',$image->id)}}" style="cursor: pointer">
                                                    <i class="fa fa-minus-square" style="color: #cc0000"></i>
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
