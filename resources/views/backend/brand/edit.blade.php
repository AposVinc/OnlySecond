@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Brand
        @endslot
        @slot('op')
            Modifica
        @endslot
        Brand
    @endcomponent

    <form action="{{route('Admin.Brand.EditUpdate')}}" method="post" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" required>
                            <option value="">Seleziona il brand da modificare</option>
                            @foreach($brands as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                &emsp;

                <div class="row form-group">
                    <div class="col col-md-3"><label for="newname" class=" form-control-label">Nome Brand</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="newname" name="newname" placeholder="Inserisci il nuovo nome del brand" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control-file"></div>
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
