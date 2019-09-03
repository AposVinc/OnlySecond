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
            Aggiungi
        @endslot
        Prodotto
    @endcomponent

    <div id="error">    <!-- errore gestito con JS-->
    </div>

    <form action="{{route('Admin.Product.AddCreate')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="cod" class=" form-control-label">Codice</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="cod" name="cod" placeholder="Inserisci il codice del prodotto" class="form-control" required></div>
                </div>
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
                        <select name="collection" id="collection" class="form-control" required>
                            <option value="">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Genere</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label " >
                                <input type="radio" id="inline-radio1" name="inline-radios" value="M" class="form-check-input" required> M
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="F" class="form-check-input" required> F
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="U" class="form-check-input" required> Unisex
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
                                        <input type="checkbox" id="{{$category->id}}" name="category" value="{{$category->name}}" class="form-check-input">{{$category->name}}
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
                            <input type="text" id="price" name="price" step=".01" value="00.00" placeholder="00.00" class="form-control" required>
                        </div>
                    </div>
                </div>
                <!-- POTREMMO METTERE UN ALTRO TEXT INPUT CON IL PREZZO (TASSE ESCLUSE) CHE VARIA IL NUMERO A SECONDA DI QUANTO SCRITTO NEL PRECEDENTE QUI SOPRA, E VICEVERSA -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="quantity" class=" form-control-label">Quantità disponibile in magazzino</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="quantity" name="quantity" placeholder="Inserire una quantità numerica" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc" class=" form-control-label">Descrizione</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc" id="desc" rows="9" placeholder="Inserisci una descrizione..." class="form-control" required></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="main-photo" class=" form-control-label">Foto Principale</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="main-photo" name="main-photo" class="form-control-file" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="other-photo" class=" form-control-label">Foto Aggiuntive (opzionali)</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="other-photo" name="other-photo" multiple="" class="form-control-file"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="color" class=" form-control-label">Colore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="color" id="color" class="form-control" required>
                            <option value="">Seleziona il colore</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                &emsp;
                <div class="row form-group">
                    <div class="col col-md-3"><label for="supplier" class=" form-control-label">Fornitore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="supplier" id="supplier" class="form-control" required>
                            <option value="">Seleziona il fornitore</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="checkBtn" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Aggiungi
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
        <!-- </div>-->
    </form>

@endsection

