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

    <form action="{{route('Admin.Offer.EditPost')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_offer))
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" required disabled>
                                <option value="{{$selected_offer->product->collection->brand->id}}">{{$selected_offer->product->collection->brand->name}}</option>
                        @else
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" required>
                                <option value="">Seleziona il brand</option>
                                @foreach($brands as $key => $data)
                                   <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                        @endif
                            </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_offer))
                            <select name="collection" id="collection" class="form-control" onchange="GetProductWithOffer()" required disabled>
                                <option value="{{$selected_offer->product->collection->id}}">{{$selected_offer->product->collection->name}}</option>
                        @else
                            <select name="collection" id="collection" class="form-control" onchange="GetProductWithOffer()" required>
                                <option value="">Seleziona la collezione</option>
                        @endif
                            </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="product" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_offer))
                            <input name="product" value="{{$selected_offer->product->id}}" hidden>
                            <select name="productDisabled" id="product" class="form-control" onchange="GetPrice();GetRate();GetDate();" disabled required>
                                <option value="{{$selected_offer->product->id}}">{{$selected_offer->product->cod}}</option>
                        @else
                            <select name="product" id="product" class="form-control" onchange="GetPrice();GetRate();GetDate();" required>
                                <option value="">Seleziona il prodotto</option>
                        @endif
                            </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class=" form-control-label">Prezzo Non Scontato</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            @if(isset($selected_offer))
                                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                                <input type="text" id="price" name="price" step=".01" placeholder="00.00" class="form-control" disabled="disabled" value="{{$selected_offer->product->price}}">
                            @else
                                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                                <input type="text" id="price" name="price" step=".01" placeholder="00.00" class="form-control" disabled="disabled">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label for="rate" class=" form-control-label">Nuovo Sconto</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            @if(isset($selected_offer))
                                <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                                <input type="text" id="rate" name="rate" placeholder="00" class="form-control" onchange="GetPriceRate()" value="{{$selected_offer->rate}}" required>
                            @else
                                <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                                <input type="text" id="rate" name="rate" placeholder="00" class="form-control" onchange="GetPriceRate()" required>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="pricerate" class="form-control-label">Nuovo Prezzo Scontato</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            @if(isset($selected_offer))
                                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                                <input type="text" id="pricerate" name="pricerate" step=".01" placeholder="00.00" class="form-control" disabled="disabled"  value="{{$selected_offer->calculateDiscount()}}">
                            @else
                                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                                <input type="text" id="pricerate" name="pricerate" step=".01" placeholder="00.00" class="form-control" disabled="disabled">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="datepicker" class=" form-control-label">Data di Fine Offerta</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            @if(isset($selected_offer))
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" id="datepicker" class="form-control" name="datepicker" placeholder="mm/gg/aaaa" value="{{date('m/d/Y', strtotime($selected_offer->end))}}" required>
                            @else
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" id="datepicker" class="form-control" name="datepicker" placeholder="mm/gg/aaaa" required>
                            @endif
                        </div>
                        <small>La data è nel formato inglese: Mese/Giorno/Anno </small>
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
