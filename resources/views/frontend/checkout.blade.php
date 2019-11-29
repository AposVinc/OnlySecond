@extends('frontend.layout')

@section('content')

<div class="container">
    <div class="row ">

        @component('frontend.partials.breadcrumbshome')
            Checkout
        @endcomponent
        <form class="form-horizontal">
            <div class="col-lg-12 mtb_20">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Step 1: Dettagli Spedizione <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <p>Per favore seleziona l'indirizzo di spedizione che preferisci utilizzare per quest'ordine</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="shipping_address"> Voglio utilizzare un indirizzo esistente
                                    </label>
                                </div>
                                <div id="shipping-existing" class="mr_10">
                                    <select class="form-control" name="address_id">
                                        @foreach(Auth::user()->addresses()->orderBy('mailing','desc')->get() as $address)
                                            <option value="{{$address->id}}">{{$address->name}} {{$address->surname}} - {{$address->address}} n°{{$address->civic_number}}, {{$address->city}} {{'('. $address->region. ')'}}-CAP: {{$address->zip}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="addressInvoice" name="shipping_address"> Voglio utilizzare l'indirizzo di fatturazione
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="new" name="shipping_address"> Voglio utilizzare un nuovo indirizzo
                                    </label>
                                </div>
                                <br>
                                <div id="shipping-new" style="display: none;">
                                    <div class="form-group required">
                                        <label for="name" class="col-sm-3 control-label">Nome</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" placeholder="Nome" value="" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="surname" class="col-sm-3 control-label">Cognome</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="surname" placeholder="Cognome" value="" name="surname" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="address" class="col-sm-3 control-label">Indirizzo</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="address" placeholder="Via" value="" name="address" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="civic-number" placeholder="Numero Civico" value="" name="civic-number" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="city" class="col-sm-3 control-label">Città</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city" placeholder="Città" value="" name="city" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="region" class="col-sm-3 control-label">Provincia</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="region" name="region" required>
                                                <option value="" style="display: none;"> --- Seleziona --- </option>
                                                <option value="ag">Agrigento</option>
                                                <option value="al">Alessandria</option>
                                                <option value="an">Ancona</option>
                                                <option value="ao">Aosta</option>
                                                <option value="ar">Arezzo</option>
                                                <option value="ap">Ascoli Piceno</option>
                                                <option value="at">Asti</option>
                                                <option value="av">Avellino</option>
                                                <option value="ba">Bari</option>
                                                <option value="bt">Barletta-Andria-Trani</option>
                                                <option value="bl">Belluno</option>
                                                <option value="bn">Benevento</option>
                                                <option value="bg">Bergamo</option>
                                                <option value="bi">Biella</option>
                                                <option value="bo">Bologna</option>
                                                <option value="bz">Bolzano</option>
                                                <option value="bs">Brescia</option>
                                                <option value="br">Brindisi</option>
                                                <option value="ca">Cagliari</option>
                                                <option value="cl">Caltanissetta</option>
                                                <option value="cb">Campobasso</option>
                                                <option value="ci">Carbonia-iglesias</option>
                                                <option value="ce">Caserta</option>
                                                <option value="ct">Catania</option>
                                                <option value="cz">Catanzaro</option>
                                                <option value="ch">Chieti</option>
                                                <option value="co">Como</option>
                                                <option value="cs">Cosenza</option>
                                                <option value="cr">Cremona</option>
                                                <option value="kr">Crotone</option>
                                                <option value="cn">Cuneo</option>
                                                <option value="en">Enna</option>
                                                <option value="fm">Fermo</option>
                                                <option value="fe">Ferrara</option>
                                                <option value="fi">Firenze</option>
                                                <option value="fg">Foggia</option>
                                                <option value="fc">Forl&igrave;-Cesena</option>
                                                <option value="fr">Frosinone</option>
                                                <option value="ge">Genova</option>
                                                <option value="go">Gorizia</option>
                                                <option value="gr">Grosseto</option>
                                                <option value="im">Imperia</option>
                                                <option value="is">Isernia</option>
                                                <option value="sp">La spezia</option>
                                                <option value="aq">L'aquila</option>
                                                <option value="lt">Latina</option>
                                                <option value="le">Lecce</option>
                                                <option value="lc">Lecco</option>
                                                <option value="li">Livorno</option>
                                                <option value="lo">Lodi</option>
                                                <option value="lu">Lucca</option>
                                                <option value="mc">Macerata</option>
                                                <option value="mn">Mantova</option>
                                                <option value="ms">Massa-Carrara</option>
                                                <option value="mt">Matera</option>
                                                <option value="vs">Medio Campidano</option>
                                                <option value="me">Messina</option>
                                                <option value="mi">Milano</option>
                                                <option value="mo">Modena</option>
                                                <option value="mb">Monza e della Brianza</option>
                                                <option value="na">Napoli</option>
                                                <option value="no">Novara</option>
                                                <option value="nu">Nuoro</option>
                                                <option value="og">Ogliastra</option>
                                                <option value="ot">Olbia-Tempio</option>
                                                <option value="or">Oristano</option>
                                                <option value="pd">Padova</option>
                                                <option value="pa">Palermo</option>
                                                <option value="pr">Parma</option>
                                                <option value="pv">Pavia</option>
                                                <option value="pg">Perugia</option>
                                                <option value="pu">Pesaro e Urbino</option>
                                                <option value="pe">Pescara</option>
                                                <option value="pc">Piacenza</option>
                                                <option value="pi">Pisa</option>
                                                <option value="pt">Pistoia</option>
                                                <option value="pn">Pordenone</option>
                                                <option value="pz">Potenza</option>
                                                <option value="po">Prato</option>
                                                <option value="rg">Ragusa</option>
                                                <option value="ra">Ravenna</option>
                                                <option value="rc">Reggio di Calabria</option>
                                                <option value="re">Reggio nell'Emilia</option>
                                                <option value="ri">Rieti</option>
                                                <option value="rn">Rimini</option>
                                                <option value="rm">Roma</option>
                                                <option value="ro">Rovigo</option>
                                                <option value="sa">Salerno</option>
                                                <option value="ss">Sassari</option>
                                                <option value="sv">Savona</option>
                                                <option value="si">Siena</option>
                                                <option value="sr">Siracusa</option>
                                                <option value="so">Sondrio</option>
                                                <option value="ta">Taranto</option>
                                                <option value="te">Teramo</option>
                                                <option value="tr">Terni</option>
                                                <option value="to">Torino</option>
                                                <option value="tp">Trapani</option>
                                                <option value="tn">Trento</option>
                                                <option value="tv">Treviso</option>
                                                <option value="ts">Trieste</option>
                                                <option value="ud">Udine</option>
                                                <option value="va">Varese</option>
                                                <option value="ve">Venezia</option>
                                                <option value="vb">Verbano-Cusio-Ossola</option>
                                                <option value="vc">Vercelli</option>
                                                <option value="vr">Verona</option>
                                                <option value="vv">Vibo valentia</option>
                                                <option value="vi">Vicenza</option>
                                                <option value="vt">Viterbo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="zip" class="col-sm-3 control-label">Codice Postale</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="zip" placeholder="Codice Postale" value="" name="zip" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons mr_10">
                                    <div class="pull-right">
                                        <input type="button" class="btn" id="button-shipping-address" value="Continua">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Step 2: Metodo Di Consegna <i class="fa fa-caret-down"></i></a> </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <p>Per favore seleziona il tuo metodo di consegna preferito per questo ordine.</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="standard" name="shipping_method"> Spedizione Standard - 5.00€ (4-5 giorni lavorativi)
                                        <p>Con ordine superiore a 250,00€, spedizione standard - 0,00€</p>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="rapid" name="shipping_method"> Spedizione Rapida - 10.00€ (2 giorni lavorativi)
                                    </label>
                                </div>
                                <div class="buttons mr_10">
                                    <div class="pull-right">
                                        <input type="button" class="btn mt_20" id="button-shipping-method" value="Continua">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Step 3: Metodo Di Pagamento <i class="fa fa-caret-down"></i></a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <p>Per favore seleziona il metodo di pagamento che preferisci utilizzare per quest'ordine</p>

                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="cod" name="payment_method"> Pagamento con Bonifico
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="new" value="cod" name="payment_method"> Pagamento con Paypal
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="new" value="cod" name="payment_method"> Pagamento con Carta Di Credito
                                    </label>
                                </div>

                                <div class="buttons mr_10">
                                    <div class="pull-right mt_20">Ho letto E Accetto I <a class="agree" href="#"><b>Termini E Le Condizioni</b></a>
                                        <input type="checkbox" value="1" name="agree"> &nbsp;
                                        <input type="button" class="btn" id="button-payment-method" value="Continua">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Step 4: Indirizzo Di Fatturazione <i class="fa fa-caret-down"></i></a> </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <p>Per favore seleziona l'indirizzo di fatturazione che preferisci utilizzare per quest'ordine</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="existing" name="payment_address" data-id="payment-existing"> Voglio utilizzare un indirizzo esistente
                                    </label>
                                </div>
                                <div id="payment-existing">
                                    <select class="form-control" name="address_id">
                                        @foreach(Auth::user()->addresses()->orderBy('billing','desc')->get() as $address)
                                            <option value="{{$address->id}}">{{$address->name}} {{$address->surname}} - {{$address->address}} n°{{$address->civic_number}}, {{$address->city}} {{'('. $address->region. ')'}}-CAP: {{$address->zip}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="address" name="payment_address"> Voglio utilizzare l'indirizzo di spedizione
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="new" name="payment_address" data-id="payment-new"> Voglio utilizzare un nuovo indirizzo
                                    </label>
                                </div>
                                <br>
                                <div id="payment-new" style="display: none;">
                                    <div class="form-group required">
                                        <label for="name" class="col-sm-3 control-label">Nome</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" placeholder="Nome" value="" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="surname" class="col-sm-3 control-label">Cognome</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="surname" placeholder="Cognome" value="" name="surname" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="address" class="col-sm-3 control-label">Indirizzo</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="address" placeholder="Via" value="" name="address" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="civic-number" placeholder="Numero Civico" value="" name="civic-number" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="city" class="col-sm-3 control-label">Città</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city" placeholder="Città" value="" name="city" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="region" class="col-sm-3 control-label">Provincia</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="region" name="region" required>
                                                <option value="" style="display: none;"> --- Seleziona --- </option>
                                                <option value="ag">Agrigento</option>
                                                <option value="al">Alessandria</option>
                                                <option value="an">Ancona</option>
                                                <option value="ao">Aosta</option>
                                                <option value="ar">Arezzo</option>
                                                <option value="ap">Ascoli Piceno</option>
                                                <option value="at">Asti</option>
                                                <option value="av">Avellino</option>
                                                <option value="ba">Bari</option>
                                                <option value="bt">Barletta-Andria-Trani</option>
                                                <option value="bl">Belluno</option>
                                                <option value="bn">Benevento</option>
                                                <option value="bg">Bergamo</option>
                                                <option value="bi">Biella</option>
                                                <option value="bo">Bologna</option>
                                                <option value="bz">Bolzano</option>
                                                <option value="bs">Brescia</option>
                                                <option value="br">Brindisi</option>
                                                <option value="ca">Cagliari</option>
                                                <option value="cl">Caltanissetta</option>
                                                <option value="cb">Campobasso</option>
                                                <option value="ci">Carbonia-iglesias</option>
                                                <option value="ce">Caserta</option>
                                                <option value="ct">Catania</option>
                                                <option value="cz">Catanzaro</option>
                                                <option value="ch">Chieti</option>
                                                <option value="co">Como</option>
                                                <option value="cs">Cosenza</option>
                                                <option value="cr">Cremona</option>
                                                <option value="kr">Crotone</option>
                                                <option value="cn">Cuneo</option>
                                                <option value="en">Enna</option>
                                                <option value="fm">Fermo</option>
                                                <option value="fe">Ferrara</option>
                                                <option value="fi">Firenze</option>
                                                <option value="fg">Foggia</option>
                                                <option value="fc">Forl&igrave;-Cesena</option>
                                                <option value="fr">Frosinone</option>
                                                <option value="ge">Genova</option>
                                                <option value="go">Gorizia</option>
                                                <option value="gr">Grosseto</option>
                                                <option value="im">Imperia</option>
                                                <option value="is">Isernia</option>
                                                <option value="sp">La spezia</option>
                                                <option value="aq">L'aquila</option>
                                                <option value="lt">Latina</option>
                                                <option value="le">Lecce</option>
                                                <option value="lc">Lecco</option>
                                                <option value="li">Livorno</option>
                                                <option value="lo">Lodi</option>
                                                <option value="lu">Lucca</option>
                                                <option value="mc">Macerata</option>
                                                <option value="mn">Mantova</option>
                                                <option value="ms">Massa-Carrara</option>
                                                <option value="mt">Matera</option>
                                                <option value="vs">Medio Campidano</option>
                                                <option value="me">Messina</option>
                                                <option value="mi">Milano</option>
                                                <option value="mo">Modena</option>
                                                <option value="mb">Monza e della Brianza</option>
                                                <option value="na">Napoli</option>
                                                <option value="no">Novara</option>
                                                <option value="nu">Nuoro</option>
                                                <option value="og">Ogliastra</option>
                                                <option value="ot">Olbia-Tempio</option>
                                                <option value="or">Oristano</option>
                                                <option value="pd">Padova</option>
                                                <option value="pa">Palermo</option>
                                                <option value="pr">Parma</option>
                                                <option value="pv">Pavia</option>
                                                <option value="pg">Perugia</option>
                                                <option value="pu">Pesaro e Urbino</option>
                                                <option value="pe">Pescara</option>
                                                <option value="pc">Piacenza</option>
                                                <option value="pi">Pisa</option>
                                                <option value="pt">Pistoia</option>
                                                <option value="pn">Pordenone</option>
                                                <option value="pz">Potenza</option>
                                                <option value="po">Prato</option>
                                                <option value="rg">Ragusa</option>
                                                <option value="ra">Ravenna</option>
                                                <option value="rc">Reggio di Calabria</option>
                                                <option value="re">Reggio nell'Emilia</option>
                                                <option value="ri">Rieti</option>
                                                <option value="rn">Rimini</option>
                                                <option value="rm">Roma</option>
                                                <option value="ro">Rovigo</option>
                                                <option value="sa">Salerno</option>
                                                <option value="ss">Sassari</option>
                                                <option value="sv">Savona</option>
                                                <option value="si">Siena</option>
                                                <option value="sr">Siracusa</option>
                                                <option value="so">Sondrio</option>
                                                <option value="ta">Taranto</option>
                                                <option value="te">Teramo</option>
                                                <option value="tr">Terni</option>
                                                <option value="to">Torino</option>
                                                <option value="tp">Trapani</option>
                                                <option value="tn">Trento</option>
                                                <option value="tv">Treviso</option>
                                                <option value="ts">Trieste</option>
                                                <option value="ud">Udine</option>
                                                <option value="va">Varese</option>
                                                <option value="ve">Venezia</option>
                                                <option value="vb">Verbano-Cusio-Ossola</option>
                                                <option value="vc">Vercelli</option>
                                                <option value="vr">Verona</option>
                                                <option value="vv">Vibo valentia</option>
                                                <option value="vi">Vicenza</option>
                                                <option value="vt">Viterbo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="zip" class="col-sm-3 control-label">Codice Postale</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="zip" placeholder="Codice Postale" value="" name="zip" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons mr_10">
                                    <div class="pull-right">
                                        <input type="button" class="btn" id="button-payment-address" value="Continua">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Step 5: Regalo <i class="fa fa-caret-down"></i></a> </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <div>
                                    <label>
                                        <input type="checkbox" value="cod" name="gift"> Regala questo/i articolo/i </label>
                                </div>
                                <div class="buttons mr_10">
                                    <div class="pull-right">
                                        <input type="button" class="btn" id="button-gift" value="Continua">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Step 6: Conferma l'ordine <i class="fa fa-caret-down"></i></a> </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <!--<div class="table-responsive">
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
                                </div>-->
                                @foreach(auth()->User()->products as $product)
                                    <div class="heading-part mb_10"></div>
                                    <div class="mb_10 col-md-12">
                                        @if($product->offer()->exists())
                                            <div class="pl_0 col-md-1">
                                                <div class="image product-imageblock">
                                                    <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                        <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="100" width="100">
                                                    </a>
                                                </div>
                                                <div class="ribbon orangeOS"><span>{{$product->offer->rate}}%</span></div>
                                            </div>
                                        @else
                                            <div class="pl_0 col-md-1">
                                                <div class="image product-imageblock">
                                                    <a href="{{route('Product', ['cod' => $product->cod])}}">
                                                        <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" title="{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}" class="img-responsive" height="100" width="100">
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="cartProd col-md-5">
                                            <div class="product-name">
                                                <span>Prodotto:</span>
                                                <label>
                                                    {{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}
                                                </label>
                                            </div>
                                            <div class="product-price">
                                                <span>Prezzo:</span>
                                                <label>
                                                    @if($product->offer()->exists())
                                                        <del>{{$product->price}}€</del>
                                                        {{$product->offer->calculateDiscount()}} €
                                                    @else
                                                        {{$product->price}} €
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="product-attr">
                                                <span>Genere:</span>
                                                <label>
                                                    @if($product->genre == "U")
                                                        Unisex
                                                    @elseif($product->genre == "M")
                                                        Uomo
                                                    @else
                                                        Donna
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="product-attr">
                                                <span>Categoria:</span>
                                                <label>
                                                    @php
                                                        $stringa = "";
                                                        foreach($product->categories as $category){
                                                            if($stringa==""){
                                                                $stringa = $stringa. $category->name;
                                                            }else{
                                                                $stringa = $stringa. ", ". $category->name;
                                                            }
                                                        }
                                                        echo $stringa;
                                                    @endphp
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cartProd col-md-3">
                                            <div class="productQuantity" style="text-align: center">
                                                <span>Quantità Acquistata: </span>
                                                <label>{{$product->pivot->quantity}}</label>
                                            </div>
                                        </div>
                                        <div class="cartProd col-md-3">
                                            <div class="productPriceTotal" style="text-align: center">
                                                <span>Prezzo per Qt:</span>
                                                <label>{{auth()->User()->calculatepriceQuantityProduct($product)}} €</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="heading-part mb_10"></div>
                                <div class="cartProd col-sm-4 col-sm-offset-9 pl_0">
                                    <div class="product-name">
                                        <span>Sub - Totale <small style="font-size: 10px;">(Iva inclusa)</small>:</span>
                                        <label>{{auth()->User()->calculateTotalPrice()}} €</label>
                                    </div>
                                    <div class="productPriceTotal">
                                        <span>Costo di spedizione:</span>
                                        @if(auth()->User()->calculateTotalPrice() > 250)
                                            <label id="shippingPrice">
                                                Gratuita
                                            </label>
                                        @else
                                            <label id="shippingPrice">
                                                5.00 €
                                            </label>
                                        @endif
                                    </div>
                                    <div id="totalPrice" class="product-name">
                                        <span>Totale:</span>
                                        @if(auth()->User()->calculateTotalPrice() > 250)
                                            <label id="totalPriceCart">{{auth()->User()->calculateTotalPrice()}} €</label>
                                        @else
                                            <label id="totalPriceCart">{{number_format(auth()->User()->calculateTotalPrice() + 5.00, 2, ".", "")}} €</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="buttons mr_10">
                                    <div class="pull-right mt_10">
                                        <input type="button" data-loading-text="Loading..." class="btn" id="button-confirm" value="Conferma Ordine">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- =====  CONTAINER END  ===== -->
@endsection