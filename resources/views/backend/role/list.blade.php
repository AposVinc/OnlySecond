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
            Lista
        @endslot
        Ruoli
    @endcomponent

    @component('backend.dialogDelete')
        @slot('title')
            Ruolo
        @endslot
        @slot('content')
            questo ruolo
        @endslot
    @endcomponent

    @component('backend.dialogRestore')
        @slot('title')
            Ruolo
        @endslot
        @slot('content')
            questo ruolo
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
                                    <th>Gest Utenti</th>
                                    <th>Gest Sito</th>
                                    <th>Gest Prod.</th>
                                    <th>Gest Off.</th>
                                    <th>Gest Banner</th>
                                    <th>Gest Img Prod.</th>
                                    <th>Gest Fornitori</th>
                                    <th>Gest Newsletter</th>
                                    <th>Ass. Clienti</th>
                                    <th>Creato il</th>
                                    <th>Ult. mod.</th>
                                    <th>Azioni</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                            @if($role->hasPermissionTo('gest_utenti'))  <td class="centre-text-cell"><i class="fa fa-check-square-o">
                                                <input value="1" hidden>
                                            </i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_sito'))  <td class="centre-text-cell"><i class="fa fa-check-square-o">
                                                <input value="1" hidden>
                                            </i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_prodotti'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_offerte'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_banner'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_imgprod'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_fornitori'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_newsletter'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_assistenza'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                        <td>{{$role->created_at}}</td>
                                        <td>{{$role->updated_at}}</td>
                                        <td>
                                            <a href="{{route('Admin.Role.EditButton',$role->name)}}"><i class="fa fa-edit" style="color: darkblue"></i></a>
                                            <a id="iconDelete" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.Role.DeleteButton',$role->name)}}" style="cursor: pointer">
                                                <i class="fa fa-minus-square" style="color: #cc0000"></i>
                                            </a>
                                        </td>
                                    </tr>
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
