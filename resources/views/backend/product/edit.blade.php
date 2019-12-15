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
                        @if(isset($selected_product))
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" data-dependent="collection" required disabled>
                                <option value="{{$selected_product->collection->brand->id}}">{{$selected_product->collection->brand->name}}</option>
                        @else
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" data-dependent="collection" required>
                                <option value="">Seleziona il brand</option>
                                   @foreach($brands as $brand)
                                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                                   @endforeach
                        @endif
                            </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <select name="collection" id="collection" class="form-control" onchange="GetProduct()" required disabled>
                                <option value="{{$selected_product->collection->id}}">{{$selected_product->collection->name}}</option>
                        @else
                            <select name="collection" id="collection" class="form-control" onchange="GetProduct()" required>
                                <option value="">Seleziona la collezione</option>
                        @endif
                            </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="product" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input name="product" value="{{$selected_product->id}}" hidden>
                            <select name="productDisabled" id="product" class="form-control" required disabled>
                                <option value="{{$selected_product->id}}">{{$selected_product->cod}}</option>
                        @else
                            <select name="product" id="product" class="form-control" required>
                                <option value="">Seleziona il prodotto</option>
                        @endif
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
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="cod" name="cod" placeholder="Inserisci il codice del prodotto" class="form-control" value="{{$selected_product->cod}}" maxlength="6" required>
                        @else
                            <input type="text" id="cod" name="cod" placeholder="Inserisci il codice del prodotto" class="form-control" maxlength="6" required>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="newbrand" class="form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newbrand" id="newbrand" class="form-control" onchange="GetNewCollection()" required>
                            @if(isset($selected_product))
                                <option value="">Seleziona il brand</option>
                                @foreach($brands as $brand)
                                    @if($brand->id == $selected_product->collection->brand->id)
                                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                    @else
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Seleziona il brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="newcollection" class="form-control-label">Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newcollection" id="newcollection" class="form-control" required>
                            @if(isset($selected_product))
                                <option value="{{$selected_product->collection->id}}">{{$selected_product->collection->name}}</option>
                            @else
                                <option value="">Seleziona la collezione</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Genere</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            @if(isset($selected_product))
                                <label for="inline-radio1" class="form-check-label pr_20">
                                    @if($selected_product->genre == 'M')
                                        <input type="radio" id="inline-radio1" name="inline-radios" value="M" class="form-check-input" checked> M
                                    @else
                                        <input type="radio" id="inline-radio1" name="inline-radios" value="M" class="form-check-input"> M
                                    @endif
                                </label>
                                <label for="inline-radio2" class="form-check-label pr_20">
                                    @if($selected_product->genre == 'F')
                                        <input type="radio" id="inline-radio2" name="inline-radios" value="F" class="form-check-input" checked> F
                                    @else
                                        <input type="radio" id="inline-radio2" name="inline-radios" value="F" class="form-check-input"> F
                                    @endif
                                </label>
                                <label for="inline-radio2" class="form-check-label">
                                    @if($selected_product->genre == 'U')
                                        <input type="radio" id="inline-radio2" name="inline-radios" value="U" class="form-check-input" checked> Unisex
                                    @else
                                        <input type="radio" id="inline-radio2" name="inline-radios" value="U" class="form-check-input"> Unisex
                                    @endif
                                </label>
                            @else
                                <label for="inline-radio1" class="form-check-label pr_20">
                                    <input type="radio" id="inline-radio1" name="inline-radios" value="M" class="form-check-input"> M
                                </label>
                                <label for="inline-radio2" class="form-check-label pr_20">
                                    <input type="radio" id="inline-radio2" name="inline-radios" value="F" class="form-check-input"> F
                                </label>
                                <label for="inline-radio2" class="form-check-label">
                                    <input type="radio" id="inline-radio2" name="inline-radios" value="U" class="form-check-input"> Unisex
                                </label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Categoria di Orologi</label></div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            @if(isset($selected_product))
                                @foreach($categories as $category)
                                    <div class="checkbox">
                                        <label for="{{$category->name}}" class="form-check-label">
                                            @if($selected_product->categories->contains($category))
                                                <input type="checkbox" name="{{$category->id}}" value="{{$category->id}}" class="form-check-input" checked>{{$category->name}}
                                            @else
                                                <input type="checkbox" name="{{$category->id}}" value="{{$category->id}}" class="form-check-input">{{$category->name}}
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                @foreach($categories as $category)
                                    <div class="checkbox">
                                        <label for="{{$category->name}}" class="form-check-label">
                                            <input type="checkbox" name="{{$category->id}}" value="{{$category->id}}" class="form-check-input">{{$category->name}}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="price" class=" form-control-label">Prezzo</label></div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                            @if(isset($selected_product))
                                <input type="text" id="price" name="price" step=".01" placeholder="00.00" class="form-control" value="{{$selected_product->price}}">
                            @else
                                <input type="text" id="price" name="price" step=".01" placeholder="00.00" class="form-control">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="quantity" class=" form-control-label">Quantità disponibile in magazzino</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="quantity" name="quantity" placeholder="Inserire una quantità numerica" class="form-control" value="{{$selected_product->stock_availability}}">
                        @else
                            <input type="text" id="quantity" name="quantity" placeholder="Inserire una quantità numerica" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc" class=" form-control-label">Descrizione</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <textarea name="desc" id="desc" rows="9" placeholder="Inserisci una descrizione..." class="form-control">{{$selected_product->long_desc}}</textarea>
                        @else
                            <textarea name="desc" id="desc" rows="9" placeholder="Inserisci una descrizione..." class="form-control"></textarea>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="color" class=" form-control-label">Colore Principale</label></div>
                    <div class="col-12 col-md-9">
                        <select name="color" id="color" class="form-control">
                            @if(isset($selected_product))
                                <option value="">Seleziona il colore principale</option>
                                @foreach($colors as $color)
                                    @if($color->id == $selected_product->color->id)
                                        <option value="{{$color->id}}" selected>{{$color->name}}</option>
                                    @else
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Seleziona il colore principale</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="supplier" class=" form-control-label">Fornitore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="supplier" id="supplier" class="form-control">
                            @if(isset($selected_product))
                                <option value="">Seleziona il fornitore</option>
                                @foreach($suppliers as $supplier)
                                    @if($supplier->id == $selected_product->supplier->id)
                                        <option value="{{$supplier->id}}" selected>{{$supplier->name}}</option>
                                    @else
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Seleziona il fornitore</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>

            <!--    SPECIFICHE PRODOTTO    -->

            <div class="card-header borderHeader">
                <strong class="card-title">Specifiche prodotto</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="case_size" class=" form-control-label">Dimensione della cassa</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="case_size" name="case_size" placeholder="Inserisci la dimensione della cassa" class="form-control" value="{{$selected_product->specification->case_size}}">
                        @else
                            <input type="text" id="case_size" name="case_size" placeholder="Inserisci la dimensione della cassa" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="material" class=" form-control-label">Materiale della cassa</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="material" name="material" placeholder="Inserisci il materiale della cassa" class="form-control" value="{{$selected_product->specification->material}}">
                        @else
                            <input type="text" id="material" name="material" placeholder="Inserisci il materiale della cassa" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="case_thickness" class=" form-control-label">Spessore della cassa</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="case_thickness" name="case_thickness" placeholder="Inserisci lo spessore della cassa" class="form-control" value="{{$selected_product->specification->case_thickness}}">
                        @else
                            <input type="text" id="case_thickness" name="case_thickness" placeholder="Inserisci lo spessore della cassa" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="glass" class=" form-control-label">Vetro della cassa</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="glass" name="glass" placeholder="Inserisci il vetro della cassa" class="form-control" value="{{$selected_product->specification->glass}}">
                        @else
                            <input type="text" id="glass" name="glass" placeholder="Inserisci il vetro della cassa" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="dial_color" class=" form-control-label">Colore quadrante</label></div>
                    <div class="col-12 col-md-9">
                        <select name="dial_color" id="dial_color" class="form-control">
                            @if(isset($selected_product))
                                <option value="">Inserisci il colore quadrante</option>
                                @foreach($colors as $color)
                                    @if($color->id == $selected_product->specification->dial_color)
                                        <option value="{{$color->id}}" selected>{{$color->name}}</option>
                                    @else
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Inserisci il colore quadrante</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="strap_material" class=" form-control-label">Materiale del cinturino</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="strap_material" name="strap_material" placeholder="Inserisci il materiale del cinturino" class="form-control" value="{{$selected_product->specification->strap_material}}">
                        @else
                            <input type="text" id="strap_material" name="strap_material" placeholder="Inserisci il materiale del cinturino" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="strap_color" class=" form-control-label">Colore del cinturino</label></div>
                    <div class="col-12 col-md-9">
                        <select name="strap_color" id="strap_color" class="form-control">
                            @if(isset($selected_product))
                                <option value="">Inserisci il colore del cinturino</option>
                                @foreach($colors as $color)
                                    @if($color->id == $selected_product->specification->strap_color)
                                        <option value="{{$color->id}}" selected>{{$color->name}}</option>
                                    @else
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Inserisci il colore del cinturino</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="closing" class=" form-control-label">Chiusura del cinturino</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="closing" name="closing" placeholder="Inserisci il tipo di chiusura del cinturino" class="form-control" value="{{$selected_product->specification->closing}}">
                        @else
                            <input type="text" id="closing" name="closing" placeholder="Inserisci il tipo di chiusura del cinturino" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="movement" class=" form-control-label">Tipo di movimento</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="movement" name="movement" placeholder="Inserisci il tipo di movimento" class="form-control" value="{{$selected_product->specification->movement}}">
                        @else
                            <input type="text" id="movement" name="movement" placeholder="Inserisci il tipo di movimento" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="warranty" class=" form-control-label">Garanzia</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_product))
                            <input type="text" id="warranty" name="warranty" placeholder="Inserisci la garanzia" class="form-control" value="{{$selected_product->specification->warranty}}">
                        @else
                            <input type="text" id="warranty" name="warranty" placeholder="Inserisci la garanzia" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Sostituzione batteria</label></div>
                    <div class="col col-md-9">
                        <label class="switch switch-3d switch-primary mr-3">
                            @if(isset($selected_product))
                                @if($selected_product->battery_replacement)
                                    <input type="checkbox" id="battery_replacement" name="battery_replacement" class="switch-input" value="true" checked="true">
                                @else
                                    <input type="checkbox" id="battery_replacement" name="battery_replacement" class="switch-input" value="false" checked="false">
                                @endif
                            @else
                                <input type="checkbox" id="battery_replacement" name="battery_replacement" class="switch-input" value="true" checked="true">
                            @endif
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
