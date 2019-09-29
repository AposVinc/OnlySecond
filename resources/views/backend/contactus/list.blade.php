@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Clienti
        @endslot
        @slot('sez')
            Assistenza Clienti
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
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Cel.</th>
                                        <th>Oggetto</th>
                                        <th>Inviato il</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($mails as $mail)
                                    <tr>
                                        <td>{{$mail->name}}</td>
                                        <td>{{$mail->email}}</td>
                                        <td>{{$mail->phone}}</td>
                                        <td><u><a href="{{route('Admin.ContactUS.ShowMail',['id' => $mail->id])}}">{{$mail->subject}}</a></u></td>
                                        <td>{{$mail->created_at}}</td>
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
