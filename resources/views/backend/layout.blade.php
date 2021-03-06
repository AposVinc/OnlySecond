<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="it"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="it"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="it"> <![endif]-->
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

    @if(strpos(route::currentRouteName(),'Admin.Offer')!== false)
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="{{asset('/js/backend/calendar/jquery-ui-datapicker.js')}}"></script>
    @endif

</head>

<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url::route('Admin.Index')}}"><img src="{{url::asset('images/logo/lungo-O-bianca.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{url::route('Admin.Index')}}"><img src="{{url::asset('images/logo/corto-O-bianca.png')}}" alt="Logo"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{url::route('Admin.Index')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @if(auth('admin')->user()->can('gest_utenti'))
                    <h3 class="menu-title">Gestione Utenti</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"> </i>Utenti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.User.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.User.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.User.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.User.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.User.Restore')}}">Riattiva</a></li>
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
                @endif
                @if(auth('admin')->user()->can('gest_sito'))
                    <h3 class="menu-title">Gestione Sito</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info"> </i>Pagine</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gears"></i><a href="{{url::route('Admin.Page.About')}}">Chi Siamo</a></li>
                            <li><i class="fa fa-gears"></i><a href="{{url::route('Admin.Page.ContactUS')}}">Contattaci</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('gest_prodotti'))
                    <h3 class="menu-title">Gestione Brand</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Brand</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Brand.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Brand.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Brand.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Brand.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Brand.Restore')}}">Riattiva</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Collezioni</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Collection.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Collection.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Collection.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Collection.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Collection.Restore')}}">Riattiva</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class ="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Categorie</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Category.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Category.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Category.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Category.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Category.Restore')}}">Riattiva</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cube"> </i>Prodotti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Product.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Product.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Product.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Product.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Product.Restore')}}">Riattiva</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('gest_offerte'))
                    <h3 class="menu-title">Gestione Offerte</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-percent"> </i>Offerte</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Offer.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Offer.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Offer.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Offer.Delete')}}">Elimina</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('gest_banner') or auth('admin')->user()->can('gest_imgprod'))
                    <h3 class="menu-title">Gestione Immagini</h3>
                    @if(auth('admin')->user()->can('gest_banner'))
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"> </i>Banner</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Banner.List')}}">Lista</a></li>
                                <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Banner.Add')}}">Aggiungi</a></li>
                                <li><i class="fa fa-eye"></i><a href="{{url::route('Admin.Banner.Edit')}}">Mostra in Home</a></li>
                                <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Banner.Delete')}}">Elimina</a></li>
                                <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Banner.Restore')}}">Riattiva</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(auth('admin')->user()->can('gest_imgprod'))
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"> </i>Immagini Prodotti</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Image.List')}}">Lista</a></li>
                                <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Image.Add')}}">Aggiungi</a></li>
                                <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Image.EditMain')}}">Modifica img principale</a></li>
                                <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Image.Delete')}}">Elimina</a></li>
                            </ul>
                        </li>
                    @endif
                @endif
                @if(auth('admin')->user()->can('gest_fornitori'))
                    <h3 class="menu-title">Gestione Fornitori</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"> </i>Fornitori</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Supplier.List')}}">Lista</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Supplier.Add')}}">Aggiungi</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Supplier.Edit')}}">Modifica</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Supplier.Delete')}}">Elimina</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Supplier.Restore')}}">Riattiva</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('gest_newsletter'))
                    <h3 class="menu-title">Gestione Newsletters</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"> </i>Newsletters</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Newsletter.List')}}">Lista Mail</a></li>
                            <li><i class="fa fa-mail-forward"></i><a href="{{url::route('Admin.Newsletter.SendMailForm')}}">Invia Mail</a></li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('gest_assistenza'))
                    <h3 class="menu-title">Gestione Clienti</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-headphones"> </i>Assistenza Clienti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.ContactUS.List')}}">Lista Mail</a></li>
                        </ul>
                    </li>
                @endif
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
                    @foreach(auth('admin')->user()->roles as $role)
                        <a class="nav-link float-left">Ruolo: {{$role->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-5">
                <div>
                    <a class="nav-link float-right" href="{{route('Admin.Logout')}}"><i class="fa fa-sign-in"></i> Logout</a>
                    <a class="nav-link float-right" href="{{route('Home')}}"><i class="fa fa-home"></i> Front End</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header-->
    @yield('content')
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
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

@if(strpos(route::currentRouteName(),'.Index')!== false)
    <!--  flot-chart js -->
    <script src="{{ URL::asset('vendor/backend/flot/excanvas.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/flot/jquery.flot.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/flot/jquery.flot.time.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ URL::asset('vendor/backend/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ URL::asset('js/backend/init-scripts/flot-chart/curvedLines.js')}}"></script>
    <script src="{{ URL::asset('js/backend/init-scripts/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js')}}"></script>
    <!--  Chart js -->
    <script src="{{ URL::asset('vendor/backend/chart.js/dist/Chart.bundle.min.js')}}"></script>

    <script>
        (function($){

            "use strict"; // Start of use strict

            var SufeeAdmin = {
                pieFlot: function(data){

                    var plotObj = $.plot( $( "#flot-pie" ), data, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                label: {
                                    show: false,

                                }
                            }
                        },
                        grid: {
                            hoverable: true
                        },
                        tooltip: {
                            show: true,
                            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                            shifts: {
                                x: 20,
                                y: 0
                            },
                            defaultTheme: false
                        }
                    } );
                },
            };

            jQuery.ajax({
                url:'{{ route('Admin.GetFourProductMoreSent') }}',
                method:"GET",
                dataType: "json",
                success:function(result)
                {
                    SufeeAdmin.pieFlot(result);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });

        })(jQuery);
    </script>
    <script>
        ( function ( $ ) {
            "use strict";
        // single bar chart
            var ctx = document.getElementById( "singelBarChart" );
            ctx.height = 167;

            jQuery.ajax({
                url:'{{ route('Admin.GetSevenBrandMoreSent') }}',
                method:"GET",
                dataType: "json",
                success:function(result)
                {
                    var labels = [];
                    for(var i=0; i<result.length;i++){
                        labels.push(result[i].label);
                    }
                    var datasetsData = [];
                    for(var i=0; i<result.length;i++){
                        datasetsData.push(result[i].data);
                    }
                    var myChart = new Chart( ctx,{
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: "Prodotti Venduti",
                                    data: datasetsData,
                                    borderColor: "rgba(0, 123, 255, 0.9)",
                                    borderWidth: "0",
                                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [ {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                } ]
                            }
                        }
                    } );
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });

        } )( jQuery );
    </script>
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
    function GetCollection(){
        var divError = document.getElementById('error');
        divError.innerText ="";
        divError.classList.remove('alert','alert-danger');
        var selectCollection = document.getElementById('collection');
        selectCollection.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona la collezione";
        option.value = "";
        selectCollection.add(option);
        var selected = document.getElementById('brand');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetCollection') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result)
            {
                if(result.length === 0){
                    Error("Non ci sono Collezioni per il brand selezionato");
                }else{
                    result.forEach(AddOptionCollection);
                }
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

    function Error(msg){
        var divError= document.getElementById('error');
        divError.innerText = msg;
        divError.classList.add('alert', 'alert-danger');
    }

    function GetProduct(){
        var divError = document.getElementById('error');
        divError.innerText ="";
        divError.classList.remove('alert','alert-danger');
        var selectProduct = document.getElementById('product');
        selectProduct.options.length = 0;
        var option = document.createElement('option');
        option.text = "Seleziona il prodotto";
        option.value = "";
        selectProduct.add(option);
        var selected = document.getElementById('collection');
        var value = selected.options[selected.selectedIndex].value;

        jQuery.ajax({
            url:'{{ route('Admin.GetProduct') }}',
            method:"POST",
            dataType: "json",
            data:{value:value, _token: "{{ csrf_token() }}"},
            success:function(result) {
                if(result.length === 0){
                    Error("Non ci sono prodotti per la collezione selezionata");
                }else{
                    result.forEach(AddOptionProduct);
                }
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
</script>

@if(strpos(route::currentRouteName(),'Admin.Banner')!== false)
    <script>
        function GetBanner(){
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectBanner = document.getElementById('banner');
            selectBanner.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona il banner";
            option.value = "";
            selectBanner.add(option);
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetBanner') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    if(result.length === 0){
                        Error("Non ci sono Banner per la collezione selezionata");
                    }else{
                        result.forEach(AddOptionBanner);
                    }
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

    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Banner.Restore')!== false)
    <script>
        function GetBannerRestore(){
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectBanner = document.getElementById('banner');
            selectBanner.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona il banner";
            option.value = "";
            selectBanner.add(option);
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetBanner') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    if(result.length === 0){
                        Error("Non ci sono Banner da Riattivare per la collezione selezionata");
                    }else{
                        result.forEach(AddOptionBanner);
                    }
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Product.Add')!== false)
    <script>
        function VerifyCheck(){
            var listCheck = document.getElementsByClassName('checkbox');
            var check = false;
            for(var i=0;i< listCheck.length;i++){
                if(listCheck[i].children[0].children[0].checked){
                    check = true;
                }
            }
            if(!check) {
                var element = listCheck[0].children[0].children[0];
                element.required = true;
                element.oninvalid=function () {
                    element.setCustomValidity('Seleziona almeno una categoria');
                };
                element.oninput= function () {
                    element.setCustomValidity('');
                }
            }else{
                var element = listCheck[0].children[0].children[0];
                listCheck[0].children[0].removeChild(element);
                var newElement = document.createElement('input');
                newElement.type= "checkbox";
                newElement.name="1";
                newElement.value="1";
                newElement.classList.add('form-check-input');
                if(element.checked){
                    newElement.checked = true;
                }
                var parent = listCheck[0].children[0];
                parent.insertBefore(newElement, parent.firstChild);
            }
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Role')!== false)
    <script>
        function VerifyCheckRole(){
            var listCheck = document.getElementsByClassName('checkbox');
            var check = false;
            for(var i=0;i< listCheck.length;i++){
                if(listCheck[i].children[0].children[0].checked){
                    check = true;
                }
            }
            if(!check) {
                var element = listCheck[0].children[0].children[0];
                element.required = true;
                element.oninvalid=function () {
                    element.setCustomValidity('Seleziona almeno una gestione');
                };
                element.oninput= function () {
                    element.setCustomValidity('');
                }
            }else{
                var element = listCheck[0].children[0].children[0];
                listCheck[0].children[0].removeChild(element);
                var newElement = document.createElement('input');
                newElement.type= "checkbox";
                newElement.name="gest_utenti";
                newElement.value="gest_utenti";
                newElement.classList.add('form-check-input');
                if(element.checked){
                    newElement.checked = true;
                }
                var parent = listCheck[0].children[0];
                parent.insertBefore(newElement, parent.firstChild);
            }
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Product.Edit')!== false)
    <script>
        function GetNewCollection(){
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectCollection = document.getElementById('newcollection');
            selectCollection.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona la collezione";
            option.value = "";
            selectCollection.add(option);
            var selected = document.getElementById('newbrand');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetCollection') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    if(result.length === 0){
                        Error("Non ci sono Collezioni per il brand selezionato");
                    }else{
                        result.forEach(AddOptionNewCollection);
                    }
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
    </script>
@endif
@if(strpos(route::currentRouteName(),'Admin.Collection.Restore')!== false)
    <script>
        function GetCollectionRestore(){
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectCollection = document.getElementById('collection');
            selectCollection.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona la collezione";
            option.value = "";
            selectCollection.add(option);
            var selected = document.getElementById('brand');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetCollection') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result)
                {
                    if(result.length === 0){
                        Error("Non ci sono Collezioni da Riattivare per il brand selezionato");
                    }else{
                        result.forEach(AddOptionCollection);
                    }
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
        function GetProductRestore(){
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectProduct = document.getElementById('product');
            selectProduct.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona il prodotto";
            option.value = "";
            selectProduct.add(option);
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.RestoreGetProduct') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    if(result.length === 0){
                        Error("Non ci sono Prodotti da Riattivare per la collezione selezionata");
                    }else{
                        result.forEach(AddOptionProduct);
                    }
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }

    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Offer')!== false)
    <script>
        $( "#datepicker" ).datepicker();
    </script>
    <script>
        function GetProductWithOffer() {
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectProduct = document.getElementById('product');
            selectProduct.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona il prodotto";
            option.value = "";
            selectProduct.add(option);
            var selected = document.getElementById('collection');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url: '{{ route('Admin.GetProductWithOffer') }}',
                method: "POST",
                dataType: "json",
                data: {value: value, _token: "{{ csrf_token() }}"},
                success: function (result) {
                    if(result.length === 0){
                        Error("Non ci sono Prodotti con Offerte per la collezione selezionata");
                    }else{
                        result.forEach(AddOptionProduct);
                    }
                },
                error: function (xhr) {
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }

        function calculateDiscount(val, rate){
            return (val - Math.round(((val / 100) * rate) * 100) / 100);
        }

        function GetPrice(){
            var selected = document.getElementById('product');
            var price = document.getElementById('price');
            var value = selected.options[selected.selectedIndex].value;
            if(value != ""){
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
            }else{
                price.value = "";
            }
        }

        function GetDate(){
            var selected = document.getElementById('product');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetDate') }}',
                method:"POST",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    $('#datepicker').datepicker('setDate', result);
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }

        function GetPriceRate(){
            var price = document.getElementById('price');
            var rate = document.getElementById('rate');
            var pricerate = document.getElementById('pricerate');

            pricerate.value = calculateDiscount(price.value, rate.value);
        }

        function GetRate(){
            var selected = document.getElementById('product');
            var rate = document.getElementById('rate');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetRate') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    rate.value = result;
                    GetPriceRate();
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Image.Delete')!== false)
    <script>
        function GetImage(){
            var divError = document.getElementById('error');
            divError.innerText ="";
            divError.classList.remove('alert','alert-danger');
            var selectBanner = document.getElementById('image');
            selectBanner.options.length = 0;
            var option = document.createElement('option');
            option.text = "Seleziona l'immagine";
            option.value = "";
            selectBanner.add(option);
            var selected = document.getElementById('product');
            var value = selected.options[selected.selectedIndex].value;

            jQuery.ajax({
                url:'{{ route('Admin.GetImage') }}',
                method:"POST",
                dataType: "json",
                data:{value:value, _token: "{{ csrf_token() }}"},
                success:function(result) {
                    if(result.length === 0){
                        Error("Non ci sono Immagine per il prodotto selezionato");
                    }else{
                        result.forEach(AddOptionImage);
                    }
                },
                error:function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        }

        function AddOptionImage(item, index) {
            var selectImage = document.getElementById('image');
            var option = document.createElement('option');
            option.text= item.path_image;
            option.value= item.id;
            selectImage.add(option);
        }

    </script>
@endif
@if(strpos(route::currentRouteName(),'.List')!== false)
    <script type="text/javascript">
        jQuery(function($) {
            $('a').on('click', function () {
                if($(this).attr('id') == "iconDelete"){
                    $('#buttonDelete').attr('href', $(this).data('url'));
                }
                if($(this).attr('id') == "iconRestore"){
                    $('#buttonRestore').attr('href', $(this).data('url'));
                }
            })
        });
    </script>
@endif
</body>

</html>
