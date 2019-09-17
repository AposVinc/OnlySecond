@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row">
            <!-- =====  BANNER START  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Cronologia Ordini</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">Cronologia Ordini</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 mtb_20">
                <form enctype="multipart/form-data" method="post" action="#">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-left">Codice Ordine</td>
                                <td class="text-left">Data Ordine</td>
                                <td class="text-left">N° Prodotti</td>
                                <td class="text-right">Totale</td>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach(auth() -> User() -> orderHistories as $product )
                            <tr>
                                <td>
                                    @foreach($product->name as $name)
                                        {{$name->name}}
                                    @endforeach
                                </td>
                                    <!--più prodotti, manca il numero ordine
                                    <li><a href="product.html">Breil </a> cat, coll, 250€</li>
                                    <li><a href="product.html">Tissot </a> cat, coll, 250€</li>
                                -->
                                </td>
                                <td>{{$product->orderHistories->date}}</td>
                                <td> {{$product->orderHistories->quantity}}</td>

                                <td class="text-right">
                                    @foreach($product->price as $totalprice)
                                        {{$totalprice->totalprice}}
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    <div style="max-width: 200px;">
                                        <button class="btn">Dettaglio Ordine</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                            <tbody>
                            <tr>

                                <td class="text-left">654321
                                    <li><a href="product.html">Breil </a> cat, coll, 250€</li>
                                    <li><a href="product.html">Tissot </a> cat, coll, 250€</li>
                                </td>
                                <td class="text-left">13/25/86</td>
                                <td class="text-left"> 1 </td>
                                <td class="text-right">120.00€</td>
                                <td class="text-right">
                                    <div style="max-width: 200px;">
                                        <button class="btn">Dettaglio Ordine</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                            <tbody>
                            <tr>

                                <td class="text-left">654321
                                    <li><a href="product.html">Breil </a> cat, coll, 250€</li>
                                    <li><a href="product.html">Tissot </a> cat, coll, 250€</li>
                                </td>
                                <td class="text-left">13/25/86</td>
                                <td class="text-left"> 1 </td>
                                <td class="text-right">120.00€</td>
                                <td class="text-right">
                                    <div style="max-width: 200px;">
                                        <button class="btn">Dettaglio Ordine</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection