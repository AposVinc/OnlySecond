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
            Elimina
        @endslot
        Ruolo
    @endcomponent

    <form action="{{route('Admin.Role.DeleteDestroy')}}" method="post" class="form-horizontal">
    @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
        <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
            <div class="card-header">
                <strong>Elimina Ruolo</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="role" class=" form-control-label">Ruolo</label></div>
                    <div class="col-12 col-md-9">
                        <select name="role" id="role" class="form-control">
                            <option value="0">Seleziona il Fornitore</option>
                            @foreach($roles as $role)
                                @if($role->name != 'cliente')
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endif
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
