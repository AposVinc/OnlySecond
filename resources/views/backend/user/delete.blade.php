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
            Elimina
        @endslot
        Utente
    @endcomponent

    <form action="{{route('Admin.User.DeletePost')}}" method="post" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="user" class=" form-control-label">Utente</label></div>
                    <div class="col-12 col-md-9">
                        <select name="user" id="user" class="form-control" required>
                            <option value="">Seleziona l'Utente</option>
                            @foreach($users as $user)
                                @foreach($user->roles as $role)
                                    <option value="{{$user->id}}">{{$user->name}} - {{$role->name}}</option>
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

    </form>

@endsection
