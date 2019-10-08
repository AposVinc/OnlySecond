@extends('frontend.layout')

@section('content')
    <div class="container">

                @component('frontend.partials.breadcrumbshome')
                 <label class="product-name"><span>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</span></label>
                @endcomponent
                <div class="col-lg-12 ">
                        <div class="col-md-5">
                            <div class="ml_10">
                                <a href="{{route('Product', ['cod' => $product->cod])}}">
                                    <img data-name="product_image" src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="" />
                                </a>
                            </div>

                            <div id="product-thumbnail" class="owl-carousel owl-theme ml_100 mt_10">
                                <div class="item">
                                    <div class="image-additional mr_10">
                                        <a href="{{route('Product', ['cod' => $product->cod])}}"  data-fancybox="group1"> <!--	href non necessario, non c'è bisogno di riaprire di nuovo la pagina-->
                                            <img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-additional mr_10">
                                        <a href="{{route('Product', ['cod' => $product->cod])}}"  data-fancybox="group1">
                                            <img src="{{asset($product->images->where('main',0)->first()->path_image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-additional mr_10">
                                        <a href="{{route('Product', ['cod' => $product->cod])}}"  data-fancybox="group1">
                                            <img src="{{asset($product->images->where('main',0)->first()->path_image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-7 prodetail caption product-thumb">
                            <div id="review" class="text-left">
                                <div>
                                    <label class="product-name"><span><h2>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</h2></span></label>
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
                            <hr>
                            <label>Descrizione:</label>
                            <p class="product-desc mtb_10">{{$product->long_desc}}</p>

                            <div id="product">
                                <div class="form-group">
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-4 qty form-group2">
                                            <label>Quantità</label>
                                            <input name="product_quantity" min="1" value="1" type="number" class="mt_10">
                                        </div>

                                        <div class="button-group mt_30 col-md-4">
                                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                            <div><a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}" class="wishlist"><span>wishlist</span></a></div>
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
                                    <li class="active"> <a href="#1c" data-toggle="tab">Specifiche</a> </li>
                                    <li><a href="#2c" data-toggle="tab">Recensioni</a> </li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="tab-pane active pt_20" id="1c">
                                            <div class="specs_specifications active ">
                                                <table width="100%" class="all-specs">
                                                    <tbody>
                                                    <tr class="heading mb_15">
                                                        <th colspan="2"><h3>Info generali</h3></th>
                                                    </tr>
                                                    <tr class="even-row"><td><strong>Marca</strong></td>
                                                        <td><span>{{$product->collection->brand->name}}</span></td></tr>
                                                    <tr><td><strong>Collezione</strong></td>
                                                        <td><span>{{$product->collection->name}}</span></td></tr>
                                                    <tr class="even-row"><td><strong>Categorie</strong></td>
                                                        <td><span>
                                                                @foreach($product->categories as $category)
                                                                    {{$category->name}}
                                                                @endforeach
                                                            </span></td>
                                                    </tr>
                                                    <tr><td><strong>Materiale</strong></td>
                                                        <td><span></span></td>
                                                    </tr>

                                                    <tr><td><strong>Genere</strong></td>
                                                        <td><span>{{$product->genre}}</span></td>
                                                    </tr>

                                                    <tr><td><strong>Codice</strong></td>
                                                        <td><span>{{$product->cod}}</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>

                                    <div class="tab-pane" id="2c">
                                        @foreach($product->reviews() as $review)
                                            <div class="col-lg-12 mb_40">

                                                    <div>
                                                        <label class="product-name"><span>Nome utente:</span>{{$review->user()->name}}</label>
                                                    </div>
                                                    <div class="mt_10">
                                                        <label class="review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>
                                                        <label class="review-vote-date"><span>Voto:</span>{{$review->vote}}<span style="margin-left: 10px;">Data:</span>{{date('d-m-Y H:i', strtotime($review->created_at))}}</label>
                                                    </div>
                                                    <div style="margin-top:5px; text-align: justify;">
                                                        <span>{{$review->text}}</span>
                                                    </div>
                                            </div>
                                        @endforeach
<!--
                                        <form class="form-horizontal col-lg-12">
                                            <div id="review">
                                                <h4 class="mtb_20">Scrivi una recensione</h4>
                                            <div class="form-group required">
                                                <div class="col-sm-12">
                                                    <label class="control-label" for="input-name">Il Tuo Nome</label>
                                                    <input name="name" value="" id="input-name" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="col-sm-12">
                                                    <label class="control-label" for="input-review">la Tua Recensione</label>
                                                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                                </div>
                                            </div>

                                                   <input class="btn pull-right mt_30" type="submit" value="Invia" />

                                               </div>
                                        </form>-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
    </div>

@endsection
