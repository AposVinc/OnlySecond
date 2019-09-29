@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Fornitori
        @endslot
        @slot('sez')
            Fornitori
        @endslot
        @slot('op')
            Modifica
        @endslot
        Fornitore
    @endcomponent

    <form action="{{route('Admin.Supplier.EditPost')}}" method="post" class="form-horizontal">
    @csrf

        <div class="card add">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="supplier" class=" form-control-label">Fornitore</label></div>
                    <div class="col-12 col-md-9">
                        <select name="supplier" id="supplier" class="form-control" required>
                            <option value="" selected>Seleziona il fornitore</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group pt_24">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Nome</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="name" name="name" placeholder="Inserire il nome del Fornitore" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input value="" type="email" id="email" name="email" placeholder="Inserire la email del Fornitore" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="phone" class=" form-control-label">Phone</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="phone" name="phone" placeholder="Inserire il numero del Fornitore" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="city" class=" form-control-label">Città</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="city" name="city" placeholder="Inserire la città del Fornitore" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="address" class=" form-control-label">Indirizzo</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="address" name="address" placeholder="Inserire l'indirizzo del Fornitore" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="zip" class=" form-control-label">Città</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="zip" name="zip" placeholder="Inserire il CAP del Fornitore" class="form-control" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="iban" class=" form-control-label">IBAN</label></div>
                    <div class="col-12 col-md-9"><input value="" type="text" id="iban" name="iban" placeholder="Inserire l'IBAN del Fornitore" class="form-control" required></div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Modifica
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>

    </form>

@endsection
