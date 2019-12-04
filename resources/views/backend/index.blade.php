@extends('backend.layout')

@section('content')


    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">I prodotti più venduti <small>(max 4)</small></h4>
                <div class="flot-container">
                    <div id="flot-pie" class="flot-pie-container"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">I brand più venduti</h4>
                <canvas id="singelBarChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="menu-icon fa fa-briefcase" style="color: white"> </i>
                    </div>

                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$fields['brands']}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Brand</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-2">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="menu-icon fa fa-th" style="color: white"> </i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$fields['collections']}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Collezioni</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                    <div class="h1 text-right mb-4">
                        <i class="menu-icon fa fa-bars" style="color: white"> </i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$fields['categories']}}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Categorie</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                    <div class="h1 text-right text-light mb-4">
                        <i class="menu-icon fa fa-cube" style="color: white"> </i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$fields['products']}}</span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Prodotti</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                    <div class="h1 text-light text-right mb-4">
                        <i class="menu-icon fa fa-user" style="color: white"> </i>
                    </div>
                    <div class="h4 mb-0 text-light">{{$fields['users']}}</div>
                    <small class="text-light text-uppercase font-weight-bold">Utenti</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-1">
                    <div class="h1 text-light text-right mb-4">
                        <i class="menu-icon fa fa-truck" style="color: white"> </i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">{{$fields['suppliers']}}</span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Fornitori</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>


@endsection
