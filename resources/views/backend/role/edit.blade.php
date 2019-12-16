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
            Modifica
        @endslot
        Ruolo
    @endcomponent

    <form action="{{route('Admin.Role.EditPost')}}" method="post" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="role" class=" form-control-label">Ruolo</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_role))
                            <input name="role" value="{{$selected_role->id}}" hidden>
                            <select name="roleDisabled" id="role" class="form-control" disabled>
                                <option value="{{$selected_role->id}}">{{$selected_role->name}}</option>
                            </select>
                        @else
                            <select name="role" id="role" class="form-control" required>
                                <option value="" selected>Seleziona il ruolo</option>
                                @foreach($roles as $role)
                                    @if($role->name != 'cliente')
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                    <div class="col-12 col-md-9">
                        @if(isset($selected_role))
                            <input type="text" id="name" name="name" placeholder="Inserire il nuovo nome del ruolo" class="form-control" value="{{$selected_role->name}}" required>
                        @else
                            <input type="text" id="name" name="name" placeholder="Inserire il nuovo nome del ruolo" class="form-control" required>
                        @endif
                    </div>
                </div>
                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label class=" form-control-label">Gestione</label></div>

                    <!-- SONO FISSI!!!-->

                    <div class="col col-md-9">
                        @if(isset($selected_role))
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="gest_utenti" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_utenti'))
                                            <input type="checkbox" id="gest_utenti" name="gest_utenti" value="gest_utenti" class="form-check-input" checked>Utenti
                                        @else
                                            <input type="checkbox" id="gest_utenti" name="gest_utenti" value="gest_utenti" class="form-check-input">Utenti
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_sito" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_sito'))
                                            <input type="checkbox" id="permissions" name="gest_sito" value="gest_sito" class="form-check-input" checked>Sito
                                        @else
                                            <input type="checkbox" id="permissions" name="gest_sito" value="gest_sito" class="form-check-input">Sito
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_prodotti" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_prodotti'))
                                            <input type="checkbox" id="gest_prodotti" name="gest_prodotti" value="gest_prodotti" class="form-check-input" checked> Prodotti
                                        @else
                                            <input type="checkbox" id="gest_prodotti" name="gest_prodotti" value="gest_prodotti" class="form-check-input"> Prodotti
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_offerte" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_offerte'))
                                            <input type="checkbox" id="gest_offerte" name="gest_offerte" value="gest_offerte" class="form-check-input" checked> Offerte
                                        @else
                                            <input type="checkbox" id="gest_offerte" name="gest_offerte" value="gest_offerte" class="form-check-input"> Offerte
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_banner" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_banner'))
                                            <input type="checkbox" id="gest_banner" name="gest_banner" value="gest_banner" class="form-check-input" checked> Banner
                                        @else
                                            <input type="checkbox" id="gest_banner" name="gest_banner" value="gest_banner" class="form-check-input"> Banner
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_imgprod" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_imgprod'))
                                            <input type="checkbox" id="gest_imgprod" name="gest_imgprod" value="gest_imgprod" class="form-check-input" checked> Immagini Prodotti
                                        @else
                                            <input type="checkbox" id="gest_imgprod" name="gest_imgprod" value="gest_imgprod" class="form-check-input"> Immagini Prodotti
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_fornitori" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_fornitori'))
                                            <input type="checkbox" id="gest_fornitori" name="gest_fornitori" value="gest_fornitori" class="form-check-input" checked> Fornitori
                                        @else
                                            <input type="checkbox" id="gest_fornitori" name="gest_fornitori" value="gest_fornitori" class="form-check-input"> Fornitori
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_newsletter" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_newsletter'))
                                            <input type="checkbox" id="gest_newsletter" name="gest_newsletter" value="gest_newsletter" class="form-check-input" checked> Newsletter
                                        @else
                                            <input type="checkbox" id="gest_newsletter" name="gest_newsletter" value="gest_newsletter" class="form-check-input"> Newsletter
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="gest_assistenza" class="form-check-label">
                                        @if($selected_role->hasPermissionTo('gest_assistenza'))
                                            <input type="checkbox" id="permissions" name="gest_assistenza" value="gest_assistenza" class="form-check-input" checked> Assistenza Clienti
                                        @else
                                            <input type="checkbox" id="permissions" name="gest_assistenza" value="gest_assistenza" class="form-check-input"> Assistenza Clienti
                                        @endif
                                    </label>
                                </div>
                            </div>
                        @else
                            <div class="form-check">
                            <div class="checkbox">
                                <label for="gest_utenti" class="form-check-label">
                                    <input type="checkbox" id="gest_utenti" name="gest_utenti" value="gest_utenti" class="form-check-input">Utenti
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_sito" class="form-check-label">
                                    <input type="checkbox" id="permissions" name="gest_sito" value="gest_sito" class="form-check-input">Sito
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_prodotti" class="form-check-label ">
                                    <input type="checkbox" id="gest_prodotti" name="gest_prodotti" value="gest_prodotti" class="form-check-input"> Prodotti
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_offerte" class="form-check-label ">
                                    <input type="checkbox" id="gest_offerte" name="gest_offerte" value="gest_offerte" class="form-check-input"> Offerte
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_banner" class="form-check-label ">
                                    <input type="checkbox" id="gest_banner" name="gest_banner" value="gest_banner" class="form-check-input"> Banner
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_imgprod" class="form-check-label ">
                                    <input type="checkbox" id="gest_imgprod" name="gest_imgprod" value="gest_imgprod" class="form-check-input"> Immagini Prodotti
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_fornitori" class="form-check-label ">
                                    <input type="checkbox" id="gest_fornitori" name="gest_fornitori" value="gest_fornitori" class="form-check-input"> Fornitori
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_newsletter" class="form-check-label ">
                                    <input type="checkbox" id="gest_newsletter" name="gest_newsletter" value="gest_newsletter" class="form-check-input"> Newsletter
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="gest_assistenza" class="form-check-label ">
                                    <input type="checkbox" id="permissions" name="gest_assistenza" value="gest_assistenza" class="form-check-input"> Assistenza Clienti
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm" onclick="VerifyCheckRole()">
                    <i class="fa fa-dot-circle-o"></i> Modifica
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>

    </form>

@endsection
