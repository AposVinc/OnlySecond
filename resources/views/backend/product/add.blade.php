@extends('backend.layout')

@section('content')
    <!-- CODICE e NOME potrebbero esser gestiti o dal clente o all' interno del DB
        per il codice potremmo o fare tutto con l'id autoincrement o calcolare con qualche procedura il codice
        che associa XXYY1234 dove XX sta per il brand YY per il modello e il resto è un numero (il numero dobbiamo definire come)

        il nome  forse non serve scriverlo, abbiamo gia marca e modello
-->
    <!--
        PREZZO
        QUANTITà
        Descrizione
        Brand (aggiungere sez brand nel menù laterale sx)
        Modello
        Categoria
        Colore
        foto principale
        foto aggiuntive
        hidden si/no
    -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Aggiungi Prodotto</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('Admin.Index')}}">Home</a></li>
                        <li>Gestione Prodotti</li>
                        <li class="active">Aggiungi Prodotto</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="checkbox">
                                <label for="checkbox1" class="form-check-label">
                                    <input type="checkbox"  id="checkbox1" name="checkbox1" value="option1" class="form-check-input" >Classic
                                    <!--type="checkbox"-->
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="checkbox2" class="form-check-label ">
                                    <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Digital
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="checkbox3" class="form-check-label ">
                                    <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Waterproof
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="checkbox4" class="form-check-label ">
                                    <input type="checkbox" id="checkbox4" name="checkbox4" value="option4" class="form-check-input"> Smartwatch
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="checkbox5" class="form-check-label ">
                                    <input type="checkbox" id="checkbox5" name="checkbox5" value="option5" class="form-check-input"> Sportivi
                                </label>
                            </div>
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
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Colore</label></div>
                    <div class="col-12 col-md-9"><input type="color" id="color-input" name="color-input" ><!--0class="form-control"--><small class="form-text text-muted">Scegliere il colore dell'orologio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Nascondi dallo Shop</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input"> Si
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;<!-- ho inserito un po di spazio altrimenti il pallino del no era unito al si-->
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input"> No
                            </label>
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
        <!-- </div>-->
    </form>

@endsection

