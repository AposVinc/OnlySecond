@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Modalità Di Pagamento</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">Pagamento</li>
                    </ul>
                </div>
            </div>

            <div class="panel-default col-sm-10">
                <h1>Seleziona Il Metodo Di Pagamento Preferito</h1>
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
                        <input type="button" class="btn" data-loading-text="Loading..." id="button-payment-method" slot="end" value="Salva">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
