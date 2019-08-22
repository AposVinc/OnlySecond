@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Immagini
        @endslot
        @slot('sez')
            Banner
        @endslot
        @slot('op')
            Aggiungi
        @endslot
        Banner
    @endcomponent

    <form action="{{route('Admin.Banner.AddCreate')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control" onchange="AddBanner()" data-dependent="collection" required>
                            <option value="">Seleziona il brand</option>
                            @foreach($brands as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="collection" class=" form-control-label" >Collezione</label></div>
                    <div class="col-12 col-md-9">
                        <select name="collection" id="collection" class="form-control" required>
                            <option value="">Seleziona la collezione </option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Immagine Banner</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file" name="file" class="form-control-file" required></div>
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
    <script>
        function AddBanner(){
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

    </script>
@endsection
