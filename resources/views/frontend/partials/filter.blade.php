<div id="column-left" class="col-sm-4 col-lg-3 ">
    <div class="filter left-sidebar-widget mb_50">
        <div class="heading-part mtb_20 ">
            <h2 class="main_title">Applica i Filtri</h2>
        </div>
        <div class="filter-block">
            <p>
                <label for="amount">Range Prezzo:</label>
                <input type="text" id="amount" readonly>
            </p>
            <div id="slider-range" class="mtb_20"></div>
            <div class="list-group-item mb_10">
                <label>Sconto</label>
                <div id="filter-group">
                    <div class="checkbox">
                        <label>
                            <input value="sconto" type="checkbox"> Fino al 50% </label>
                    </div>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item mb_10">
                    <label>Genere</label>
                    <div id="filter-group">
                        <div class="checkbox">
                            <label>
                                <input value="M" type="checkbox"> Uomo </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input value="F" type="checkbox"> Donna </label>
                        </div>
                        <div class="checkbox ">
                            <label>
                                <input value="U" type="checkbox"> Unisex </label>
                        </div>
                    </div>
                </div>
                <div class="list-group-item mb_10">
                    <label>Brand</label>
                    <div id="filter-group-brands" class="filter-group">
                        @foreach($brands as $brand)
                            <div class="checkbox">
                                <label>
                                    <input value="{{$brand->id}}" type="checkbox"> {{$brand->name}}</label>
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
                                    <input value="{{$collection->id}}" type="checkbox"> {{$collection->name}}</label>
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
                                    <input value="{{$color->hex}}" type="checkbox"> {{$color->name}}</label>
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
                                    <input value="{{$material->material}}" type="checkbox"> {{$material->material}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="btn">Filtra</button>
            </div>
        </div>
    </div>
</div>

