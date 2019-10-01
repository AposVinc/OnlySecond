@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Prodotti
        @endslot
        @slot('op')
            Modifica
        @endslot
        Prodotto
    @endcomponent

    <form action="{{route('Admin.Product.EditPost')}}" method="post" class="form-horizontal">
        @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="GetCollection()" data-dependent="collection" required>
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
                        <select name="collection" id="collection" class="form-control" onchange="GetProduct()" required>
                            <option value="">Seleziona la collezione</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="product" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        <select name="product" id="product" class="form-control" required>
                            <option value="">Seleziona il prodotto</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-header borderHeader">
                <strong class="card-title">Info Generali</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="cod" class="form-control-label">Codice</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="cod" name="cod" placeholder="Inserisci il codice del prodotto" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="newbrand" class="form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newbrand" id="newbrand" class="form-control" onchange="GetNewCollection()" required>
                            <option value="">Seleziona il brand</option>
                            @foreach($brands as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="newcollection" class="form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newcollection" id="newcollection" class="form-control" required>
                            <option value="">Seleziona la collezione</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Genere</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label pr_20">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="M" class="form-check-input"> M
                            </label>
                            <label for="inline-radio2" class="form-check-label pr_20">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="F" class="form-check-input"> F
                            </label>
                            <label for="inline-radio2" class="form-check-label">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="U" class="form-check-input"> Unisex
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Categoria di Orologi</label></div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            @foreach($categories as $category)
                                <div class="checkbox">
                                    <label for="{{$category->name}}" class="form-check-label">
                                        <input type="checkbox" name="{{$category->id}}" value="{{$category->id}}" class="form-check-input">{{$category->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class=" form-control-label">Prezzo</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            <input type="text" id="price" name="price" step=".01" placeholder="00.00" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="quantity" class=" form-control-label">Quantità disponibile in magazzino</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="quantity" name="quantity" placeholder="Inserire una quantità numerica" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc" class=" form-control-label">Descrizione</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc" id="desc" rows="9" placeholder="Inserisci una descrizione..." class="form-control"></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="color" class=" form-control-label">Colore Principale</label></div>
                    <div class="col-12 col-md-9">
                        <select name="color" id="color" class="form-control">
                            <option value="">Seleziona il colore principale</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="supplier" class=" form-control-label">Fornitore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="supplier" id="supplier" class="form-control">
                            <option value="">Seleziona il fornitore</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-header borderHeader">
                <strong class="card-title">Specifiche prodotto</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="case_size" class=" form-control-label">Dimensione della cassa</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="case_size" name="case_size" placeholder="Inserisci la dimensione della cassa" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="material" class=" form-control-label">Materiale della cassa</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="material" name="material" placeholder="Inserisci il materiale della cassa" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="case_thickness" class=" form-control-label">Spessore della cassa</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="case_thickness" name="case_thickness" placeholder="Inserisci lo spessore della cassa" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="glass" class=" form-control-label">Vetro della cassa</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="glass" name="glass" placeholder="Inserisci il vetro della cassa" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="dial_color" class=" form-control-label">Colore quadrante</label></div>
                    <div class="col-12 col-md-9">
                        <select name="dial_color" id="dial_color" class="form-control">
                            <option value="">Inserisci il colore quadrante</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="strap_material" class=" form-control-label">Materiale del cinturino</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="strap_material" name="strap_material" placeholder="Inserisci il materiale del cinturino" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="strap_color" class=" form-control-label">Colore del cinturino</label></div>
                    <div class="col-12 col-md-9">
                        <select name="strap_color" id="strap_color" class="form-control">
                            <option value="">Inserisci il colore del cinturino</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="closing" class=" form-control-label">Chiusura del cinturino</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="closing" name="closing" placeholder="Inserisci il tipo di chiusura del cinturino" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="movement" class=" form-control-label">Tipo di movimento</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="movement" name="movement" placeholder="Inserisci il tipo di movimento" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="warranty" class=" form-control-label">Garanzia</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="warranty" name="warranty" placeholder="Inserisci la garanzia" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Sostituzione batteria</label></div>
                    <div class="col col-md-9">
                        <label class="switch switch-3d switch-primary mr-3">
                            <input type="checkbox" id="battery_replacement" name="battery_replacement" class="switch-input" value="true" checked="true">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
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
