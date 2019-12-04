<div id="column-left" class="col-sm-4 col-lg-3 ">
    <div class="filter left-sidebar-widget mb_50">
        <div class="heading-part mtb_20 ">
            <h2 class="main_title">Applica i Filtri</h2>
        </div>

        <div class="filter-block">
            @if (strpos(route::currentRouteName(),'Shop')!== false)
                <form action="{{route('Shop.Filter.GetProducts')}}" method="get">
            @endif
            @if(strpos(route::currentRouteName(),'Discount')!== false)
                <form action="{{route('Discount.Filter.GetProducts')}}" method="get">
            @endif

                @if(session()->has('minprice') and session()->has('maxprice'))
                        <p>
                            <label for="amount">Range Prezzo:</label>
                            <input type="text" id="amount" name="price_range" minprice="{{session()->get('minprice')}}" maxprice="{{session()->get('maxprice')}}" readonly>
                        </p>
                        <div id="slider-range" class="mtb_20"></div>
                @else
                        <p>
                            <label for="amount">Range Prezzo:</label>
                            <input type="text" id="amount" name="price_range" minprice="" maxprice="" readonly>
                        </p>
                        <div id="slider-range" class="mtb_20"></div>
                @endif

                <div class="list-group-item mb_10">
                    <label>Sconto</label>
                    <div id="filter-group-rates">
                        @if(session()->has('rates_checked'))
                            @if(in_array("10" ,session()->get('rates_checked')))
                                    <div class="checkbox">
                                        <label>
                                            <input value="10" checked="checked" type="checkbox" name="rates_checked[]"> Dal 10% </label>
                                    </div>
                            @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="10" type="checkbox" name="rates_checked[]"> Dal 10% </label>
                                    </div>
                            @endif
                            @if(in_array("20" ,session()->get('rates_checked')))
                                    <div class="checkbox">
                                        <label>
                                            <input value="20" checked="checked" type="checkbox" name="rates_checked[]"> Dal 20% </label>
                                    </div>
                            @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="20" type="checkbox" name="rates_checked[]"> Dal 20% </label>
                                    </div>
                            @endif
                            @if(in_array("30" ,session()->get('rates_checked')))
                                    <div class="checkbox">
                                        <label>
                                            <input value="30" checked="checked" type="checkbox" name="rates_checked[]"> Dal 30% </label>
                                    </div>
                            @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="30" type="checkbox" name="rates_checked[]"> Dal 30% </label>
                                    </div>
                            @endif
                        @else
                            <div class="checkbox">
                                <label>
                                    <input value="10" type="checkbox" name="rates_checked[]"> Dal 10% </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input value="20" type="checkbox" name="rates_checked[]"> Dal 20% </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input value="30" type="checkbox" name="rates_checked[]"> Dal 30% </label>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item mb_10">
                        <label>Genere</label>
                        <div id="filter-group-genres">
                            @if(session()->has('genres_checked'))
                                    @if(in_array("M" ,session()->get('genres_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="M" checked="checked" type="checkbox" name="genres_checked[]"> Uomo </label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="M" type="checkbox" name="genres_checked[]"> Uomo </label>
                                        </div>
                                    @endif
                                    @if(in_array("F" ,session()->get('genres_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="F" checked="checked" type="checkbox" name="genres_checked[]"> Donna </label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="F" type="checkbox" name="genres_checked[]"> Donna </label>
                                        </div>
                                    @endif
                                    @if(in_array("U" ,session()->get('genres_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="U" checked="checked" type="checkbox" name="genres_checked[]"> Unisex </label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="U" type="checkbox" name="genres_checked[]"> Unisex </label>
                                        </div>
                                    @endif
                            @else
                                <div class="checkbox">
                                    <label>
                                        <input value="M" type="checkbox" name="genres_checked[]"> Uomo </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input value="F" type="checkbox" name="genres_checked[]"> Donna </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input value="U" type="checkbox" name="genres_checked[]"> Unisex </label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Brand</label>
                        <div id="filter-group-brands" class="filter-group">
                            @foreach($brands as $brand)
                                @if(session()->has('brands_checked'))
                                    @if(in_array($brand->id ,session()->get('brands_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$brand->id}}" checked="checked" type="checkbox" name="brands_checked[]"> {{$brand->name}}</label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$brand->id}}" type="checkbox" name="brands_checked[]"> {{$brand->name}}</label>
                                        </div>
                                    @endif
                                @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="{{$brand->id}}" type="checkbox" name="brands_checked[]"> {{$brand->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Collezioni</label>
                        <div id="filter-group-collections" class="filter-group">
                            @foreach($collections as $collection)
                                @if(session()->has('collections_checked'))
                                    @if(in_array($collection->id ,session()->get('collections_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$collection->id}}" checked="checked" type="checkbox" name="collections_checked[]"> {{$collection->name}}</label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$collection->id}}" type="checkbox" name="collections_checked[]"> {{$collection->name}}</label>
                                        </div>
                                    @endif
                                @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="{{$collection->id}}" type="checkbox" name="collections_checked[]"> {{$collection->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Categorie</label>
                        <div id="filter-group-categories" class="filter-group">
                            @foreach($categories as $category)
                                @if(session()->has('categories_checked'))
                                    @if(in_array($category->id ,session()->get('categories_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$category->id}}" checked="checked" type="checkbox" name="categories_checked[]"> {{$category->name}}</label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$category->id}}" type="checkbox" name="categories_checked[]"> {{$category->name}}</label>
                                        </div>
                                    @endif
                                @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="{{$category->id}}" type="checkbox" name="categories_checked[]"> {{$category->name}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Colore</label>
                        <div id="filter-group-colors" class="filter-group">
                            @foreach($colors as $color)
                                    @if(session()->has('colors_checked'))
                                        @if(in_array($color->hex,session()->get('colors_checked')))
                                            <div class="checkbox">
                                                <label>
                                                    <input value="{{$color->hex}}" checked="checked" type="checkbox" name="colors_checked[]"> {{$color->name}}</label>
                                            </div>
                                        @else
                                            <div class="checkbox">
                                                <label>
                                                    <input value="{{$color->hex}}" type="checkbox" name="colors_checked[]"> {{$color->name}}</label>
                                            </div>
                                        @endif
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$color->hex}}" type="checkbox" name="colors_checked[]"> {{$color->name}}</label>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Materiale</label>
                        <div id="filter-group-materials" class="filter-group">
                            @foreach($materials as $material)
                                @if(session()->has('materials_checked'))
                                    @if(in_array($material->material, session()->get('materials_checked')))
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$material->material}}" checked="checked" type="checkbox" name="materials_checked[]"> {{$material->material}}</label>
                                        </div>
                                    @else
                                        <div class="checkbox">
                                            <label>
                                                <input value="{{$material->material}}" type="checkbox" name="materials_checked[]"> {{$material->material}}</label>
                                        </div>
                                    @endif
                                @else
                                    <div class="checkbox">
                                        <label>
                                            <input value="{{$material->material}}" type="checkbox" name="materials_checked[]"> {{$material->material}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="select_sort" value="name_ASC">
                    @php
                        session()->forget(['minprice', 'maxprice', 'rates_checked', 'genres_checked', 'brands_checked', 'collections_checked', 'categories_checked', 'colors_checked', 'materials_checked']);
                    @endphp
                    <button id="btnSubmit" type="submit" class="btn">Filtra</button> <!--  onclick="filtering()" -->
                    <button type="reset" class="btn ml_5">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

