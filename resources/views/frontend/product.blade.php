@extends('frontend.layout')

@section('content')
    <div class="container">

                @component('frontend.partials.breadcrumbshome')
                 <label>Prodotto</label>
                @endcomponent
                <div class="col-lg-12 ">
                        <div class="col-md-5">
                            <div class="ml_10">
                                <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="" />
                            </div>

                            <div id="product-thumbnail" class="owl-carousel owl-theme ml_100 mt_10">
                                <div class="item border">
                                    <div class="image-additional mr_10">
                                        <a data-fancybox="group1">
                                            <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-additional mr_10">
                                        <a  data-fancybox="group2">
                                            <img src="{{asset($product->images->where('main',0)->first()->path_image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-additional mr_10">
                                        <a data-fancybox="group3">
                                            <img src="{{asset($product->images->where('main',0)->first()->path_image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-7 prodetail caption product-thumb">
                            <div class="row">
                                <div id="review" class="text-left col-md-7">
                                        <label class="product-name"><span><h2>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</h2></span></label>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}" id="wishlist">
                                        <i class="fa fa-heart " aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Aggiungi alla Wishlist!"></i>
                                    </a>
                                </div>

                            </div>

                            <div class="original_price">
                                <h3><span class="price"><span class="currencySymbol">€</span>{{$product->price}}</span></h3>
                            </div>

                            <hr>

                            <ul class="list-unstyled product_info mtb_20">
                                <li>
                                    <label>Brand:</label>
                                    <span>{{$product->collection->brand->name}}</span>
                                </li>
                                <li>
                                    <label>Collezione:</label>
                                    <span>{{$product->collection->name}}</span>
                                </li>
                                <li>
                                    <label>Categoria:</label>
                                    <span>
                                        @foreach($product->categories as $category)
                                                {{$category->name}}
                                        @endforeach
                                    </span>
                                </li>
                                <li>
                                    <label>Genere:</label>
                                    <span>{{$product->genre}}</span>
                                </li>
                                <li>
                                    <label>Codice Prodotto:</label>
                                    <span>{{$product->cod}}</span>
                                </li>
                                <li>
                                    <label>Materiale:</label>
                                    <span></span>
                                </li>
                                <li>
                                    <label>Disponibilità:</label>
                                    <span>{{$product->stock_availability}}</span>
                                </li>

                            </ul>

                            <div id="product">
                                <div class="form-group">
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-4 qty form-group2">
                                            <label>Quantità</label>
                                            <input name="product_quantity" min="1" value="1" type="number" class="mt_10">
                                        </div>


                                    <div class="mt_40 ml_40">
                                        <button>
                                        <a href="#"><h4><i class="fa fa-shopping-cart">Aggiungi al Carrello</i></h4></a>
                                        </button>
                                    </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                    <div class="row mtb_30">
                        <div class="col-md-12">
                            <div id="exTab5" class="mtb_30">
                                <ul class="nav nav-tabs">
                                    <li class="active"> <a href="#1c" data-toggle="tab">Descrizione</a> </li>
                                    <li><a href="#2c" data-toggle="tab">Specifiche</a> </li>
                                    <li><a href="#3c" data-toggle="tab">Recensioni</a> </li>
                                </ul>
                                <div class="tab-content">

                                    <div class="tab-pane active pt_10" id="1c">
                                        <p class="product-desc mtb_10">{{$product->long_desc}}</p>
                                    </div>

                                    <div class="tab-pane pt_10" id="2c">

                                        <div class="specifications active ">
                                            <div class="row mt_30">
                                                <div class="col-sm-6">
                                                    <h3>Info Generali</h3>
                                                    <hr>

                                                    <table class="mt_20">

                                                        <tbody>
                                                        <tr class="row">
                                                            <td><strong>Marca</strong></td>

                                                            <td><span>{{$product->collection->brand->name}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Collezione</strong></td>
                                                            <td><span>{{$product->collection->name}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Categoria</strong></td>

                                                            <td><span>
                                                                    @foreach($product->categories as $category)
                                                                        {{$category->name}}
                                                                    @endforeach</span>
                                                            </td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Genere</strong></td>
                                                            <td>
                                                                <span>{{$product->genre}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Codice</strong></td>
                                                            <td><span>{{$product->cod}}</span></td>
                                                        </tr>

                                                        </tbody>


                                                    </table>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3>Info Quadrante</h3>
                                                    <hr>
                                                    <table class="mt_20">

                                                        <tbody>
                                                        <tr class="row">
                                                            <td><strong>Dimensioni </strong></td>

                                                            <td><span>{{$product->collection->brand->name}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Materiale</strong></td>
                                                            <td><span>{{$product->collection->name}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Spessore</strong></td>

                                                            <td><span>{{$product->collection->name}}</span>
                                                            </td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Vetro</strong></td>
                                                            <td>
                                                                <span>{{$product->genre}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Colore</strong></td>
                                                            <td><span>{{$product->cod}}</span></td>
                                                        </tr>

                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row mt_60">
                                                <div class="col-sm-6">
                                                    <h3>Info Cinturino</h3>
                                                    <hr>
                                                    <table class="mt_20">

                                                        <tbody>
                                                        <tr class="row">
                                                            <td><strong>Materiale</strong></td>

                                                            <td><span>{{$product->collection->brand->name}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Colore</strong></td>
                                                            <td><span>{{$product->collection->name}}</span></td>
                                                        </tr>


                                                        </tbody>


                                                    </table>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3>Altre Info</h3>
                                                    <hr>
                                                    <table class="mt_20">

                                                        <tbody>
                                                        <tr class="row">
                                                            <td><strong>Movimento</strong></td>

                                                            <td><span>{{$product->collection->brand->name}}</span></td>
                                                        </tr>

                                                        <tr class="row">
                                                            <td><strong>Garanzia</strong></td>
                                                            <td><span>{{$product->collection->name}}</span></td>
                                                        </tr>


                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane pt_10" id="3c">

                                        <div class="col-md-12">
                                            <label data-toggle="collapse" data-target="#content"><div class="fa fa-plus">  Scrivi una recensione </div></label>

                                                    <div class="collapse" id="content">

                                                        <form action="{{route('Review.Add')}}" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
                                                            @csrf

                                                                <div class="form-group required">
                                                                    <div class="col-sm-12">
                                                                        <label class="control-label" for="input-name">Titolo Recensione</label>
                                                                        <input name="name" value="" id="input-title" class="form-control" type="text">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group required">
                                                                    <div class="col-sm-12">
                                                                        <label class="control-label" for="input-review">la Tua Recensione</label>
                                                                        <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="buttons clearfix">
                                                                    <div class="pull-right pr_10 mt_10">
                                                                        <button type="submit" class="btn btn-primary btn-sm">Invia</button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </div>
                                        </div>

                                        <div class="mtb_40">
                                            @foreach($product->reviews as $review)

                                                <div id="review" class="col-lg-12 mb_40">

                                                    <label class="product-name"><span>Nome utente:
                                                            </span>{{$review->user->name}}</label>

                                                    <div class="mt_10">
                                                        <label class="review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>

                                                        <label class="review-vote-date">
                                                            <span>Data:</span>{{date('d-m-Y H:i', strtotime($review->created_at))}}
                                                            <span style="margin-left: 25px;">Voto:</span>
                                                            @for ($i = 1; $i < 6; $i++)
                                                                @if($i <= $review->vote)
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                                @else
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                @endif
                                                            @endfor
                                                        </label>
                                                    </div>
                                                    <div style="margin-top:5px; text-align: justify;">
                                                        <span>{{$review->text}}</span>
                                                    </div>
                                                </div>
                                             @endforeach
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
    </div>

@endsection
