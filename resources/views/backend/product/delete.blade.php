@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Elimina Prodotto
        @endslot
        Prodotti
    @endcomponent

@endsection
