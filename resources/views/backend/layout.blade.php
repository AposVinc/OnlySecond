<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/TecnologieDelWeb/template/back-end/apple-icon.png">
    <link rel="shortcut icon" href="/TecnologieDelWeb/template/back-end/favicon.ico">

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
            <a class="navbar-brand" href="layout"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="layout"><img src="images/logo2.png" alt="Logo"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @can('gest_prodotti')
                    <h3 class="menu-title">Brand</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Gestione Brand</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Brand.List')}}">Lista Brand</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Brand.Add')}}">Aggiungi Brand</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Brand.Edit')}}">Modifica Brand</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Brand.Delete')}}">Elimina Brand</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Brand.Restore')}}">Ripristina Brand</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Gestione Collezioni</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Collection.List')}}">Lista Collezioni</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Collection.Add')}}">Aggiungi Collezione</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Collection.Edit')}}">Modifica Collezione</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Collection.Delete')}}">Elimina Collezione</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Collection.Restore')}}">Ripristina Collezione</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class ="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Gestione Categorie</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Category.List')}}">Lista Categorie</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Category.Add')}}">Aggiungi Categoria</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Category.Edit')}}">Modifica Categoria</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Category.Delete')}}">Elimina Categoria</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Category.Restore')}}">Ripristina Categoria</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Prodotto</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Gestione Prodotti</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Product.List')}}">Lista Prodotto</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Product.Add')}}">Aggiungi Prodotto</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Product.Edit')}}">Modifica Prodotto</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Product.Delete')}}">Elimina Prodotto</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Product.Restore')}}">Ripristina Prodotto</a></li>
                        </ul>
                    </li>
                @endcan
                @can('gest_offerte')
                    <h3 class="menu-title">Offerte</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Gestione Offerte</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Offer.List')}}">Lista Offerte</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Offer.Add')}}">Aggiungi Offerta</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Offer.Edit')}}">Modifica Offerta</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Offer.Delete')}}">Elimina Offerta</a></li>

                        </ul>
                    </li>
                @endcan
                @can('gest_fornitori')
                    <h3 class="menu-title">Fornitori</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Gestione Fornitori</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Supplier.List')}}">Lista Fornitori</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="{{url::route('Admin.Supplier.Add')}}">Aggiungi Fornitore</a></li>
                            <li><i class="fa fa-edit"></i><a href="{{url::route('Admin.Supplier.Edit')}}">Modifica Fornitore</a></li>
                            <li><i class="fa fa-minus-square-o"></i><a href="{{url::route('Admin.Supplier.Delete')}}">Elimina Fornitore</a></li>
                            <li><i class="fa fa-refresh"></i><a href="{{url::route('Admin.Supplier.Restore')}}">Ripristina Fornitore</a></li>
                        </ul>
                    </li>
                @endcan
                @can('gest_newsletter')
                    <h3 class="menu-title">Newsletter</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"> </i>Gestione Newsletter</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="{{url::route('Admin.Newsletter.List')}}">Lista Mail</a></li>
                            <li><i class="fa fa-envelope"></i><a href="{{url::route('Admin.Newsletter.SendMailForm')}}">Invia Mail</a></li>
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
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                    </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>
                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                        <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
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

@if(route::currentRouteName('Admin.Product.Add'))
    <script src="{{ URL::asset('vendor/backend/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/backend/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js') }}"></script>
    <script src="{{ URL::asset('js/backend/main.js') }}"></script>
    <script>
        /* script per attivare, nell'add prodotto, il modello solo dopo aver scelto un brand*/
        function activeModel() {
            var x = document.getElementById("brand").value;
            if (x == 0) {
                document.getElementById('collezione').setAttribute('disabled','disabled');
            } else {
                document.getElementById('collezione').removeAttribute('disabled');
            }
        }
    </script>
@endif

@if(route::currentRouteName('Admin.Brand.Edit'))
    <script>
        /* script per scrivere nome Brand nel edit*/
        function showName() {
            var b = document.getElementById("brand");
            var x = b.value;
            if (x == 0) {
                document.getElementById('text-input').removeAttribute('value');
            } else {
                document.getElementById('text-input').setAttribute('name',b.innerText)
                //setAttribute('value', b. );
            }
        }
    </script>
@endif

@if(strpos(route::currentRouteName(),'Admin.Collection')!== false)
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
                        url:((path.includes('Edit')) ? ('{{ route('Admin.Collection.EditGetCollection') }}'):((path.includes('Delete'))?('{{ route('Admin.Collection.EditGetCollection') }}'):('{{ route('Admin.Collection.RestoreGetCollection') }}'))),
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


</body>

</html>
