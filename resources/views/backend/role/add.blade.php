@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Utenti
        @endslot
        @slot('sez')
            Ruoli
        @endslot
        @slot('op')
            Aggiungi
        @endslot
        Ruolo
    @endcomponent

    <form action="{{route('Admin.Role.AddPost')}}" method="post" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Inserire il nome" class="form-control" required></div>
                </div>
                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label class=" form-control-label">Gestione</label></div>

                    <!-- SONO FISSI!!!-->

                    <div class="col col-md-9">
                        <div class="form-check">
                            <div class="checkbox">
                                <label for="gest_utenti" class="form-check-label">
                                    <input type="checkbox" id="permissions" name="gest_utenti" value="gest_utenti" class="form-check-input">Utenti
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_sito" class="form-check-label">
                                    <input type="checkbox" id="permissions" name="gest_sito" value="gest_sito" class="form-check-input">Sito
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_prodotti" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_prodotti" value="gest_prodotti" class="form-check-input"> Prodotti
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_offerte" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_offerte" value="gest_offerte" class="form-check-input"> Offerte
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_banner" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_banner" value="gest_banner" class="form-check-input"> Banner
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_imgprod" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_imgprod" value="gest_imgprod" class="form-check-input"> Immagini Prodotti
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_fornitori" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_fornitori" value="gest_fornitori" class="form-check-input"> Fornitori
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_newsletter" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_newsletter" value="gest_newsletter" class="form-check-input"> Newsletter
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_assistenza" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_assistenza" value="gest_assistenza" class="form-check-input"> Assistenza Clienti
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm" onclick="VerifyCheckRole()">
                    <i class="fa fa-dot-circle-o"></i> Aggiungi
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>

    </form>

@endsection
