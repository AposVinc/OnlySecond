@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Offerte
        @endslot
        @slot('sez')
            Offerte
        @endslot
        @slot('op')
            Ripristina
        @endslot
        Offerta
    @endcomponent

    <form action="{{route('Admin.Offer.RestoreRestore')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="EditCollection()" required>
                            <option value="">Seleziona il brand</option>
                            @foreach($brands as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collection" id="collection" class="form-control" onchange="EditProduct()" required>
                            <option value="">Seleziona il collezione</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="product" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        <select name="product" id="product" class="form-control" onchange="EditOfferRestore()" required>
                            <option value="">Seleziona il prodotto</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="offer" class=" form-control-label">Offerta</label></div>
                    <div class="col-12 col-md-9">
                        <select name="offer" id="offer" class="form-control" required>
                            <option value="">Seleziona l'offerta</option>
                        </select>
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


