@extends('backend.layout')
@section('content')
    <form action="{{route('admin.restoreCategoryRestore')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card add">
            <strong>Ripristina Categoria</strong>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3"><label for="category" class=" form-control-label">Categorie</label></div>
                <div class="col-12 col-md-9">
                    <select name="category" id="category" class="form-control" onchange="showName()">
                        <option value="0">Seleziona la categoria</option>
                        @foreach($categories as $key => $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                    <small class="help-block form-text">Seleziona la categoria da ripristinare</small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Ripristina
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
        </div>
    </form>
@endsection


