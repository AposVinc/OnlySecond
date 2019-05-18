@extends('backend.layout')

@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Aggiungi Brand</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin.index')}}">Home</a></li>
                        <li>Gestione Brand</li>
                        <li class="active">Aggiungi Brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('admin.addBrandCreate')}}" method="post" class="form-horizontal"> <!-- enctype="multipart/form-data" -->
    @csrf
    <!--<div class="col-lg-6"> eliminato per togliere style che andavano in contrasto con i margini inseriti a riga 23-->
    <div class="card add"> <!-- aggiunta class "add" per mettere dei margini al form-->
        <div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Brand</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Inserire il nome del Brand da aggiungere" class="form-control"></div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Aggiungi
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
        </div>
    </div>
    <!-- </div>-->
    </form>
@endsection
