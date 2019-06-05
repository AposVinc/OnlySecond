@extends ('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('title')
            Elimina Offerta
        @endslot
        Offerte
    @endcomponent

    <form action="{{route('Admin.Offer.DeleteDestroy')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="category" class="form-control-label">Offerta</label></div>
                    <div class="col-12 col-md-9">
                        <select name="offer" id="offer" class="form-control" onchange="showName()">
                            <option value="0">Seleziona l'offerta</option>
                            @foreach($offers as $key=> $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Elimina
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>
@endsection