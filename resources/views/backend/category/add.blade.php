@extends('backend.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Aggiungi Categoria</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('Admin.Index')}}">Home</a></li>
                        <li>Gestione Categoria</li>
                        <li class="active">Aggiungi Categoria</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('Admin.Category.AddCreate')}}" method="post" class="form-horizontal">
    @csrf
        <div class="card add">
            <div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Categoria</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="nome" placeholder="Inserire il nome della Categoria da aggiungere" class="form-control"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Aggiungi
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
