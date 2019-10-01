@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                I Miei Indirizzi
            @endcomponent

            <div class="panel-default col-sm-10">
                <div class="panel-body">
                    <div class="radio mb_20">
                        <label class="label-radio-address"> <input type="radio" checked="checked" value="existing" name="select_address" data-id="address-existing"><span>Seleziona i tuoi indirizzi preferiti</span></label>
                    </div>
                    <form action="{{route('Address.Favorite')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div id="address-existing">
                            <div class="form-group">
                                <label for="mailing_address" class="col-sm-3 control-label">Indirizzo di Spedizione</label>
                                <div class="col-sm-9 pr_5">
                                    <select class="form-control" id="mailing_address" name="mailing_address">
                                        @foreach(Auth::user()->addresses()->orderBy('mailing','desc')->get() as $address)
                                            <option value="{{$address->id}}">{{$address->name}} {{$address->surname}} - {{$address->address}} n°{{$address->civic_number}}, {{$address->city}} {{'('. $address->region. ')'}}-CAP: {{$address->zip}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="billing_address" class="col-sm-3 control-label">Indirizzo di Fatturazione</label>
                                <div class="col-sm-9 pr_5">
                                    <select class="form-control" id="billing_address" name="billing_address">
                                        @foreach(Auth::user()->addresses()->orderBy('billing','desc')->get() as $address)
                                            <option value="{{$address->id}}">{{$address->name}} {{$address->surname}} - {{$address->address}} n°{{$address->civic_number}}, {{$address->city}} {{'('. $address->region. ')'}}-CAP: {{$address->zip}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="buttons clearfix">
                                <div class="pull-right pr_5 mt_10">
                                    <button type="submit" class="btn btn-primary btn-sm">Salva</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <div class="radio mb_20">
                        <label class="label-radio-address"><input type="radio" value="new" name="select_address" data-id="address-new"><span>Inserisci un nuovo indirizzo</span></label>
                    </div>
                    <form action="{{route('Address.Add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div id="address-new" style="display: none;">
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
                            <div class="buttons clearfix">
                                <div class="pull-right pr_10 mt_10">
                                    <button type="submit" class="btn btn-primary btn-sm">Aggiungi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    <div class="radio mb_20">
                        <label class="label-radio-address"><input type="radio" value="delete" name="select_address" data-id="address-delete"><span>Elimina un indirizzo esistente</span></label>
                    </div>
                    <form action="{{route('Address.Delete')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div id="address-delete" style="display: none;">
                            <div class="form-group">
                                <label for="delete_address" class="col-sm-3 control-label">Indirizzo da eliminare</label>
                                <div class="col-sm-9 pr_5">
                                    <select class="form-control" id="delete_address" name="delete_address">
                                        @foreach(Auth::user()->addresses()->get() as $address)
                                            <option value="{{$address->id}}">{{$address->name}} {{$address->surname}} - {{$address->address}} n°{{$address->civic_number}}, {{$address->city}} {{'('. $address->region. ')'}}-CAP: {{$address->zip}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-right pr_5 mt_10">
                                        <button type="submit" class="btn btn-primary btn-sm">Elimina</button>
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
