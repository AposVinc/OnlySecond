<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="it">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Only Second</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{URL::asset("images/backend/gear.png")}}">
    <link rel="shortcut icon" href="{{URL::asset("images/backend/gear.ico")}}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/jqvmap/dist/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/backend/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/backend/isa.css') }}"> <!-- aggiunta non ricordo per cosa -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--css tabella liste-->
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/backend/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
</head>

<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{'Admin.Index'}}"><img src="{{url::asset('images/logo/lungo-O-bianca.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{'Admin.Index'}}"><img src="{{url::asset('images/logo/corto-O-bianca.png')}}" alt="Logo"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @can('gest_utenti')
                    <h3 class="menu-title">Gestione Utenti</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"> </i>Utenti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.User.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.User.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.User.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.User.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.User.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Ruoli</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Role.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Role.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Role.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Role.Delete')}}">Elimina</a></li>
                        </ul>
                    </li>
                @endcan
                @can('gest_prodotti')
                    <h3 class="menu-title">Gestione Brand</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Brand</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Brand.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Brand.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Brand.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Brand.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Brand.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Collezioni</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Collection.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Collection.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Collection.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Collection.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Collection.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class ="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Categorie</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Category.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Category.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Category.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Category.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Category.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cube"> </i>Prodotti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Product.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Product.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Product.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Product.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Product.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                @endcan
                @can('gest_offerte')
                    <h3 class="menu-title">Gestione Offerte</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-percent"> </i>Offerte</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Offer.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Offer.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Offer.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Offer.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Offer.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                @endcan
                @if(auth()->user()->can('gest_banner') or auth()->user()->can('gest_imgprod'))
                    <h3 class="menu-title">Gestione Immagini</h3>
                    @can('gest_banner')
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"> </i>Banner</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Banner.List')}}">Lista</a></li>
                                <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Banner.Add')}}">Aggiungi</a></li>
                                <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Banner.Edit')}}">Modifica</a></li>
                                <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Banner.Delete')}}">Elimina</a></li>
                                <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Banner.Restore')}}">Ripristina</a></li>
                            </ul>
                        </li>
                    @endcan
                    @can('gest_imgprod')
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"> </i>Immagine Prodotto</a>
                            <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Banner.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Banner.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Banner.Restore')}}">Ripristina</a></li>-->
                                <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Image.List')}}">Lista</a></li>
                                <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Image.Add')}}">Aggiungi</a></li>
                            </ul>
                        </li>
                    @endcan
                @endif
                @can('gest_fornitori')
                    <h3 class="menu-title">Gestione Fornitori</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"> </i>Fornitori</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Supplier.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Supplier.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Supplier.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Supplier.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Supplier.Restore')}}">Ripristina</a></li>
                        </ul>
                    </li>
                @endcan
                @can('gest_newsletter')
                    <h3 class="menu-title">Gestione Newsletters</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"> </i>Newsletters</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Newsletter.List')}}">Lista Mail</a></li>
                            <li><i class="fa fa-mail-forward"></i><a href="{{url::route('Admin.Newsletter.SendMailForm')}}">Invia Mail</a></li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
<!-- Left Panel -->

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    @foreach(auth()->user()->roles as $role)
                        @if($role->name != 'cliente')
                            <a class="nav-link float-left">Ruolo: {{$role->name}}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-5">
                <div>
                    @auth
                        <a class="nav-link float-right" href="{{route('user.logout')}}"><i class="fa fa-sign-in"></i> Logout</a>
                    @else
                        <a class="nav-link float-right" href="{{route('Admin.LoginForm')}}"><i class="fa fa-sign-out"></i> Login</a>
                    @endauth
                    <a class="nav-link float-right" href="{{route('Home')}}"><i class="fa fa-home"></i> Front End</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header-->
    @yield('content')
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{ URL::asset('vendor/backend/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/backend/main.js') }}"></script>

<script src="{{ URL::asset('vendor/backend/chart.js/dist/Chart.bundle.min.js') }}"></script>
<script src="{{ URL::asset('js/backend/dashboard.js') }}"></script>
<script src="{{ URL::asset('js/backend/widgets.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ URL::asset('vendor/backend/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>

<!--script tabella liste-->
@if(strpos(route::currentRouteName(),'.List')!== false)
    <script src="{{ URL::asset('vendor/backend/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ URL::asset('js/backend/init-scripts/data-table/datatables-init.js')}}"></script>
@endif


<script>
    (function($) {
        "use strict";
        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>

<script>
    function EditCollection(){
        var selectCollection = document.getElementById('collection');
        selectCollection.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona la collezione";
        option.value = "";
        selectCollection.add(option);
        var data;
        var selected = document.getElementById('brand');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetCollection') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result)
            {
                data=result;
                data.forEach(AddOptionCollection);
            },
            error:function(xhr){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });
    }
    function AddOptionCollection(item, index) {
        var selectCollection = document.getElementById('collection');
        var option = document.createElement('option');
        option.text= item.name;
        option.value= item.id;
        selectCollection.add(option);
    }


    function EditNewCollection(){
        var selectCollection = document.getElementById('newcollection');
        selectCollection.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona la collezione";
        option.value = "";
        selectCollection.add(option);
        var data;
        var selected = document.getElementById('newbrand');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetCollection') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result)
            {
                data=result;
                data.forEach(AddOptionNewCollection);
            },
            error:function(xhr){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });
    }
    function AddOptionNewCollection(item, index) {
        var selectCollection = document.getElementById('newcollection');
        var option = document.createElement('option');
        option.text= item.name;
        option.value= item.id;
        selectCollection.add(option);
    }


    function EditProduct(){
        var selectProduct = document.getElementById('product');
        selectProduct.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona il prodotto";
        option.value = "";
        selectProduct.add(option);
        var data;
        var selected = document.getElementById('collection');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetProduct') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result) {
                data=result;
                data.forEach(AddOptionProduct);
            },
            error:function(xhr){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });
    }
    function AddOptionProduct(item, index) {
        var selectProduct = document.getElementById('product');
        var option = document.createElement('option');
        option.text= item.cod;
        option.value= item.id;
        selectProduct.add(option);
    }


    function EditBanner(){
        var selectBanner = document.getElementById('banner');
        selectBanner.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona il banner";
        option.value = "";
        selectBanner.add(option);
        var data;
        var selected = document.getElementById('collection');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetBanner') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result) {
                data=result;
                data.forEach(AddOptionBanner);
            },
            error:function(xhr){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });
    }
    function AddOptionBanner(item, index) {
        var selectBanner = document.getElementById('banner');
        var option = document.createElement('option');
        option.text= item.path_image;
        option.value= item.id;
        selectBanner.add(option);
    }


    function EditOffer(){
        var selectOffer = document.getElementById('offer');
        selectOffer.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona l'offerta";
        option.value = "";
        selectOffer.add(option);
        var data;
        var selected = document.getElementById('product');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetOffer') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result) {
                data=result;
                data.forEach(AddOptionOffer);
            },
            error:function(xhr){
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
            }
        });
    }
    function AddOptionOffer(item, index) {
        var selectOffer = document.getElementById('offer');
        var option = document.createElement('option');
        option.text= item.id;
        option.value= item.id;
        selectOffer.add(option);
    }

</script>


@if(strpos(route::currentRouteName(),'Admin.Collection.Restore')!== false)
    <script>
        function EditCollectionRestore(){
            var selectCollection = document.getElementById('collection');
            selectCollection.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona la collezione";
            option.value = "";
            selectCollection.add(option);
            var data;
            var selected = document.getElementById('brand');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetCollection') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    data=result;
                    data.forEach(AddOptionCollection);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Product.Restore')!== false)
    <script>
        function EditProductRestore(){
            var selectProduct = document.getElementById('product');
            selectProduct.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona il prodotto";
            option.value = "";
            selectProduct.add(option);
            var data;
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetProduct') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    data=result;
                    data.forEach(AddOptionProduct);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Banner.Restore')!== false)
    <script>
        function EditBannerRestore(){
            var selectBanner = document.getElementById('banner');
            selectBanner.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona il banner";
            option.value = "";
            selectBanner.add(option);
            var data;
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetBanner') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    data=result;
                    data.forEach(AddOptionBanner);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Offer.Add')!== false or strpos(route::currentRouteName(),'Admin.Offer.Edit')!== false)
    <script>
        function EditPrice(){
            var selected = document.getElementById('product');
            var price = document.getElementById('price');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetPrice') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    price.value = result;
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }

        function EditPriceRate(){
            var price = document.getElementById('price');
            var rate = document.getElementById('rate');
            var pricerate = document.getElementById('price-rate');

            pricerate.value = Math.round( ((price.value/100)*rate.value) * 100) / 100;
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Offer.Restore')!== false)
    <script>
        function EditOfferRestore(){
            var selectOffer = document.getElementById('offer');
            selectOffer.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona l'offerta";
            option.value = "";
            selectOffer.add(option);
            var data;
            var selected = document.getElementById('product');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetOffer') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    data=result;
                    data.forEach(AddOptionBanner);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }
    </script>
@endif


<!--
@if(strpos(route::currentRouteName(),'Admin.Product')!== false)
    <script src="{{ URL::asset('vendor/backend/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/backend/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js') }}"></script>
    <script src="{{ URL::asset('js/backend/main.js') }}"></script>
@endif

@if(strpos(route::currentRouteName(),'Admin')!== false)
    <script>
        jQuery(document).ready(function(){
            jQuery('.dynamic').change(function(){
                if(jQuery(this).val() != '0') {
                    let sel = document.getElementById('collection');
                    for (i = sel.length - 1; i >= 0; i--) {
                        if (i!=0) sel.remove(i);
                    }
                    var select = jQuery(this).attr("id");
                    var value = jQuery(this).val();
                    var dependent = jQuery(this).data('dependent');
                    var _token = jQuery('input[name="_token"]').val();
                    var path = window.location.pathname;

                    jQuery.ajax({
                        url:((path.includes('Restore')) ? ('{{ route('Admin.RestoreGetCollection') }}'): ('{{ route('Admin.GetCollection') }}')),
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result) {
                            jQuery('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Banner')!== false)
    ---------- serve per prendere i banner  -----------
    <script>
        jQuery(document).ready(function(){
            jQuery('.dynamicBanner').change(function(){
                if(jQuery(this).val() != '0') {
                    let sel = document.getElementById('banner');
                    for (i = sel.length - 1; i >= 0; i--) {
                        if (i!=0) sel.remove(i);
                    }
                    var select = jQuery(this).attr("id");
                    var value = jQuery(this).val();
                    var dependent = jQuery(this).data('dependent');
                    var _token = jQuery('input[name="_token"]').val();
                    var path = window.location.pathname;

                    jQuery.ajax({
                        url:((path.includes('Restore')) ? ('{{ route('Admin.Banner.RestoreGetBanner') }}'): ('{{ route('Admin.Banner.GetBanner') }}')),
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result) {
                            jQuery('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script>

    <script>
        jQuery(document).ready(function() {
            jQuery('.visualizza').change(function () {
                let node = document.getElementById('prova');
                if(node.childNodes.length>1){
                    var img =document.getElementById("img");
                    node.removeChild(img);
                }
                var image = this.options[this.selectedIndex].text;
                if(image != 'Seleziona il banner'){
                    var nodeadd=document.createElement('img');
                    var url = "http://localhost/OnlySecond/public/../images/" + image;
                    nodeadd.src=url;
                    nodeadd.id="img";
                    node.appendChild(nodeadd);
                }
            });
        });
    </script>

@endif

@if(strpos(route::currentRouteName(),'Admin.Image')!== false or strpos(route::currentRouteName(),'Admin.Product')!== false)
    <script>
        jQuery(document).ready(function(){
            jQuery('.dynamicProduct').change(function(){
                if(jQuery(this).val() != '0') {
                    let sel = document.getElementById('product');
                    for (i = sel.length - 1; i >= 0; i--) {
                        if (i!=0) sel.remove(i);
                    }
                    var select = jQuery(this).attr("id");
                    var value = jQuery(this).val();
                    var dependent = jQuery(this).data('dependent');
                    var _token = jQuery('input[name="_token"]').val();
                    var path = window.location.pathname;

                    jQuery.ajax({
                        url:((path.includes('Restore')) ? ('{{ route('Admin.RestoreGetProduct') }}'): ('{{ route('Admin.GetProduct') }}')),
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result) {
                            jQuery('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Image')!== false )
    <script>
        jQuery(document).ready(function(){
            jQuery('.dynamicImage').change(function(){
                if(jQuery(this).val() != '0') {
                    let sel = document.getElementById('image');
                    for (i = sel.length - 1; i >= 0; i--) {
                        if (i!=0) sel.remove(i);
                    }
                    var select = jQuery(this).attr("id");
                    var value = jQuery(this).val();
                    var dependent = jQuery(this).data('dependent');
                    var _token = jQuery('input[name="_token"]').val();
                    var path = window.location.pathname;

                    jQuery.ajax({
                        url:((path.includes('Restore')) ? ('{{ route('Admin.Image.RestoreGetImage') }}'): ('{{ route('Admin.Image.GetImage') }}')),
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result) {
                            jQuery('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Offer')!== false )
    <script>
        jQuery(document).ready(function(){
            jQuery('.dynamicOffer').change(function(){
                if(jQuery(this).val() != '0') {
                    let sel = document.getElementById('offer');
                    for (i = sel.length - 1; i >= 0; i--) {
                        if (i!=0) sel.remove(i);
                    }
                    var select = jQuery(this).attr("id");
                    var value = jQuery(this).val();
                    var dependent = jQuery(this).data('dependent');
                    var _token = jQuery('input[name="_token"]').val();
                    var path = window.location.pathname;

                    jQuery.ajax({
                        url:((path.includes('Restore')) ? ('{{ route('Admin.Offer.RestoreGetOffer') }}'): ('{{ route('Admin.Offer.GetOffer') }}')),
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result) {
                            jQuery('#'+dependent).html(result);
                        }
                    })
                }
            });
        });
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Banner.List')!== false or strpos(route::currentRouteName(),'Admin.Image.List')!== false)
    <script>
        jQuery("#click").click(function() {
            var image = jQuery(event.target).text();
            if(image.includes('png') || image.includes('jpg')){
                var url = "http://localhost/OnlySecond/public/../images/" + image;
                PopupCentrata(url);
            }
        });
    </script>
    <script type="text/javascript">
        function PopupCentrata(url)
        {
            var w = 600;
            var h = 450;
            var l = Math.floor((screen.width-w)/2);
            var t = Math.floor((screen.height-h)/2);
            window.open(url,"","width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
        }
    </script>
@endif
-->
</body>

</html>
