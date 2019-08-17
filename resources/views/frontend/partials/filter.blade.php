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
            <div class="list-group">
                <div class="list-group-item mb_10">
                    <label>Genere</label>
                    <div id="filter-group1">
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
                    <div id="filter-group2">
                        @foreach($brands as $brand)
                            <div class="checkbox">
                                <label>
                                    <input value="{{$brand->id}}" type="checkbox"> {{$brand->name}} </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="list-group-item mb_10">
                    <label>Colore</label>
                    <div id="filter-group3">
                        @foreach($colors as $color)
                            <div class="checkbox">
                                <label>
                                    <input value="{{$color->color}}" type="checkbox"> {{$color->color}} </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="list-group-item mb_10">
                    <label>Materiale</label>
                    <div id="filter-group4">
                        <div class="checkbox">
                            <label>
                                <input value="" type="checkbox"> Acciaio </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input value="" type="checkbox"> Legno </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input value="" type="checkbox"> Pelle </label>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn">Filtra</button>
            </div>
        </div>
    </div>
</div>
