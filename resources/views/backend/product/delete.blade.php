@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        Brand
        @slot('title')
            Prodotti
        @endslot
        @slot('sez')
            Elimina
        @endslot
    @endcomponent

@endsection
