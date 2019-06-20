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
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                    <th>Eliminato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @foreach($user->roles as $role)
                                        @if($role->name != 'cliente')
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>{{$user->updated_at}}</td>
                                                <td>{{$user->deleted_at}}</td>
                                            </tr>
                                        @endif
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
