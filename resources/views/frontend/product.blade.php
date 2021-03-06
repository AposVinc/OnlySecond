@extends('frontend.layout')

@section('content')
    <div class="container">

        @component('frontend.partials.breadcrumbshome')
            <label>Prodotto</label>
        @endcomponent
        <div class="col-lg-12 mb_50">
            <div class="col-md-5">

                <div class="images">
                    @if($product->images->count() == 1)
                        <div class="main-banner owl-carousel">
                            <div class="item"><a href="#"><img src="{{asset($product->images->where('main',1)->first()->path_image)}}" alt="Main Images" class="img-responsive" /></a></div>
                        </div>
                    @else
                        <div class="main-banner owl-carousel">
                            @foreach($product->images as $image)
                                <div class="item"><a href="#"><img src="{{asset($image->path_image)}}" alt="Main Images" class="img-responsive" /></a></div>
                            @endforeach

                        </div>
                    @endif
                    @if($product->offer()->exists())
                        <div class="ribbon orangeOSProduct">
                            <span>{{$product->offer->rate}}%</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-7 prodetail caption product-thumb">
                <div class="row">
                    <div id="review" class="text-left col-lg-8">
                        <span class="product-name"><h2>{{$product->collection->brand->name}} {{$product->collection->name}} - {{$product->cod}}</h2></span>
                    </div>
                    <div class="col-lg-2 mt_6 ml_100 ">
                        <a href="{{route('Wishlist.AddProduct', ['cod' => $product->cod])}}" id="wishlist">
                            <i class="fa fa-heart "  aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Aggiungi alla Wishlist!"></i>
                        </a>
                    </div>
                </div>

                <div class="original-price mb_10">
                    @if($product->offer()->exists())
                        <div class="product-price">

                            <label>
                                <span class="price"> <del> {{$product->price}}<span class="currencySymbol">€</span></del></span>
                                <span class="price"> {{$product->offer->calculateDiscount()}} <span class="currencySymbol">€</span></span>
                            </label>
                        </div>

                    @else
                        <h3><span class="price">{{$product->price}}<span class="currencySymbol">€</span></span></h3>
                    @endif
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
                        </span>
                    </li>
                    <li>
                        <label>Genere:</label>
                        <span>
                            @if($product->genre == "U")
                                Unisex
                            @elseif($product->genre == "M")
                                Uomo
                            @else
                                Donna
                            @endif</span>
                    </li>
                    <li>
                        <label>Codice Prodotto:</label>
                        <span>{{$product->cod}}</span>
                    </li>
                    <li>
                        @if($product->stock_availability == 0)
                            <label style="color: red;font-size: 20px;">Prodotto non disponibile</label>
                        @else
                            <label>Disponibilità:</label>
                            <span>{{$product->stock_availability}}</span>
                        @endif
                    </li>
                </ul>

                <div id="product">
                    <div class="form-group">
                        <hr>
                        <div class="row">
                            <form method="get" action="{{route('Cart.AddProduct', ['cod' => $product->cod])}}">
                                <div class="col-md-7 qty form-group2 mt_20 ">
                                    <label>Quantità:   </label>
                                    @if($product->stock_availability == 0)
                                        <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="" placeholder="" type="number" style="width: 65px; height: 35px;" disabled>
                                    @else
                                        @auth()
                                            @if(auth()->User()->products->isEmpty())
                                                <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="" placeholder="1" type="number" style="width: 65px; height: 35px;">
                                            @else
                                                @foreach(auth()->User()->products as $prod)
                                                    @if($prod->cod == $product->cod)
                                                        <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="{{$prod->pivot->quantity}}" type="number" style="width: 65px; height: 35px;">
                                                        @break
                                                    @else
                                                        @if($loop->last)
                                                            <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="" placeholder="1" type="number" style="width: 65px; height: 35px;">
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @elseif(Session::has('quantity'))
                                            @foreach(Session::get('products') as $prod)
                                                @if($prod->cod == $product->cod)
                                                    <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="{{Session::get('quantity')[$loop->index]}}" type="number" style="width: 65px; height: 35px;">
                                                @else
                                                    @if($loop->last)
                                                        <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="" placeholder="1" type="number" style="width: 65px; height: 35px;">
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            <input name="product_quantity" min="1" max="{{$product->stock_availability}}" value="" placeholder="1" type="number" style="width: 65px; height: 35px;">
                                        @endauth
                                    @endif
                                </div>

                                <div class="col-md-5 mt_20">
                                    @if($product->stock_availability == 0)
                                        <button type="submit" class="btn cart" style="padding:6px" disabled> <i class="fa fa-shopping-cart"></i>   Aggiungi al Carrello</button>
                                    @else
                                        <button type="submit" class="btn cart" style="padding:6px"> <i class="fa fa-shopping-cart"></i>   Aggiungi al Carrello</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mtb_60">
            <div class="col-md-12">
                <div id="Tab3" class="mtb_30">
                    <ul class="nav nav-tabs">
                        <li class="active "> <a href="#1c" data-toggle="tab"><h5>Descrizione</h5></a> </li>
                        <li><a href="#2c" data-toggle="tab"><h5>Specifiche</h5></a> </li>
                        <li><a href="#3c" data-toggle="tab"><h5>Recensioni</h5></a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active pt_10 mt_20" id="1c">
                            <p class="product-desc mtb_10"><h5>{{$product->long_desc}}</h5>
                        </div>

                        <div class="tab-pane pt_10" id="2c">
                            <div class="specifications active ">
                                <div class="row mt_30">
                                    <div class="col-sm-6">
                                        <h3>Info Generali</h3>
                                        <hr>

                                        <div class="mt_20">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Marca</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->collection->brand->name}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Collezione</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->collection->name}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Categoria</strong>
                                                </div>
                                                <div class="col-md-3">
                                                        <span>
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
                                                        </span>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Genere</strong>
                                                </div>
                                                <div class="col-md-3">
                                                        <span>@if($product->genre == "U")
                                                                Unisex
                                                            @elseif($product->genre == "M")
                                                                Uomo
                                                            @else
                                                                Donna
                                                            @endif</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Codice</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->cod}}</span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <h3>Info Quadrante</h3>
                                        <hr>

                                        <div class="mt_20">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Dimensioni</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->case_size}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Materiale</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->material}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Spessore</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->case_thickness}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Vetro</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->glass}}</span>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Colore</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->dialColor->name}}</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt_60">
                                    <div class="col-sm-6">
                                        <h3>Info Cinturino</h3>
                                        <hr>
                                        <div class="mt_20">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Materiale</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->strap_material}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Colore</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->strapColor->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <h3>Altre Info</h3>
                                        <hr>
                                        <div class="mt_20">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Movimento</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->movement}}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>Garanzia</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>{{$product->specification->warranty}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane pt_10" id="3c">
                            <div class="col-md-12 mt_10">

                                @if($product->reviews->isEmpty())
                                    @auth()
                                        <div class="mtb_10">
                                            <a data-toggle="collapse" data-target="#content"><h5><i class="fa fa-plus"></i>  Scrivi Una Recensione </h5></a>

                                            <div class="collapse" id="content">

                                                <form action="{{route('Review.Add')}}" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
                                                    @csrf

                                                    <input name="productCod" hidden value="{{$product->cod}}">

                                                    <div class="form-group required mt_20">
                                                        <div class="col-sm-12">
                                                            <label class="control-label" for="input-title">Titolo Recensione</label><input name="title" id="input-title" class="form-control" type="text" data-required="true" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group required">
                                                        <div class="col-sm-12">
                                                            <label class="control-label" for="input-review">La Tua Recensione</label>
                                                            <textarea name="text" rows="5" id="input-review" class="form-control" data-required="true" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <fieldset class="reviewRating">
                                                                <input type="radio" id="star5" name="reviewRating" value="5" /><label class = "full" for="star5" title="Stupendo - 5 stars"></label>
                                                                <input type="radio" id="star4" name="reviewRating" value="4" /><label class = "full" for="star4" title="Buono - 4 stars"></label>
                                                                <input type="radio" id="star3" name="reviewRating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                                <input type="radio" id="star2" name="reviewRating" value="2" /><label class = "full" for="star2" title="Mediocre- 2 stars"></label>
                                                                <input type="radio" id="star1" name="reviewRating" value="1" /><label class = "full" for="star1" title="Pessimo - 1 star"></label>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-sm-4 mb_20">
                                                            <div class="pull-right pr_10">
                                                                <button type="submit" class="btn">Invia</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth
                                    <div class="text-center reviewEmpty">
                                        <span style="font-size: 25px;"> Non ci sono recensioni!! <i class="fa fa-meh-o"></i> </span>
                                        <br>
                                        @auth()
                                            <div class="mt_10">
                                                <span> Aggiungi la prima recensione cliccando su</span> <i>  "Scrivi Una Recensione" </i>
                                            </div>
                                        @else
                                            <div class="mt_10">
                                                <span> Aggiungi la prima recensione dopo aver effettuato il </span> <i><a href="{{route('User.Login')}}"> Login </a></i>
                                            </div>
                                        @endauth
                                    </div>
                                @else
                                    @auth()
                                        @if(Auth::user()->reviews->contains('product_id',$product->id) )
                                            <div id="review" class="mt_10 mb_60">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="product-name"><span style="margin-right: 10px">Nome Utente: </span>{{Auth::user()->name}}</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="button-right">
                                                            <form action="{{route('Review.Delete')}}">
                                                                <a title="Modifica la recensione" class="btn btn-outline fa fa-pencil" data-toggle="collapse" href="#content1" role="button" aria-expanded="false" aria-controls="content1"></a>
                                                                <button type="submit" class="btn btn-outline fa fa-trash" title="Rimuovi la recensione"></button>
                                                                <input name="deleteReviewId" hidden value="{{Auth::user()->reviews->where('product_id',$product->id)->first()->id}}">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt_20">
                                                    <label class="col-lg-8 review-title"><span style="margin-right: 8px">Titolo:</span>{{Auth::user()->reviews->where('product_id',$product->id)->first()->title}}</label>
                                                    <label class="col-lg-4 review-vote-date">
                                                        <span >Data:   </span>{{date('d-m-Y H:i', strtotime(Auth::user()->reviews->where('product_id',$product->id)->first()->created_at))}}
                                                        <span style="margin-left: 10px;">Voto:  </span>
                                                        @for ($i = 1; $i < 6; $i++)
                                                            @if($i <= Auth::user()->reviews->where('product_id',$product->id)->first()->vote)
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                            @else
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                            @endif
                                                        @endfor
                                                    </label>
                                                </div>
                                                <div style="margin-top:5px; text-align: justify;">
                                                    <p>{{Auth::user()->reviews->where('product_id',$product->id)->first()->text}}</p>
                                                </div>


                                                <div class="mt_10">
                                                    <div class="collapse" id="content1" >
                                                        <form action="{{route('Review.Edit')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            <input name="reviewId" hidden value="{{Auth::user()->reviews->where('product_id',$product->id)->first()->id}}">
                                                            <div class="form-group required mt_10" >
                                                                <div class="col-md-12">
                                                                    <label class="control-label" for="input-title">Modifica Titolo</label>
                                                                    <input name="title" id="input-title" class="form-control" type="text" data-required="true" required value="{{Auth::user()->reviews->where('product_id',$product->id)->first()->title}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group required">
                                                                <div class="col-md-12">
                                                                    <label class="control-label" for="input-review">Modifica Recensione</label>
                                                                    <textarea name="text" type="text" rows="10" id="input-review" class="form-control" data-required="true" required >{{Auth::user()->reviews->where('product_id',$product->id)->first()->text}}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <fieldset class="reviewRating">
                                                                        <input type="radio" id="starFive" name="reviewRating" value="5"/><label class = "full" for="starFive" title="Stupendo - 5 stars"></label>
                                                                        <input type="radio" id="starFour" name="reviewRating" value="4"/><label class = "full" for="starFour" title="Buono - 4 stars"></label>
                                                                        <input type="radio" id="starThree" name="reviewRating" value="3"/><label class = "full" for="starThree" title="Meh - 3 stars"></label>
                                                                        <input type="radio" id="starTwo" name="reviewRating" value="2"/><label class = "full" for="starTwo" title="Mediocre- 2 stars"></label>
                                                                        <input type="radio" id="starOne" name="reviewRating" value="1"/><label class = "full" for="starOne" title="Pessimo - 1 star"></label>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-sm-4 mb_20">
                                                                    <div class="pull-right pr_10">
                                                                        <button type="submit" class="btn" style="padding: 5px"> Modifica </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        @else
                                            <div class="mtb_10">
                                                <a data-toggle="collapse" data-target="#content"><h5><i class="fa fa-plus"></i>  Scrivi Una Recensione </h5></a>

                                                <div class="collapse" id="content">

                                                    <form action="{{route('Review.Add')}}" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
                                                        @csrf

                                                        <input name="productCod" hidden value="{{$product->cod}}">

                                                        <div class="form-group required mt_20">
                                                            <div class="col-sm-12">
                                                                <label class="control-label" for="input-title">Titolo Recensione</label><input name="title" id="input-title" class="form-control" type="text" data-required="true" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group required">
                                                            <div class="col-sm-12">
                                                                <label class="control-label" for="input-review">La Tua Recensione</label>
                                                                <textarea name="text" rows="5" id="input-review" class="form-control" data-required="true" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <fieldset class="reviewRating">
                                                                    <input type="radio" id="star5" name="reviewRating" value="5" /><label class = "full" for="star5" title="Stupendo - 5 stars"></label>
                                                                    <input type="radio" id="star4" name="reviewRating" value="4" /><label class = "full" for="star4" title="Buono - 4 stars"></label>
                                                                    <input type="radio" id="star3" name="reviewRating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                                    <input type="radio" id="star2" name="reviewRating" value="2" /><label class = "full" for="star2" title="Mediocre- 2 stars"></label>
                                                                    <input type="radio" id="star1" name="reviewRating" value="1" /><label class = "full" for="star1" title="Pessimo - 1 star"></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-4 mb_20">
                                                                <div class="pull-right pr_10">
                                                                    <button type="submit" class="btn">Invia</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                        @if(Auth::user()->reviews->contains('product_id',$product->id) )
                                            @foreach($product->reviews as $review)
                                                @if(Auth::user()->reviews->where('product_id',$product->id)->first()->id !== $review->id)
                                                    <div id="review" class="mt_10 mb_60">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="product-name"><span style="margin-right: 10px">Nome Utente: </span>{{$review->user->name}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="row mt_20">
                                                            <label class="col-lg-8 review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>
                                                            <label class="col-lg-4 review-vote-date">
                                                                <span >Data:   </span>{{date('d-m-Y H:i', strtotime($review->created_at))}}
                                                                <span style="margin-left: 10px;">Voto:  </span>
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
                                                            <p>{{$review->text}}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($product->reviews as $review)
                                                <div id="review" class="mt_10 mb_60">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="product-name"><span style="margin-right: 10px">Nome Utente: </span>{{$review->user->name}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt_20">
                                                        <label class="col-lg-8 review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>
                                                        <label class="col-lg-4 review-vote-date">
                                                            <span >Data:   </span>{{date('d-m-Y H:i', strtotime($review->created_at))}}
                                                            <span style="margin-left: 10px;">Voto:  </span>
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
                                                        <p>{{$review->text}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    @else
                                        @foreach($product->reviews as $review)
                                            <div id="review" class="mt_10 mb_60">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="product-name"><span style="margin-right: 10px">Nome Utente: </span>{{$review->user->name}}</label>
                                                    </div>
                                                </div>
                                                <div class="row mt_20">
                                                    <label class="col-lg-8 review-title"><span style="margin-right: 8px">Titolo:</span>{{$review->title}}</label>
                                                    <label class="col-lg-4 review-vote-date">
                                                        <span >Data:   </span>{{date('d-m-Y H:i', strtotime($review->created_at))}}
                                                        <span style="margin-left: 10px;">Voto:  </span>
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
                                                    <p>{{$review->text}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endauth
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
