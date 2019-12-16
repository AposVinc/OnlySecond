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
            Mostra
        @endslot
        Banner in Home
    @endcomponent

    <form action="{{route('Admin.Banner.EditPost')}}" method="post" class="form-horizontal">
    @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_banner))
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" disabled>
                                <option value="{{$selected_banner->collection->brand->id}}">{{$selected_banner->collection->brand->name}}</option>
                            </select>
                        @else
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" required>
                                <option value="">Seleziona il brand</option>
                                @foreach($brands as $data)
                                    <option value="{{$data->id}}"> {{$data->name}} </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_banner))
                            <select name="collection" id="collection" class="form-control" onchange="GetBanner()" required>
                                <option value="{{$selected_banner->collection->id}}">{{$selected_banner->collection->name}}</option>
                            </select>
                        @else
                            <select name="collection" id="collection" class="form-control" onchange="GetBanner()" required>
                                <option value="">Seleziona la collezione </option>
                            </select>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="banner" class=" form-control-label">Banner</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_banner))
                            <input name="banner" value="{{$selected_banner->id}}" hidden>
                            <select name="bannerDisabled" id="banner" class="form-control" required>
                                <option value="{{$selected_banner->id}}">{{$selected_banner->path_image}} </option>
                            </select>
                        @else
                            <select name="banner" id="banner" class="form-control" required>
                                <option value="">Seleziona il banner </option>
                            </select>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Mostra nella<br>Home Page</label></div>
                    <div class="col col-md-9">
                        <label class="switch switch-3d switch-primary mr-3">
                            @if(isset($selected_banner))
                                @if($selected_banner->visible == 1)
                                    <input id="visible" name="visible" type="checkbox" class="switch-input" value="true" checked="true">
                                @else
                                    <input id="visible" name="visible" type="checkbox" class="switch-input" value="false">
                                @endif
                            @else
                                <input id="visible" name="visible" type="checkbox" class="switch-input" value="true">
                            @endif
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
