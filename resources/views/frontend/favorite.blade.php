@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER STRAT  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>WishList</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">WishList</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12 mtb_20">
                <form enctype="multipart/form-data" method="post" action="#">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center">Immagine</td>
                                <td class="text-left">Nome Prodotto</td>
                                <td class="text-left">Collezione</td>
                                <td class="text-left">Categoria</td>
                                <td class="text-left">Genere</td>
                                <td class="text-right">Prezzo</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="Breil Classic" title="Breil Classic"></a></td>
                                <td class="text-left"><a href="product.html">Breil</a></td>
                                <td class="text-left">Cod collezione</td>
                                <td class="text-left">Categoria</td>
                                <td class="text-left">Uomo</td>
                                <td class="text-right">230.00€</td>
                            </tr>
                            <tr>
                                <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="Breil Classic" title="Breil Classic"></a></td>
                                <td class="text-left"><a href="product.html">Breil</a></td>
                                <td class="text-left">Cod collezione</td>
                                <td class="text-left">Categoria</td>
                                <td class="text-left">Uomo</td>
                                <td class="text-right">230.00€</td>
                            </tr>
                            <tr>
                                <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="Breil Classic" title="Breil Classic"></a></td>
                                <td class="text-left"><a href="product.html">Breil</a></td>
                                <td class="text-left">Cod collezione</td>
                                <td class="text-left">Categoria</td>
                                <td class="text-left">Uomo</td>
                                <td class="text-right">230.00€</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
