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
            Aggiungi
        @endslot
        Brand
    @endcomponent

    <form action="{{route('Admin.Brand.AddCreate')}}" enctype="multipart/form-data" method="post" class="form-horizontal">
        @csrf

        <div class="card add">
            <div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="newbrand" class=" form-control-label">Nome Brand</label></div>
                        <div class="col-12 col-md-9"><input type="text" value="" id="newbrand" name="newbrand" placeholder="Inserire il nome del Brand da aggiungere" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control-file" required></div>
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
        </div>

    </form>

@endsection
