<nav class="navbar">
    <p>Menù</p>
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
    <div class="collapse navbar-collapse js-navbar-collapse">
        <ul id="menu" class="nav navbar-nav">
            <li> <a href="{{route('Home')}}">Home</a></li>
            <li> <a href="{{route("Shop")}}">Shop</a></li>

            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">Brand </a> <!-- non funzione l'href-->
                <ul class="dropdown-menu">
                    <!-- poi ci andra un while che per ogni brand estatto dal database aggiunge all'elenco un <li>, la lista deve esser ordinata alfanumericamente
                    se vogliamo possiamo mettere un limite sul numero e mandare a capo dopo 6 brand o una cosa del genere
                    la pagina che si apre deve aver gia settato i filti. se scelgo tissot avro solo tissot-->
                    @foreach($brands as $brand)
                        <li> <a href="{{ route('Shop') }}">{{$brand->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorie</a>
                <ul class="dropdown-menu mega-dropdown-menu row">
                    <li class="col-md-3">
                        <ul>
                            <li class="dropdown-header">Donna</li>
                            @foreach($categoriesF as $categoryF)
                                <li><a href="{{ route('Shop') }}">{{$categoryF->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="col-md-3">
                        <ul>
                            <li class="dropdown-header">Uomo</li>
                            @foreach($categoriesM as $categoryM)
                                <li><a href="{{ route('Shop') }}">{{$categoryM->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="col-md-3">
                        <ul>
                            <li class="dropdown-header">Unisex</li>
                            @foreach($categoriesU as $categoryU)
                                <li><a href="{{ route('Shop') }}">{{$categoryU->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <!--  IMMAGINE NELLA TENDINA DELLE CATEGORIE   -->
                    <li class="col-md-3">
                        <ul>
                            <li id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active"> <a href="#"><img src="{{asset('storage/menu-banner3.jpg')}}" class="img-responsive" alt="Banner1"></a></div>
                                    <!-- End Item -->
                                    <div class="item"> <a href="#"><img src="{{asset('storage/menu-banner3.jpg')}}" class="img-responsive" alt="Banner1"></a></div>
                                    <!-- End Item -->
                                    <div class="item"> <a href="#"><img src="{{asset('storage/menu-banner3.jpg')}}" class="img-responsive" alt="Banner1"></a></div>
                                    <!-- End Item -->
                                </div>
                                <!-- End Carousel Inner -->
                            </li>
                            <!-- /.carousel -->
                        </ul>
                    </li>
                </ul>
            </li>

            <li> <a href="{{route('About')}}">Chi siamo</a></li>
            <li> <a href="{{route('ContactUS')}}">Contattaci</a>
            <li> <a href="{{route('Discount')}}">In Sconto %</a>

        </ul>
    </div>
    <!-- /.nav-collapse -->
</nav>
