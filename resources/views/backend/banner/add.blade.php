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
            Aggiungi
        @endslot
        Banner
    @endcomponent

    <div id="error">

    </div>

    <form action="{{route('Admin.Banner.AddPost')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="GetCollection()" required>
                            <option value="">Seleziona il brand</option>
                            @foreach($brands as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label" >Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collection" id="collection" class="form-control" required>
                            <option value="">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file" class=" form-control-label">Immagine</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file" name="file" class="form-control-file" required></div>
                </div>
                <div class="row form-group mt_20">
                    <div class="col-lg-5">
                        <div class="col col-md-5"><label class=" form-control-label">Mostra nella<br>Home Page</label></div>
                        <div class="col col-md-7">
                            <label class="switch switch-3d switch-primary mr-3">
                                <input type="checkbox" id="visible" name="visible" class="switch-input" value="true">
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col col-md-5"><label class="form-control-label">Banner</label></div>
                        <div class="col col-md-7">
                            <label class="switch switch-3d switch-primary mr-3">
                                <input type="checkbox" id="visible" name="visible" class="switch-input" value="true">
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col col-md-8"><label class="form-control-label">Sub Banner</label></div>
                        <div class="col col-md-4">
                            <label class="switch switch-3d switch-primary mr-3">
                                <input type="checkbox" id="visible" name="visible" class="switch-input" value="true">
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Aggiungi
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>

@endsection
