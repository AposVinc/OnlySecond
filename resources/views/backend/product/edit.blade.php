@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Modifica Prodotto
        @endslot
        Prodotti
    @endcomponent

@endsection
