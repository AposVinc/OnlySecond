@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Brand
        @endslot
        @slot('op')
            Mostra
        @endslot
        Brand
    @endcomponent

    <form action="{{route('Admin.Banner.List')}}" class="form-horizontal">
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <img src="{{asset($banner->image)}}">
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
