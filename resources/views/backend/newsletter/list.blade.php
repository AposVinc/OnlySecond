@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Newsletters
        @endslot
        @slot('sez')
            Newsletters
        @endslot
        @slot('op')
            Lista Mail
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
                                    <th>Email</th>
                                    <th>Creato il</th>
                                    <th>Ultima modifica</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsletters as $newsletter)
                                    <tr>
                                        <td>{{$newsletter->email}}</td>
                                        <td>{{$newsletter->created_at}}</td>
                                        <td>{{$newsletter->updated_at}}</td>
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
