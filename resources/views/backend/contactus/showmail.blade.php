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
            Mostra
        @endslot
        mail inivata da: {{$mail->name}} <br> il: {{$mail->created_at}}
    @endcomponent

    <form action="{{route('Admin.ContactUS.List')}}" class="form-horizontal">
        <div class="card add">
            <div class="card-body card-block">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="mittente" class=" form-control-label">Mittente</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="mittente" name="mittente" value="{{$mail->name}}" class="form-control" readonly></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email_mittente" class=" form-control-label">Email Mittente</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="email_mittente" name="email_mittente" value="{{$mail->email}}" class="form-control" readonly></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="phone" class=" form-control-label">Cel.</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" value="{{$mail->phone}}" class="form-control" readonly></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="oggetto" class=" form-control-label">Oggetto</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="oggetto" name="oggetto" value="{{$mail->subject}}" class="form-control" readonly></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="testo" class=" form-control-label">Testo</label></div>
                    <div class="col-12 col-md-9"><textarea name="testo" id="testo" rows="9" class="form-control" readonly>{{$mail->message}}</textarea></div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Ritorna alla Lista
                </button>
            </div>
        </div>
    </form>
@endsection
