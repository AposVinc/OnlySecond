@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Collezioni
        @endslot
        @slot('op')
            Modifica
        @endslot
        Collezione
    @endcomponent

    <form action="{{route('Admin.Collection.EditPost')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_collection))
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" required disabled>
                                <option value="{{$selected_collection->brand->id}}">{{$selected_collection->brand->name}}</option>
                        @else
                            <select name="brand" id="brand" class="form-control" onchange="GetCollection()" required>
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

                        @if(isset($selected_collection))
                            <input name="collection" value="{{$selected_collection->id}}" hidden>
                            <select name="collectionDisabled" id="collection" class="form-control" disabled required>
                                <option value="{{$selected_collection->id}}">{{$selected_collection->name}}</option>
                        @else
                            <select name="collection" id="collection" class="form-control" required>
                                <option value="">Seleziona la collezione </option>
                        @endif
                            </select>
                    </div>
                </div>

                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label for="newbrand" class=" form-control-label">Nuovo Brand</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_collection))
                            <select name="newbrand" id="newbrand" class="form-control" required>
                                <option value="">Seleziona il nuovo brand</option>
                                @foreach($brands as $brand)
                                    @if($brand->id == $selected_collection->brand->id)
                                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                    @else
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select name="newbrand" id="newbrand" class="form-control" required>
                                <option value="">Seleziona il nuovo brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"> {{$brand->name}} </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="newcollectionname" class=" form-control-label">Nuova Collezione</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_collection))
                            <input type="text" id="newcollectionname" name="newcollectionname" placeholder="Inserire il nome della nuova Collezione" class="form-control" value="{{$selected_collection->name}}" required>
                        @else
                            <input type="text" id="newcollectionname" name="newcollectionname" placeholder="Inserire il nome della nuova Collezione" class="form-control" required>
                        @endif
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
