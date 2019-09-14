@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Utenti
        @endslot
        @slot('sez')
            Utente
        @endslot
        @slot('op')
            Modifica
        @endslot
        Utente
    @endcomponent

    <form action="{{route('Admin.User.EditPost')}}" method="post" class="form-horizontal">
    @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="user" class=" form-control-label">Utente</label></div>
                    <div class="col-12 col-md-9">
                        <select name="user" id="user" class="form-control" required>
                            <option value="" selected>Seleziona l'Utente</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <small class="help-block form-text">Seleziona l'Utente da modificare</small>
                    </div>
                </div>

                &emsp;

                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Inserire il nuovo nome" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Inserire la nuova email" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password" class=" form-control-label">Password</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="password" name="password" placeholder="Inserire la nuova password" class="form-control" required></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="role" class=" form-control-label">Ruolo</label></div>
                    <div class="col-12 col-md-9">
                        <select name="role" id="role" class="form-control" required>
                            <option value="">Seleziona il ruolo</option>
                            @foreach($roles as$role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
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
