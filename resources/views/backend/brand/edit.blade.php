@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Brand
        @endslot
        @slot('sez')
            Brand
        @endslot
        @slot('op')
            Modifica
        @endslot
        Brand
    @endcomponent

    <form action="{{route('Admin.Brand.EditPost')}}" enctype="multipart/form-data" method="post" class="form-horizontal">
    @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="brand" class=" form-control-label">Brand</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_brand))
                            <input name="brand" value="{{$selected_brand->id}}" hidden>
                            <select name="brandDisabled" id="brand" class="form-control" required disabled>
                                <option value="{{$selected_brand->id}}">{{$selected_brand->name}}</option>
                        @else
                            <select name="brand" id="brand" class="form-control" required>
                                <option value="">Seleziona il brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                        @endif
                            </select>
                    </div>
                </div>

                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label for="newname" class=" form-control-label">Nome Brand</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_brand))
                            <input type="text" id="newname" name="newname" placeholder="Inserisci il nuovo nome del brand" class="form-control" value="{{$selected_brand->name}}" required>
                        @else
                            <input type="text" id="newname" name="newname" placeholder="Inserisci il nuovo nome del brand" class="form-control" required>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control-file" required></div>
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
