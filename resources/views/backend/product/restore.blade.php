@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Ripristina Prodotto
        @endslot
        Prodotti
    @endcomponent

@endsection
