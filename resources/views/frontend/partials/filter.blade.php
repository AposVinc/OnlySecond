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
                <p>
                    <label for="amount">Range Prezzo:</label>
                    <input type="text" id="amount" name="price-range" minprice="" maxprice="" readonly>
                </p>
                <div id="slider-range" class="mtb_20"></div>

                <div class="list-group-item mb_10">
                    <label>Sconto</label>
                    <div id="filter-group-rates">
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
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item mb_10">
                        <label>Genere</label>
                        <div id="filter-group-genres">
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
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Brand</label>
                        <div id="filter-group-brands" class="filter-group">
                            @foreach($brands as $brand)
                                <div class="checkbox">
                                    <label>
                                        <input value="{{$brand->id}}" type="checkbox" name="brands_checked[]"> {{$brand->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Collezioni</label>
                        <div id="filter-group-collections" class="filter-group">
                            @foreach($collections as $collection)
                                <div class="checkbox">
                                    <label>
                                        <input value="{{$collection->id}}" type="checkbox" name="collections_checked[]"> {{$collection->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Categorie</label>
                        <div id="filter-group-categories" class="filter-group">
                            @foreach($categories as $category)
                                <div class="checkbox">
                                    <label>
                                        <input value="{{$category->id}}" type="checkbox" name="categories_checked[]"> {{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Colore</label>
                        <div id="filter-group-colors" class="filter-group">
                            @foreach($colors as $color)
                                <div class="checkbox">
                                    <label>
                                        <input value="{{$color->hex}}" type="checkbox" name="colors_checked[]"> {{$color->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="list-group-item mb_10">
                        <label>Materiale</label>
                        <div id="filter-group-materials" class="filter-group">
                            @foreach($materials as $material)
                                <div class="checkbox">
                                    <label>
                                        <input value="{{$material->material}}" type="checkbox" name="materials_checked[]"> {{$material->material}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn">Filtra</button> <!--  onclick="filtering()" -->
                    <button type="reset" class="btn ml_5">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

