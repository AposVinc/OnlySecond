@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Utenti
        @endslot
        @slot('sez')
            Utenti
        @endslot
        @slot('op')
            Lista
        @endslot
        Utenti
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Utente
        @endslot
        @slot('content')
            questo utente
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Utente
        @endslot
        @slot('content')
            questo utente
        @endslot
    @endcomponent

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ruolo</th>
                                        <th>Email</th>
                                        <th>Creato il</th>
                                        <th>Ultima modifica</th>
                                        <th>Disattivato il</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @foreach($user->roles as $role)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td>{{$user->deleted_at}}</td>
                                            <td>
                                                @if (!$user->trashed())
                                                    <a href="{{route('Admin.User.EditButton',$user->email)}}"><i class="fa fa-edit" style="color: darkblue"></i></a>
                                                    <a id="iconDelete" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.User.DeleteButton',$user->email)}}" style="cursor: pointer">
                                                        <i class="fa fa-minus-square" style="color: #cc0000"></i>
                                                    </a>
                                                @else
                                                    <a id="iconRestore" data-toggle="modal" data-target="#restoreModal" data-url="{{route('Admin.User.RestoreButton',$user->email)}}" style="cursor: pointer">
                                                        <i class="fa fa-refresh" style="color: green"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
