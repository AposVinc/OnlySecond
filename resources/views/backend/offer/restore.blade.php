@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Ripristina Offerta
        @endslot
        Offerte
    @endcomponent

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


