@extends('backend.layout')
@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Ripristina Offerta</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('Admin.Index')}}">Home</a></li>
                        <li>Gestione Offerta</li>
                        <li class="active">Ripristina Offerta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('Admin.Offer.RestoreRestore')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card add">
            <strong>Ripristina Offerta</strong>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="offer" class=" form-control-label">Offerta</label></div>
                    <div class="col-12 col-md-9">
                        <select name="offer" id="offer" class="form-control" onchange="showName()">
                            <option value="0">Seleziona l'offerta</option>
                            @foreach($offers as $key => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        <small class="help-block form-text">Seleziona l'offerta da ripristinare</small>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Ripristina
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>
@endsection


