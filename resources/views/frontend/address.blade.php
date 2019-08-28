@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>I Miei Indirizzi</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">Indirizzi</li>
                    </ul>
                </div>
            </div>

            <div class="panel-default col-sm-10">
                <h1>Seleziona L'Indirizzo Di Spedizione Preferito</h1>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="existing" name="payment_address" data-id="payment-existing"> Voglio utilizzare un indirizzo esistente </label>
                            </div>
                            <div id="payment-existing">
                                <select class="form-control" name="address_id">
                                    <option selected="selected" value="4">Via, Città, Provincia, Regione, Paese </option>
                                </select>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="new" name="payment_address" data-id="payment-new"> Voglio utilizzare un nuovo indirizzo </label>
                            </div>
                            <br>
                            <div id="payment-new" style="display: none;">
                                <div class="form-group required">
                                    <label for="input-payment-firstname" class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-payment-firstname" placeholder="Nome" value="" name="firstname">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-lastname" class="col-sm-2 control-label">Cognome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-payment-lastname" placeholder="Cognome" value="" name="lastname">
                                    </div>
                                </div>

                                <div class="form-group required">
                                    <label for="input-payment-address-1" class="col-sm-2 control-label">Indirizzo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-payment-address-1" placeholder="Indirizzo" value="" name="address_1">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-city" class="col-sm-2 control-label">Paese</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-payment-city" placeholder="Paese" value="" name="city">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-country" class="col-sm-2 control-label">Regione</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="input-payment-country" name="country_id">
                                            <option value=""> --- Seleziona --- </option>
                                            <option value="1">Abruzzo</option>
                                            <option value="2">Basilicata</option>
                                            <option value="3">Calabria</option>
                                            <option value="4">Campania</option>
                                            <option value="5">Emilia Romagna</option>
                                            <option value="6">Friuli Venezia Giulia</option>
                                            <option value="7">Lazio</option>
                                            <option value="8">Liguria</option>
                                            <option value="9">Lombardia</option>
                                            <option value="10">Marche</option>
                                            <option value="11">Molise</option>
                                            <option value="12">Piemonte</option>
                                            <option value="13">Puglia</option>
                                            <option value="14">Sardegna</option>
                                            <option value="15">Sicilia</option>
                                            <option value="16">Toscana</option>
                                            <option value="17">Trentino Alto Adige</option>
                                            <option value="18">Umbria</option>
                                            <option value="19">Valle D'Aosta</option>
                                            <option value="20">Veneto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-city" class="col-sm-2 control-label">Città</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-payment-city" placeholder="Città" value="" name="city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-payment-postcode" class="col-sm-2 control-label">Codice Postale</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-payment-postcode" placeholder="Codice Postale" value="" name="postcode">
                                    </div>
                                </div>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-address" value="Salva">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection