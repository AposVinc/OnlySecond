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

    <form action="{{route('Admin.Product.AddCreate')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Codice</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="nome" placeholder="Inserisci il codice del prodotto" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="activeModel()">
                            <!-- onchange serve per attivare il modello dopo aver scelto un brand -->
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
                        <select name="collezione" id="collezione" disabled="disabled" class="form-control" >
                            <option value="0">Seleziona la collezione</option>

                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Inserire il nome" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Genere</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input"> M
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input"> F
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input"> Unisex
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
                                        <input type="checkbox"  id="{{$category->id}}" name="category" value="{{$category->name}}" class="form-check-input" >{{$category->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Prezzo</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            <input type="text" id="input3-group1" name="input3-group1" placeholder="00.00" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- POTREMMO METTERE UN ALTRO TEXT INPUT CON IL PREZZO (TASSE ESCLUSE) CHE VARIA IL NUMERO A SECONDA DI QUANTO SCRITTO NEL PRECEDENTE QUI SOPRA, E VICEVERSA -->
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quantità disponibile in magazzino</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Inserire una quantità numerica" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descrizione</label></div>
                    <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Inserisci una descrizione..." class="form-control"></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto Principale</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Foto Aggiuntive (opzionali)</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="color-input" class=" form-control-label">Colore</label></div>
                    <div class="col-12 col-md-9"><input type="color" id="color-input" name="color-input" ><!--0class="form-control"--><small class="form-text text-muted">Scegliere il colore dell'orologio</small></div>
                </div>
                &emsp;
                <div class="row form-group">
                    <div class="col col-md-3"><label for="supplier" class=" form-control-label">Fornitore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="supplier" id="supplier" class="form-control">
                            <option value="0">Seleziona il fornitore</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
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
        <!-- </div>-->
    </form>

@endsection

