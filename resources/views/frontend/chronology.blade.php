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
                                <td class="text-left">N° Ordine</td>
                                <td class="text-left">Codice Ordine</td>
                                <td class="text-left">Data Ordine</td>
                                <td class="text-left">N° Prodotti</td>
                                <td class="text-right">Totale</td>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="text-left">3</td>
                                <td class="text-left">123456</td>
                                <td class="text-left">12/34/56</td>
                                <td class="text-left"> 3 </td>
                                <td class="text-right">230.00€</td>
                                <td class="text-right">
                                    <div style="max-width: 200px;">
                                        <button class="btn">Dettaglio Ordine</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                            <tbody>
                            <tr>
                                <td class="text-left">2</td>
                                <td class="text-left">654321</td>
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
                                <td class="text-left">1</td>
                                <td class="text-left">654321</td>
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