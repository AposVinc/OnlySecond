@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        Utenti
        @slot('title')
            Utente
        @endslot
        @slot('sez')
            Elimina
        @endslot
    @endcomponent

    <form action="{{route('Admin.User.DeleteDestroy')}}" method="post" class="form-horizontal">
    @csrf
        <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-header">
                <strong>Elimina l'Utente</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="user" class=" form-control-label">Utente</label></div>
                    <div class="col-12 col-md-9">
                        <select name="user" id="user" class="form-control">
                            <option value="0">Seleziona l'Utente</option>
                            @foreach($users as $user)
                                @foreach($user->roles as $role)
                                    @if($role->name != 'cliente'))
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Elimina
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
        <!-- </div>-->
        </form>

@endsection
