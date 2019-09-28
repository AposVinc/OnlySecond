@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Categorie
        @endslot
        @slot('op')
            Modifica
        @endslot
        Categoria
    @endcomponent

    <form action="{{route('Admin.Category.EditPost')}}" method="post" class="form-horizontal">
    @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="category" class=" form-control-label">Categoria</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Seleziona la categoria</option>
                            @foreach($categories as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label for="newname" class=" form-control-label">Nome Categoria</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="newname" name="newname" placeholder="Inserisci il nuovo nome della categoria" class="form-control" required>
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
