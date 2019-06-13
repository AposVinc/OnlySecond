@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Modifica Banner
        @endslot
        Banner
    @endcomponent

    <form action="{{route('Admin.Banner.EditUpdate')}}" method="post" class="form-horizontal">
    @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">


                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control dynamicBanner" data-dependent="collectionBanner">
                            <option value="0">Seleziona il brand</option>
                            @foreach($brands as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collectionBanner" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collection" id="collectionBanner" class="form-control dynamicImage" data-dependent="banner">
                            <option value="0">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="banner" class=" form-control-label">Banner</label></div>
                    <div class="col-12 col-md-9">
                        <select name="banner" id="banner" class="form-control">
                            <option value="0">Seleziona il banner </option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Nuovo Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newbrand" id="brand" class="form-control dynamic" data-dependent="collection">
                            <!-- ho tolto dynamic perchè altrimenti si azzara il valore della collection scelta dal menù a tendina-->
                            <option value="0">Seleziona il nuovo brand</option>
                            @foreach($brands as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Nuova Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newcollection" id="collection" class="form-control">
                            <option value="0">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Immagine Banner</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="newbanner" class="form-control-file"></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Modifica
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
        <!-- </div>-->
    </form>

@endsection
