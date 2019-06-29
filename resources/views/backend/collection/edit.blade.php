@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Collezioni
        @endslot
        @slot('op')
            Modifica
        @endslot
        Collezione
    @endcomponent

    <form action="{{route('Admin.Collection.EditUpdate')}}" method="post" class="form-horizontal">
        @csrf

        <div class="card add">
            <div class="card-body card-block">


                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control dynamic" data-dependent="collection" required>
                            <option value="">Seleziona il brand</option>
                            @foreach($brands as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collection" id="collection" class="form-control" required>
                            <option value="0">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Nuovo Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newbrand" id="brand" class="form-control " data-dependent="collection" required>

                            <option value="">Seleziona il nuovo brand</option>
                            @foreach($brands as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nuovo Nome</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="newcollectionname" placeholder="Inserire il nome della nuova Collezione" class="form-control" required></div>
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
