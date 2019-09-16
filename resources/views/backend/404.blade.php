@extends('backend.layout')

@section('content')

<!-- https://colorlib.com/wp/free-404-error-page-templates/  V4-->

<link type="text/css" rel="stylesheet" href="{{URL::asset('css/frontend/404/style.css')}}" />

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>Oops!</h1>
            <h2>404 - La Pagina Non E' Stata Trovata</h2>
        </div>
        <a href="{{route('Home')}}">Torna Alla Homepage</a>
    </div>
</div>

@endsection
