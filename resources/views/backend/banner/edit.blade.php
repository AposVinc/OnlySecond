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
            Modifica
        @endslot
        Banner
    @endcomponent

    <form action="{{route('Admin.Banner.EditUpdate')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="EditCollection()" required>
                            <option value="">Seleziona il brand</option>
                            @foreach($brands as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collection" id="collection" class="form-control" onchange="EditBanner()" required>
                            <option value="">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="banner" class=" form-control-label">Banner</label></div>
                    <div class="col-12 col-md-9">
                        <select name="banner" id="banner" class="form-control" required>
                            <option value="">Seleziona il banner </option>
                        </select>
                    </div>
                </div>

                &emsp;

                <div class="row form-group">
                    <div class="col col-md-3"><label for="newbrand" class=" form-control-label">Nuovo Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newbrand" id="newbrand" class="form-control" onchange="EditNewCollection()" required>
                            <option value="">Seleziona il nuovo brand</option>
                            @foreach($brands as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="newcollection" class=" form-control-label">Nuova Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newcollection" id="newcollection" class="form-control" required>
                            <option value="">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="newbanner" class=" form-control-label">Immagine Banner</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="newbanner" name="newbanner" class="form-control-file" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Visibilità nella <br>Home Page</label></div>
                    <div class="col col-md-9">
                        <label class="switch switch-3d switch-primary mr-3">
                            <input type="checkbox" name="visible" class="switch-input" value="true" checked="false">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
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

    </form>

@endsection
