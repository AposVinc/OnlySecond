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
                                    <th>Gest Prodotti</th>
                                    <th>Gest Offerte</th>
                                    <th>Gest Banner</th>
                                    <th>Gest Img Prodotti</th>
                                    <th>Gest Fornitori</th>
                                    <th>Gest Newsletter</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        @if($role->hasPermissionTo('gest_utenti'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_prodotti'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_offerte'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_banner'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_imgprod'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_fornitori'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                            @if($role->hasPermissionTo('gest_newsletter'))  <td class="centre-text-cell"><i class="fa fa-check-square-o"></i></td> @else <td class="centre-text-cell"><i class="fa fa-square-o"></i></td> @endif
                                        <td>{{$role->created_at}}</td>
                                        <td>{{$role->updated_at}}</td>
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
