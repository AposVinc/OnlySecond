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
            Modifica
        @endslot
        Offerta
    @endcomponent

    <form action="{{route('Admin.Offer.EditUpdate')}}" method="post" class="form-horizontal">
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
                        <select name="collection" id="collection" class="form-control" onchange="EditProductWithOffer()" required>
                            <option value="">Seleziona il collezione</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="product" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        <select name="product" id="product" class="form-control" onchange="EditRate();EditPrice();EditDate();" required>
                            <option value="">Seleziona il prodotto</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class=" form-control-label">Prezzo Non Scontato</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            <input type="text" id="price" name="price" step=".01" placeholder="00.00" class="form-control" disabled="disabled">
                        </div>
                    </div>
                </div>

                &emsp;

                <div class="row form-group">
                    <div class="col col-md-3"><label for="rate" class=" form-control-label">Nuovo Sconto</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                            <input type="text" id="rate" name="rate" placeholder="00" class="form-control" onchange="EditPriceRate()" required>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="pricerate" class="form-control-label">Nuovo Prezzo Scontato</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            <input type="text" id="pricerate" name="pricerate" step=".01" placeholder="00.00" class="form-control" disabled="disabled">
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="datepicker" class=" form-control-label">Data di Fine Offerta</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" id="datepicker" class="form-control" name="datepicker" placeholder="mm/gg/aaaa" required >
                        </div>
                        <small>La data è nel formato inglese: Mese/Giorno/Anno </small>
                    </div>
                </div>
                <script>
                    $( function() {
                        $( "#datepicker" ).datepicker();
                    } );
                </script>

            </div>
            <div class="card-footer">
                <button type="submit" onclick="EnablePriceRate()" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Modifica
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>
@endsection
