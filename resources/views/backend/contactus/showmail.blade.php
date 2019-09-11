@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Clienti
        @endslot
        @slot('sez')
            Assistenza Clienti
        @endslot
        @slot('op')
            Visiona Singola Mail
        @endslot
    @endcomponent

    <form class="form-horizontal">
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="oggetto" class=" form-control-label">Oggetto</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="oggetto" name="oggetto" placeholder="Inserire oggetto della mail" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="testo" class=" form-control-label">Testo</label></div>
                    <div class="col-12 col-md-9"><textarea name="testo" id="testo" rows="9" placeholder="Inserisci una il testo della mail da mandare..." class="form-control" required></textarea></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Invia
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
        <!-- </div>-->
    </form>

@endsection
