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
                                        <a href="{{route('Product', ['cod' => $product->cod])}}"  data-fancybox="group1">
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

                            <div class="original_price mt_0">
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

                                        <div class="Color col-md-4">
                                            <label>Colore</label>
                                            <select name="product_color" id="select-by-color" class="selectpicker form-control mt_10">
                                                <option>
                                                @foreach($product->color() as $color)
                                                    {{$color->name}}
                                                @endforeach
                                                </option>
                                                <option>rosso</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 qty form-group2">
                                            <label>Quantità</label>
                                            <input name="product_quantity" min="1" value="1" type="number" class="mt_10">
                                        </div>

                                        <div class="button-group mt_30 col-md-4">
                                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="col-md-12">
                            <div id="exTab5" class="mtb_30">
                                <ul class="nav nav-tabs">
                                    <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                                    <li><a href="#2c" data-toggle="tab">Reviews (1)</a> </li>
                                    <li><a href="#3c" data-toggle="tab">Solution</a> </li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="tab-pane active pt_20" id="1c">
                                        <p>CLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id tristique. Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus, justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper diam ipsum vel tellus.</p>
                                    </div>
                                    <div class="tab-pane" id="2c">
                                        <form class="form-horizontal">
                                            <div id="review"></div>
                                            <h4 class="mt_20 mb_30">Write a review</h4>
                                            <div class="form-group required">
                                                <div class="col-sm-12">
                                                    <label class="control-label" for="input-name">Your Name</label>
                                                    <input name="name" value="" id="input-name" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="col-sm-12">
                                                    <label class="control-label" for="input-review">Your Review</label>
                                                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="col-md-6">
                                                    <label class="control-label">Rating</label>
                                                    <div class="rates"><span>Bad</span>
                                                        <input name="rating" value="1" type="radio">
                                                        <input name="rating" value="2" type="radio">
                                                        <input name="rating" value="3" type="radio">
                                                        <input name="rating" value="4" type="radio">
                                                        <input name="rating" value="5" type="radio">
                                                        <span>Good</span></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="buttons pull-right">
                                                        <button type="submit" class="btn btn-md btn-link">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane pt_20" id="3c">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id tristique. Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus, justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper diam ipsum vel tellus.applied clearfix to the tab-content to rid of the gap between the tab and the content</p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>

    </div>

@endsection
