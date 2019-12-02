@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                Modalità Di Pagamento
            @endcomponent

                <div class="panel-default col-sm-10">
                    <div class="panel-body">
                        <div class="radio mb_20">
                            <label class="label-radio-payments"> <input type="radio" checked="checked" value="existing" name="select_payment" data-id="payment-existing"><span>Seleziona le tue carte di credito preferite</span></label>
                        </div>
                        <form action="{{route('Payment.Favorite')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div id="payment-existing">
                                <div class="form-group">
                                    <label for="creditCard" class="col-sm-3 control-label">Seleziona carta di credito</label>
                                    <div class="col-sm-9 pr_5">
                                        <select class="form-control" id="creditCard" name="creditCard_id">
                                            @foreach(Auth::user()->creditCards()->orderBy('favorite','desc')->get() as $card)
                                                <option value="{{$card->id}}">n° {{$card->numberCard}}, intestatario {{$card->holderCard}}, scadenza {{$card->expirationCard}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="buttons clearfix">
                                    <div class="pull-right pr_5 mt_10">
                                        <button type="submit" class="btn btn-primary btn-sm" title="Salva le tue carte di credito preferite">Salva</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="radio mb_20">
                            <label class="label-radio-payments"><input type="radio" value="new" name="select_payment" data-id="payment-new"><span>Inserisci una nuova carta di credito</span></label>
                        </div>
                        <form action="{{route('Payment.Add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div id="payment-new" style="display: none;">
                                <div class="form-group required">
                                    <label for="name" class="col-sm-3 control-label">Intestatario carta</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="holderCard" placeholder="Intestatario Carta" value="" name="holderCard" required>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="name" class="col-sm-3 control-label">Numero carta</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="numberCard" placeholder="Numero Carta" value="" name="numberCard" required>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="name" class="col-sm-3 control-label">Scadenza carta</label>
                                    <div class="col-sm-1" style="display: inline;">
                                        <input type="text" class="form-control" id="month" placeholder="mm" value="" name="month" required>
                                    </div>
                                    <div class="col-sm-1 pl_0 pr_0" style="margin-right: -90px;">
                                        <label style="padding-top: 7px;">/</label>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" id="year" placeholder="aaaa" value="" name="year" required>
                                    </div>
                                </div>

                                <div class="buttons clearfix">
                                    <div class="pull-right pr_10 mt_10">
                                        <button type="submit" class="btn btn-primary btn-sm" title="Aggiungi la carta di credito">Aggiungi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-body">
                        <div class="radio mb_20">
                            <label class="label-radio-payments"><input type="radio" value="delete" name="select_payment" data-id="payment-delete"><span>Elimina una carta di credito</span></label>
                        </div>
                        <form action="{{route('Payment.Delete')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div id="payment-delete" style="display: none;">
                                <div class="form-group">
                                    <label for="delete_payment" class="col-sm-3 control-label">Indirizzo da eliminare</label>
                                    <div class="col-sm-9 pr_5">
                                        <select class="form-control" id="delete_payment" name="delete_payment">
                                            @foreach(Auth::user()->creditCards()->get() as $card)
                                                <option value="{{$card->id}}">n° {{$card->numberCard}}, intestatario {{$card->holderCard}}, scadenza {{$card->expirationCard}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="buttons clearfix">
                                        <div class="pull-right pr_5 mt_10">
                                            <button type="submit" class="btn btn-primary btn-sm" title="Elimina la carta di credito">Elimina</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
        </div>
    </div>
@endsection
