@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Aggiungi Offerta
        @endslot
        Offerte
    @endcomponent

    <form action="{{route('Admin.Offer.AddCreate')}}" method="post" class="form-horizontal">
    @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="activeModel()">
                            <option value="0">Seleziona il brand</option>
                            @foreach($brands as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collezione" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collezione" id="collezione" class="form-control" >
                            <option value="0">Seleziona il collezione</option>

                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="prodotto" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        <select name="prodotto" id="prodotto" class="form-control" >
                            <option value="0">Seleziona il prodotto</option>

                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Prezzo Non Scontato</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            <input type="text" id="input3-group1" name="input3-group1" placeholder="00.00" class="form-control" disabled="disabled">
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sconto</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                            <input type="text" id="input3-group1" name="input3-group1" placeholder="00" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Prezzo Scontato</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            <input type="text" id="input3-group1" name="input3-group1" placeholder="00.00" class="form-control" disabled="disabled">
                        </div>
                    </div>
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
    </form>
@endsection
