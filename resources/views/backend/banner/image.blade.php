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
        Immagine Banner
    @endcomponent

    <form action="{{route('Admin.Banner.List')}}" class="form-horizontal">
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <img src="{{asset($banner->path_image)}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Ritorna alla Lista
                </button>
            </div>
        </div>

    </form>

@endsection
