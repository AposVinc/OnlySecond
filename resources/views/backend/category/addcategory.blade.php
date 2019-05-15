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
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Inserire il nome della Categoria da aggiungere" class="form-control"></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-primary btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
    </form>
@endsection