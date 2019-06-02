@extends('backend.layout')

@section('content')

    <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Aggiungi Sconto</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('Admin.Index')}}">Home</a></li>
                    <li>Gestione Sconto</li>
                    <li class="active">Aggiungi Sconto</li>
                </ol>
            </div>
        </div>
    </div>
    </div>
    <form action="{{route('Admin.Discount.AddCreate')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card add">
            <div class="card-header">
                <strong>Aggiungi Sconto</strong>
            </div>
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
                    <div class="col col-md-3"><label for="modello" class=" form-control-label">Modello</label></div>
                    <div class="col-12 col-md-9">
                        <select name="modello" id="modello" disabled="disabled" class="form-control" >
                            <option value="0">Seleziona il modello</option>

                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Categoria di Orologi</label></div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            <div class="checkbox">
                                <label for="checkbox1" class="form-check-label">
                                    <input type="checkbox"  id="checkbox1" name="checkbox1" value="option1" class="form-check-input" >Classic

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
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sconto</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                            <input type="text" id="input3-group1" name="input3-group1" placeholder="00" class="form-control">
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

