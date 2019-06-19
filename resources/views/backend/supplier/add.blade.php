@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Fornitori
        @endslot
        @slot('sez')
            Fornitori
        @endslot
        @slot('op')
            Aggiungi
        @endslot
        Fornitore
    @endcomponent

    <form action="{{route('Admin.Supplier.AddCreate')}}" method="post" class="form-horizontal"> <!-- enctype="multipart/form-data" -->
    @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
    <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
        <div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Inserire il nome del Fornitore" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Inserire la email del Fornitore" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="phone" class=" form-control-label">Phone</label></div>
                <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Inserire il numero del Fornitore" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="city" class=" form-control-label">Città</label></div>
                <div class="col-12 col-md-9"><input type="text" id="city" name="city" placeholder="Inserire la città del Fornitore" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="address" class=" form-control-label">Indirizzo</label></div>
                <div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="Inserire l'indirizzo del Fornitore" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="zip" class=" form-control-label">Città</label></div>
                <div class="col-12 col-md-9"><input type="text" id="zip" name="zip" placeholder="Inserire il CAP del Fornitore" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="iban" class=" form-control-label">IBAN</label></div>
                <div class="col-12 col-md-9"><input type="text" id="iban" name="iban" placeholder="Inserire l'IBAN del Fornitore" class="form-control"></div>
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
    <!-- </div>-->

    </form>
@endsection
