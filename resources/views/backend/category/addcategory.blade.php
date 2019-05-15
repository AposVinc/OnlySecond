@extends('backend.layout')

@section('content')
    <form action="{{route('admin.addCategoryCreate')}}" method="post" class="form-horizontal">
    @csrf

    <div class="card add">
        <div class="card-header">
            <strong>Aggiungi Categoria</strong>
        </div>
        <div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for=text-input" class="form-control-label">Nome Categoria</label></div>

