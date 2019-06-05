@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Aggiungi Categoria
        @endslot
        Categorie
    @endcomponent

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
