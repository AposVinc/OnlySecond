@extends('backend.layout')

@section('content')

    @component('backend.breadcrumbs')
        @slot('gest')
            Sito
        @endslot
        @slot('sez')
            Pagine
        @endslot
        @slot('op')
            Chi Siamo
        @endslot
    @endcomponent

    <form action="{{route('Admin.Page.AboutPost')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="card addProd">

            <div class="card-header borderHeader">
                <strong class="card-title">La Nostra Storia</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="main-photo" class=" form-control-label">Foto Principale</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="main-photo" name="main-photo" class="form-control-file"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc" class=" form-control-label">Descrizione</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc" id="desc" rows="4" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_desc_storia}}</textarea></div>
                </div>
            </div>

            <div class="card-header borderHeader">
                <strong class="card-title">Perchè comprare su Onysecond</strong>
            </div>
            <div class="card-body card-block">

                <div class="row form-group">
                    <div class="col col-md-3"><label for="title1" class=" form-control-label">Titolo 1° sez</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title1" name="title1" placeholder="Inserire il titolo della 1° sez." class="form-control" value="{{$fields->ab_why_tit_1}}" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc1" class=" form-control-label">Testo 1° sez</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc1" id="desc1" rows="3" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_why_txt_1}}</textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="title2" class=" form-control-label">Titolo 2° sez</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title2" name="title2" placeholder="Inserire il titolo della 2° sez." class="form-control" value="{{$fields->ab_why_tit_2}}" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc2" class=" form-control-label">Testo 2° sez</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc2" id="desc2" rows="3" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_why_txt_2}}</textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="title3" class=" form-control-label">Titolo 3° sez</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title3" name="title3" placeholder="Inserire il titolo della 3° sez." class="form-control" value="{{$fields->ab_why_tit_3}}" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc3" class=" form-control-label">Testo 3° sez</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc3" id="desc3" rows="3" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_why_txt_3}}</textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="title4" class=" form-control-label">Titolo 4° sez</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title4" name="title4" placeholder="Inserire il titolo della 4° sez." class="form-control" value="{{$fields->ab_why_tit_4}}" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc4" class=" form-control-label">Testo 4° sez</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc4" id="desc4" rows="3" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_why_txt_4}}</textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="title5" class=" form-control-label">Titolo 5° sez</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title5" name="title5" placeholder="Inserire il titolo della 5° sez." class="form-control" value="{{$fields->ab_why_tit_5}}" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc5" class=" form-control-label">Testo 5° sez</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc5" id="desc5" rows="3" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_why_txt_5}}</textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="title6" class=" form-control-label">Titolo 6° sez</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="title6" name="title6" placeholder="Inserire il titolo della 6° sez." class="form-control" value="{{$fields->ab_why_tit_6}}" required></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="desc6" class=" form-control-label">Testo 6° sez</label></div>
                    <div class="col-12 col-md-9"><textarea name="desc6" id="desc6" rows="3" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_why_txt_6}}</textarea></div>
                </div>

            </div>

            <div class="card-header borderHeader">
                <strong class="card-title">Il Nostro Team</strong>
            </div>
            <div class="card-body card-block">
                <b>Primo Membro</b>
                <div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="first-member-name" class=" form-control-label">Nome</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="first-member-name" name="first-member-name" placeholder="Inserire il nome e cognome del 1° membro" class="form-control" value="{{$fields->ab_team_name_1}}" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="first-member-desc" class=" form-control-label">Descrizione</label></div>
                        <div class="col-12 col-md-9"><textarea name="first-member-desc" id="first-member-desc" rows="2" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_team_desc_1}}</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="first-member-photo" class=" form-control-label">Foto</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="first-member-photo" name="first-member-photo" class="form-control-file"></div>
                    </div>
                </div>

                <b class="margin-member">Secondo Membro</b>
                <div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="second-member-name" class=" form-control-label">Nome</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="second-member-name" name="second-member-name" placeholder="Inserire il nome e cognome del 1° membro" class="form-control" value="{{$fields->ab_team_name_2}}" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="second-member-desc" class=" form-control-label">Descrizione</label></div>
                        <div class="col-12 col-md-9"><textarea name="second-member-desc" id="second-member-desc" rows="2" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_team_desc_2}}</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="second-member-photo" class=" form-control-label">Foto</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="second-member-photo" name="second-member-photo" class="form-control-file"></div>
                    </div>
                </div>

                <b class="margin-member">Terzo Membro</b>
                <div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="third-member-name" class=" form-control-label">Nome</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="third-member-name" name="third-member-name" placeholder="Inserire il nome e cognome del 1° membro" class="form-control" value="{{$fields->ab_team_name_3}}" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="third-member-desc" class=" form-control-label">Descrizione</label></div>
                        <div class="col-12 col-md-9"><textarea name="third-member-desc" id="third-member-desc" rows="2" placeholder="Inserisci una descrizione..." class="form-control" required>{{$fields->ab_team_desc_3}}</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="third-member-photo" class=" form-control-label">Foto</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="third-member-photo" name="third-member-photo" class="form-control-file"></div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" id="checkBtn" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Aggiorna
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>

    </form>

@endsection

