@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Modifica Utente
        @endslot
        Utenti
    @endcomponent

    <form action="{{route('Admin.User.EditUpdate')}}" method="post" class="form-horizontal">
    @csrf
        <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="user" class=" form-control-label">Fornitore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="user" id="user" class="form-control">
                            <option value="0" selected>Seleziona il fornitore</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <small class="help-block form-text">Seleziona il fornitore da modificare</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="name" name="name" placeholder="Inserire il nome del Fornitore" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input value="" type="email" id="email" name="email" placeholder="Inserire la email del Fornitore" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password" class=" form-control-label">Città</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="password" name="password" placeholder="Inserire il password del Fornitore" class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Ruolo</label></div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            @foreach($roles as $role)
                                <div class="radio">
                                    <label for="{{$role->name}}" class="form-check-label ">
                                        <input type="radio" id="{{$role->name}}" name="role" value="{{$role->name}}" class="form-check-input">{{$role->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
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
        <!-- </div>-->
    </form>

@endsection
