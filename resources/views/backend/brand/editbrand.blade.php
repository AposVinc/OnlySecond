@extends('backend.layout')

@section('content')
    <form action="{{route('admin.editbrandupdate')}}" method="post" class="form-horizontal">
    @csrf
        <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-header">
                <strong>Modifica Brand</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="showName()">
                            <option value="0">Seleziona il brand</option>
                            @foreach($brand as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        <small class="help-block form-text">Seleziona il brand da modificare</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Brand</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="text-input newname" name="newname" placeholder="Selezionare il Brand da modificare" class="form-control">
                        <small class="help-block form-text">Inserisci il nuovo nome da assegnare al brand</small>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
        <!-- </div>-->
    </form>

@endsection
