@extends('frontend.layout')

@section('content')

<div class="container">
    <div class="row ">

        @component('frontend.partials.breadcrumbshome')
            Checkout
        @endcomponent

        <div class="col-lg-12 mtb_20">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Step 1: Dettagli Spedizione <i class="fa fa-caret-down"></i></a></h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="shipping_address"> Voglio utilizzare un indirizzo esistente </label>
                                </div>
                                <div id="shipping-existing">
                                    <select class="form-control" name="address_id">
                                        <option selected="selected" value="4">Via, Città, Provincia, Regione, Paese</option>
                                    </select>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="shipping_address"> Voglio utilizzare l'indirizzo di fatturazione </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="new" name="shipping_address"> Voglio utilizzare un nuovo indirizzo </label>
                                </div>
                                <br>
                                <div id="shipping-new" style="display: none;">
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
                                <p><strong>Aggiungi informazioni aggiuntive per la spedizione</strong></p>
                                <p>
                                    <textarea class="form-control" rows="8" name="comment">es. Palazzo A, Scala B, Terzo Piano...</textarea>
                                </p>
                                <div class="buttons clearfix">
                                    <div class="pull-right">
                                        <input type="button" class="btn" data-loading-text="Loading..." id="button-shipping-address" value="Continua">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Step 2: Metodo Di Consegna <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Per favore seleziona il tuo metodo di consegna preferito per questo ordine.</p>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="flat.flat" name="shipping_method"> Spedizione Standard - 5.00€ (4-5 giorni lavorativi)
                                    <p>Con ordine superiore a 250,00€, spedizione standard - 0,00€</p>

                                    <input type="radio" checked="checked" value="flat.flat" name="shipping_method"> Spedizione Rapida - 10.00€ (2 giorni lavorativi)
                                </label>
                            </div>

                            <div class="buttons">
                                <div class="pull-right">
                                    <input type="button" class="btn mt_20" data-loading-text="Loading..." id="button-shipping-method" value="Continua">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Step 3: Metodo Di Pagamento <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Per favore seleziona il metodo di pagamento che preferisci utilizzare per quest'ordine</p>

                            <div class="radio">
                                <label>
                                    <input type="radio" checked="checked" value="cod" name="payment_method"> Pagamento con Bonifico </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="new" value="cod" name="payment_method"> Pagamento con Paypal </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="new" value="cod" name="payment_method"> Pagamento con Carta Di Credito </label>
                            </div>

                            <div class="buttons">
                                <div class="pull-right mt_20">Ho letto E Accetto I <a class="agree" href="#"><b>Termini E Le Condizioni</b></a>
                                    <input type="checkbox" value="1" name="agree"> &nbsp;
                                    <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-method" value="Continua">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Step 4: Indirizzo Di Fatturazione <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
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
                                        <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-address" value="Continua">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Step 5: Regalo <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="new" value="cod" name="payment_method"> Regala questo/i articolo/i </label>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-address" value="Continua">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Step 6: Conferma l'ordine <i class="fa fa-caret-down"></i></a> </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-left"><strong>Nome del prodotto</strong></td>
                                        <td class="text-left"><strong>Brand</strong></td>
                                        <td class="text-left"><strong>Categoria</strong></td>
                                        <td class="text-right"><strong>Genere</strong></td>
                                        <td class="text-right"><strong>Colore</strong></td>
                                        <td class="text-right"><strong>Prezzo</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-left"><a href="http://localhost/opc001/index.php?route=product/product&amp;product_id=46">Orologio Breil</a></td>
                                        <td class="text-left">Breil</td>
                                        <td class="text-left">64983</td>
                                        <td class="text-right">Donna</td>
                                        <td class="text-right">Nero</td>
                                        <td class="text-right">200,00€</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="5"><strong>Prezzo:</strong></td>
                                        <td class="text-right">200,00€</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="5"><strong>Costo di spedizione:</strong></td>
                                        <td class="text-right">Gratuita</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="5"><strong>Totale:</strong></td>
                                        <td class="text-right">200,00€</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="buttons">
                                <div class="pull-right">
                                    <input type="button" data-loading-text="Loading..." class="btn" id="button-confirm" value="Conferma Ordine">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =====  CONTAINER END  ===== -->
@endsection