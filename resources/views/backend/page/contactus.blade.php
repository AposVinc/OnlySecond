@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Sito
        @endslot
        @slot('sez')
            Pagine
        @endslot
        @slot('op')
            Contattaci
        @endslot
    @endcomponent

    <form action="{{route('Admin.Page.ContactUSPost')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="card addProd">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="phone1" class=" form-control-label">1° contatto Telefonico</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="phone1" name="phone1" placeholder="Inserire il numero per farsi contattare dal cliente" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="phone2" class=" form-control-label">2° contatto Telefonico</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="phone2" name="phone2" placeholder="Inserire il numero per farsi contattare dal cliente" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email1" class=" form-control-label">Email di contatto</label></div>
                    <div class="col-12 col-md-9"><input type="email" id="email1" name="email1" placeholder="Inserire la email da fornire all'utente" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email2" class=" form-control-label">Email d'aiuto</label></div>
                    <div class="col-12 col-md-9"><input type="email" id="email2" name="email2" placeholder="Inserire la email da fornire all'utente per Assistenza" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="address" class=" form-control-label">Indirizzo del Negozio</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="Inserire l'indirizzo da fornire al cliente" class="form-control" required></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="checkBtn" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Aggiorna
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>

    </form>

@endsection

