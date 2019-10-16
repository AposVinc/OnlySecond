@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row mb_60">

            @component('frontend.partials.breadcrumbsprofile')
                Modifica Profilo
            @endcomponent

            <div class="panel-default col-lg-12 mb_20">
                <div class="panel-body">
                    <div class="row col-md-6 col-md-offset-3">
                        <form action="{{route('EditProfilePost')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group required">
                                <label for="name" class="col-sm-3 control-label">Nome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" placeholder="Nome" value="{{auth()->user()->name}}" name="name" disabled required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="surname" class="col-sm-3 control-label">Cognome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="surname" placeholder="Cognome" value="{{auth()->user()->surname}}" name="surname" disabled required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="phone" class="col-sm-3 control-label">Cell.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" placeholder="Numero di Telefono" value="{{auth()->user()->phone}}" name="phone" disabled required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" placeholder="Indirizzo Email" value="{{auth()->user()->email}}" name="email" disabled required>
                                </div>
                            </div>

                            <div id="divCheckbox"></div>

                            <div id="password">
                                <div class="form-group required">
                                    <label for="psw" id="label-psw" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="psw" placeholder="Password" value="********" name="psw" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-left pl_10 mt_10">
                                    <a href="{{route('Profile')}}" type="button" id="buttonBack" class="btn btn-primary btn-sm">Indietro</a>
                                </div>
                                <div class="pull-right pr_10 mt_10">
                                    <a type="button" id="buttonEdit" class="btn btn-primary btn-sm" onclick="ActiveForm()">Modifica</a>
                                </div>

                                <div class="pull-left pl_10 mt_10">
                                    <a type="button" id="buttonReset" class="btn btn-primary btn-sm" onclick="DisableForm()" style="display: none">Annulla</a>
                                </div>
                                <div class="pull-right pr_10 mt_10">
                                    <button type="submit" id="buttonSave" class="btn btn-primary btn-sm" style="display: none">Salva</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
