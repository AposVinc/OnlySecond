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

    <form action="{{route('Admin.Product.EditUpdate')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="EditCollection()" data-dependent="collection" required>  <!-- onchange="activeModel();" -->
                            <!-- activemodel serve per attivare il modello dopo aver scelto un brand -->
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
                        <select name="collection" id="collection" class="form-control" onchange="EditProduct()"> <!-- disabled="disabled" onchange="activeModel();" -->
                            <option value="">Seleziona la collezione</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="product" class=" form-control-label">Prodotto</label></div>
                    <div class="col-12 col-md-9">
                        <select name="product" id="product" class="form-control"> <!-- disabled="disabled" -->
                            <option value="">Seleziona il prodotto</option>
                        </select>
                    </div>
                </div>
                <!-- ------------------------------------------------------------>
                &emsp;

                <div class="row form-group">
                    <div class="col col-md-3"><label for="cod" class="form-control-label">Codice</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="cod" name="cod" placeholder="Inserisci il codice del prodotto" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="newbrand" class="form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="newbrand" id="newbrand" class="form-control" onchange="EditNewCollection()">
                            <!-- onchange serve per attivare il modello dopo aver scelto un brand -->
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
                        <select name="newcollection" id="newcollection" class="form-control" required>  <!-- disabled="disabled" -->
                            <option value="">Seleziona la collezione</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Genere</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input" required> M
                            </label>

                            &emsp;

                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" required> F
                            </label>

                            &emsp;

                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" required> Unisex
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
                                        <input type="checkbox"  id="{{$category->id}}" name="category" value="{{$category->name}}" class="form-check-input">{{$category->name}}
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
                            <input type="text" id="price" name="input3-group1" placeholder="00.00" class="form-control" required>
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
                    <div class="col-12 col-md-9"><input type="file" id="fother-photo" name="other-photo" multiple="" class="form-control-file"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="color-input" class=" form-control-label">Colore</label></div>
                    <div class="col-12 col-md-9"><input type="color" id="color-input" name="color-input" required><!--0class="form-control"--><small class="form-text text-muted">Scegliere il colore dell'orologio</small></div>
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
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Aggiungi
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>

    <script>
        function EditCollection(){
            var selectCollection = document.getElementById('collection');
            selectCollection.options.length = 0;
            var option = document.createElement('option');
            option.text= "Seleziona la collezione";
            selectCollection.add(option);
            var data;
            var selected = document.getElementById('brand');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetCollection') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    data=result;
                    data.forEach(AddOptionCollection);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });

        }

        function AddOptionCollection(item, index) {
            var selectCollection = document.getElementById('collection');
            var option = document.createElement('option');
            option.text= item.name;
            option.value= item.id;
            selectCollection.add(option);
        }


        function EditProduct(){
            var selectProduct = document.getElementById('product');
            selectProduct.options.length = 0;
            var option = document.createElement('option');
            option.text= "Seleziona il prodotto";
            selectProduct.add(option);
            var data;
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetProduct') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    data=result;
                    alert(data);
                    data.forEach(AddOptionProduct);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });

        }

        function AddOptionProduct(item, index) {
            var selectProduct = document.getElementById('product');
            var option = document.createElement('option');
            option.text= item.cod;
            option.value= item.id;
            selectProduct.add(option);
        }


        function EditNewCollection(){
            var selectCollection = document.getElementById('newcollection');
            selectCollection.options.length = 0;
            var option = document.createElement('option');
            option.text= "Seleziona la collezione";
            selectCollection.add(option);
            var data;
            var selected = document.getElementById('newbrand');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetCollection') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    data=result;
                    data.forEach(AddOptionNewCollection);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }

        function AddOptionNewCollection(item, index) {
            var selectCollection = document.getElementById('newcollection');
            var option = document.createElement('option');
            option.text= item.name;
            option.value= item.id;
            selectCollection.add(option);
        }

    </script>

@endsection
