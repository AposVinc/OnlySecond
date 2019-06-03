@extends('backend.layout')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Modifica Categoria</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('Admin.Index')}}">Home</a></li>
                        <li>Gestione Categorie</li>
                        <li class="active">Modifica Categoria</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('admin.Category.EditUpdate')}}" method="post" class="form-horizontal">
    @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="category" class=" form-control-label">Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category" id="category" class="form-control" onchange="showName()">
                            <option value="0">Seleziona la Categoria</option>
                            @foreach($categories as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        <small class="help-block form-text">Seleziona la categoria da modificare</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Categoria</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="text-input newname" name="newname" placeholder="Inserisci il nuovo nome della categoria" class="form-control">
                        <small class="help-block form-text">Inserisci il nuovo nome da assegnare alla categoria</small>
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
